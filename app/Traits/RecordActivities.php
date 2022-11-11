<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Str;

trait RecordActivities
{

    /**
     *
     */
    protected static function bootRecordActivities()
    {
//        foreach (static::getActivitiesToRecord() as $event) {
//            // created updated
//            static::$event(function ($model) use ($event) {
//                $model->recordActivity($event);
//            });
//        }

         static::created(function ($model) {
           $model->recordActivity();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    /**
     * @param $event  // Created Updated
     */
    public function recordActivity($event = 'created')
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActvityType($event),  //created_Forum
        ]);
    }

    /**
     * @return string[]
     */
    public static function getActivitiesToRecord()
    {
        return ['created'];
    }

    protected function getActvityType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());

        return "{$event}_{$type}";
    }
}



<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->firstOrFail();
        }
        $this->roles()->sync($role, false);
    }

    public function abilities()
    {
        return $this->roles
            ->map
            ->abilities
            ->flatten()
            ->pluck('name')
            ->unique();
    }

    /**
     * @return HasMany
     */
    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    /**
     * @return HasMany
     */
    public function reply()
    {
        return $this->hasMany(Reply::class);
    }

    public function confirm()
    {
        $this->email_verified_at = Carbon::now();
        $this->remember_token = null;
        $this->save();
    }

}

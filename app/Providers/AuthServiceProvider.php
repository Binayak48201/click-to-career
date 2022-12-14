<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Forum;
use App\Policies\ForumPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Forum::class => ForumPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Super admin user
        Gate::before(function ($user,$ability) {
//            if ($user->id === 1) {
//                return true;
//            }
            if($user->abilities()->contains($ability)){
                return true;
            }
        });
    }
}

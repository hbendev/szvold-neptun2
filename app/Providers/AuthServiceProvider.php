<?php

namespace App\Providers;

use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-subject', function ($user, $subject) {
            return $user->id == $subject->creator_id;
        });

        Gate::define('update-task', function ($user, $task) {
            return $user->id == $task->subject->creator_id;
        });
    }

}

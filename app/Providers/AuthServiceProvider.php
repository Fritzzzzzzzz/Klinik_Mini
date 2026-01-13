<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Queue;
use App\Policies\QueuePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Queue::class => QueuePolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        // Gate admin
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
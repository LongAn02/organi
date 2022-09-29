<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\Product;
use App\Policies\PostPolicy;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-admin', function ($user) {
            return in_array('admin', $user->roles->pluck('name')->toArray());
        });

        Gate::define('is-poster', function ($user) {
            return in_array('the-poster', $user->roles->pluck('name')->toArray());
        });

        Gate::define('is-user', function ($user) {
            return in_array('user', $user->roles->pluck('name')->toArray());
        });
    }
}

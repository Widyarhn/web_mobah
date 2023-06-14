<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define("admin", function ($user) {
            if (empty($user->level)) {
                return redirect("/logout");
            } else {
                return $user->assignRole == "admin";
            }
        });

        Gate::define("mitra", function ($user) {
            if (empty($user->level)) {
                return redirect("/logout");
            } else {
                return $user->assignRole == "mitra";
            }
        });
        Gate::define("validator", function ($user) {
            if (empty($user->level)) {
                return redirect("/logout");
            } else {
                return $user->assignRole == "validator";
            }
        });
    }
}

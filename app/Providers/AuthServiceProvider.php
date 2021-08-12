<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $User= new User();
       $User->check();
        // Gate::define("products_list", function () {
            
        //     return $this->User->checkPermissionsAccess("products_list");

        // });
        // foreach (config("permissions.permission_childen") as $permission_childen) {
        //     foreach (config("permissions.permission_parent") as $permission_parent) {
        //         $permission_parent = $permission_parent . '_' . $permission_childen;
        //         Gate::define($permission_parent, function ($user) {
        //             return $user->checkPermissionsAccess("products_list");

        //         });
        //     }
        // }
    }
}

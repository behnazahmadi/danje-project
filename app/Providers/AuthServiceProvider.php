<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if(Schema::hasTable("permissions")){
            foreach (Permission::all() as $permission){
                \Illuminate\Support\Facades\Gate::define($permission->name,function ($user) use ($permission){
                    return $user->hasPermissions($permission);
                });
            }
        }

    }
}

<?php

namespace Scholrs\Providers;

use Illuminate\Support\ServiceProvider;
use Scholrs\Providers\GateContract;
use Scholrs\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    /*public function boot(GateContract $gate)
    {
        foreach($this->getPermissions() as $permission)
        {
            $gate->define($permission->name, function($user) use ($permission) {
               return $user->hasRole($permission->roles);
            });
        }
    }*/

    /**
     * Get any permission
     */
    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}

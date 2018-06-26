<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //TODO custom routing
        //viaRequest(guard name,Closure that receives the incoming HTTP request and returns a user instance or, if authentication fails, null)
        Auth::viaRequest('admin-guard', function ($request)
        {

            $user = Auth::user();
            return !empty($user->isadmin)? $user : null;
            die(print_r($user));
        });
    }
}

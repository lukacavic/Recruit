<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\CandidateUser;
use App\Models\User;
use Illuminate\Auth\SessionGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        /* Bypass Policy for Candidate Portal User */
        if(Auth::guard('candidate_web')->check())
        {
            Gate::before(function (?CandidateUser $user){
                ddd($user);
            });
        }



       /* Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true : null;
        });*/


    }
}

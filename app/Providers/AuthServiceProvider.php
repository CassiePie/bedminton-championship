<?php

namespace App\Providers;

use App\Policies\PlayerPolicy;
use App\Models\Player;
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
        Player::class => PlayerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('update-player', function ($user, Player $player) {
            
            if ($user->id === $player->user_id) {
                return true;
            }
    
            return false; 

            return true;
        });
    }
}

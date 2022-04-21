<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ini untuk authorisasi. pakai gate. (beda lagi sama middleware)
        // admin ini bisa ngapain. gapelu pakai cek auth karena gate ini untuk user yang udah login.
        Gate::define('admin', function(User $user){
            // auth()->user()->username != 'luthfiyyah_a';
            return $user->is_admin;
            //kalau admin, is_admin = 1
            // kalau bukan admin, is_admin = 0
        });
    }
}

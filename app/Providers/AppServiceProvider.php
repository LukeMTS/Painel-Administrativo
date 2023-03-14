<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        \Gate::define('add', function ($user) {
            $addId = Permission::where('permission', 'add')->first()->id;

            return $user->permissions()->where('permission_id', $addId)->exists();
        });

        \Gate::define('edit', function ($user) {
            $editId = Permission::where('permission', 'edit')->first()->id;

            return $user->permissions()->where('permission_id', $editId)->exists();
        });

        \Gate::define('delete', function ($user) {
            $deleteId = Permission::where('permission', 'delete')->first()->id;

            return $user->permissions()->where('permission_id', $deleteId)->exists();
        });
    }
}
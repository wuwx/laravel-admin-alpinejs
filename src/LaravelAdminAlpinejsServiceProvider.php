<?php

namespace Wuwx\LaravelAdminAlpinejs;

use Encore\Admin\Facades\Admin;
use Illuminate\Support\ServiceProvider;

class LaravelAdminAlpinejsServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(LaravelAdminAlpinejs $extension)
    {
        if (! LaravelAdminAlpinejs::boot()) {
            return ;
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/wuwx/laravel-admin-alpinejs')],
                'laravel-admin-alpinejs'
            );
        }

        Admin::booting(function () {
            Admin::js('vendor/wuwx/laravel-admin-alpinejs/dist/alpine.js');
        });
    }
}

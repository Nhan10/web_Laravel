<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            ['front_end.layouts.master','front_end.pages.category','front_end.layouts.sidebar'],
            'App\Http\ViewComposers\danhmucspComposer'
        );

        view()->composer(
            'front_end.layouts.master',
            'App\Http\ViewComposers\nhomspComposer'
        );
    }
}

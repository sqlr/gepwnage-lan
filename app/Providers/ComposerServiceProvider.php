<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * The composer mappings for the application.
     *
     * @var array
     */
    protected $composers = [
        'layouts.components.footer' => \App\Http\ViewComposers\FooterComposer::class,
    ];

    /**
     * @return void
     */
    public function boot()
    {
        $this->registerComposers();
    }

    /**
     * Register the application's composers.
     *
     * @return void
     */
    public function registerComposers()
    {
        foreach ($this->composers as $view => $composer) {
            View::composer($view, $composer);
        }
    }
}
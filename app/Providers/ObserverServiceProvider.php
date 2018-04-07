<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * The observer mappings for the application.
     *
     * @var array
     */
    protected $observers = [
//        \App\Model::class => \App\Observers\ModelObserver::class,
    ];

    /**
     * @return void
     */
    public function boot()
    {
        $this->registerObservers();
    }

    /**
     * Register the application's observers.
     *
     * @return void
     */
    public function registerObservers()
    {
        foreach ($this->observers as $model => $observer) {
            /** @var \Illuminate\Database\Eloquent\Model $model */
            $model::observe($observer);
        }
    }
}
<?php

namespace Snatertj\Notification;

/**
 * NotificationServiceProvider class
 * @package notification
 * @author Gertjan Roke
 */

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class NotificationServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'notification');

		/* Place all the files to the correct path */        
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/snatertj/notification'),
            __DIR__ . '/public' => base_path('public'),
        ]);
    }

    public function register()
    {
	    $this->registerNotification();
    }

    private function registerNotification()
    {
        $this->app->bind(
            'Snatertj\Notification\SessionStore',
            'Snatertj\Notification\LaravelSessionStore'
        );
        
        $this->app->bindShared('notification', function () {
            return $this->app->make('Snatertj\Notification\NotificationFlash');
        });
    }
}

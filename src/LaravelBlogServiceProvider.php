<?php

namespace Lnch\LaravelBlog;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Lnch\LaravelBlog\Policies\BlogTagPolicy;

class LaravelBlogServiceProvider extends ServiceProvider
{
    protected $policies = [
        BlogTag::class => BlogTagPolicy::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load package migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load package views
        $this->loadViewsFrom(__DIR__.'/views', 'laravel-blog');

        // Publish config files
        $this->publishes([
            __DIR__.'/../config/laravel-blog.php' => config_path('laravel-blog.php'),
        ], 'laravel-blog/config');

        // Register policies
        $this->registerPolicies();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Allow routing to work
        include __DIR__.'/routes/web.php';

        // Set up the config if not published
        if ($this->app['config']->get('laravel-blog') === null) {
            $this->app['config']->set('laravel-blog', require __DIR__.'/../config/laravel-blog.php');
        }

        // Merge config
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-blog.php',
            'permission'
        );
    }

    public function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            $policy = Gate::getPolicyFor($key);
            if (!$policy) {
                Gate::policy($key, $value);
            }
        }
    }
}

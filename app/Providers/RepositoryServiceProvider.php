<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Product\ProductInterface::class,
            \App\Repositories\Product\ProductEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Category\CategoryInterface::class,
            \App\Repositories\Category\CategoryEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Picture\PictureInterface::class,
            \App\Repositories\Picture\PictureEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Comment\CommentInterface::class,
            \App\Repositories\Comment\CommentEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\User\UserInterface::class,
            \App\Repositories\User\UserEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Order\OrderInterface::class,
            \App\Repositories\Order\OrderEloquentRepository::class
        );
    }
}

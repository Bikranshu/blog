<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * @author Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 */
class BlogServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->app->bind('App\Repositories\Post\PostContract', 'App\Repositories\Post\EloquentPostRepository');
    }

}

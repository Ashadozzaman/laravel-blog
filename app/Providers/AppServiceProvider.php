<?php

namespace App\Providers;
use App\Post;
use App\Author;
use App\Category;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Schema\Schema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;


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
        Builder::defaultStringLength(191);

        view()->composer('front.rightSidebar', function($view){ 
            $data['popular_posts']  = Post::Published()->orderBy('total_hit','desc')->limit('3')->get();
            $data['categories']     = Category::get();
            $view->with($data);
        });

        View::composer('layouts.front._mainNav',function($view){
            $view->with('categories',Category::all());
        });
    }
}

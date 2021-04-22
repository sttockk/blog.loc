<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Jenssegers\Date\Date;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('ru_RU');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Date::setlocale(config('app.locale'));

        view()->composer('layouts.navbar', function ($view) {
            $view->with('categories', Category::all());
            $view->with('tags', Tag::all());
        });
        view()->composer('layouts.sidebar', function ($view) {
            $view->with('popularPosts', Post::getPopularPosts());
            $view->with('featuredPosts', Post::getFeaturedPosts());
            $view->with('categories', Category::all());
            $view->with('tags', Tag::all());
        });

        view()->composer('layouts.carousel', function ($view) {
            $view->with('featuredPosts', Post::getFeaturedPosts());
        });

        view()->composer('layouts.footer', function ($view) {
            $view->with('recentPosts', Post::getRecentPosts());
        });
    }
}

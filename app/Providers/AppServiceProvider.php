<?php

namespace App\Providers;
use TCG\Voyager\Models\Page;
use App\Models\Article;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\ProductCategory;
use App\Observers\PageObserver;
use App\Observers\ArticleObserver;
use App\Observers\ProductObserver;
use App\Observers\GalleryObserver;
use TCG\Voyager\Models\Setting;
use App\Observers\SettingObserver;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('product_categories',ProductCategory::orderBy('order', 'asc')->get());

        Page::observe(PageObserver::class);
//        Setting::observe(SettingObserver::class);
        Article::observe(ArticleObserver::class);
        Product::observe(ProductObserver::class);
        Gallery::observe(GalleryObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}

<?php

namespace App\Observers;

use TCG\Voyager\Models\Page;
use Cache;

class PageObserver
{
    public function saved(Page $page)
    {
        $cacheKey = 'page_'.$page->slug;
        Cache::put($cacheKey,$page,43200);
    }

    public function deleted(Page $page)
    {
        $cacheKey = 'page_'.$page->slug;
        $cacheData = Cache::get($cacheKey);
        if($cacheData){
            Cache::forget($cacheKey);
        }
    }
}
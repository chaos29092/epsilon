<?php

namespace App\Observers;

use TCG\Voyager\Models\Page;
use Cache;

class PageObserver
{
    public function saved(Page $page)
    {
        $cacheKey = 'page_'.$page->id;
        Cache::put($cacheKey,$page,43200);
    }

    public function deleted(Page $page)
    {
        $cacheKey = 'page_'.$page->id;
        $cacheData = Cache::get($cacheKey);
        if($cacheData){
            Cache::forget($cacheKey);
        }
    }
}
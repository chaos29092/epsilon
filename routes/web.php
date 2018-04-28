<?php

Route::get('/', 'HomeController@index');
Route::get('contact_us','HomeController@contact_us');
Route::get('faq','HomeController@faq');
Route::get('about_us','HomeController@about_us');
Route::get('gallery','HomeController@galleries');

Route::get('news','HomeController@news');
Route::get('new/{slug}','HomeController@new');

Route::get('product_category/{slug}','HomeController@product_category');
Route::get('product/{slug}', 'HomeController@product');
Route::get('product_categories', 'HomeController@product_categories');

Route::get('sitemap.xml', 'HomeController@sitemap');

Route::post('contact_submit', 'MailController@submit');
Route::get('submit_ok', 'MailController@submit_ok');

//Route::post('search', 'HomeController@search');
//Route::get('search_result', 'HomeController@search_result');

Route::get('cache_clear','HomeController@cache_clear');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

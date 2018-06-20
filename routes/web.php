<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@home');
Route::get('/about', 'IndexController@about');
Route::get('/home', 'IndexController@home');
Route::get('/category/{cid}/subcategory/{scid}/{name}', 'IndexController@product');
Route::get('/category/{id}/{name}', 'IndexController@categoryproduct');
Route::get('/product/{id}/{name}', 'IndexController@productlist');
Route::get('/contact', 'IndexController@contact');
Route::post('contact-request', 'ContactController@store');

Auth::routes();
Route::get('/admin/login', 'IndexController@login');
Route::post('/search', 'IndexController@searchQuery');

//testing
Route::get('/mail', 'MailController@send');


//admin panel
Route::group(['middleware' => 'auth'], function () {
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/admin/dashboard', 'IndexController@dashboard');
//category
Route::get('/admin-category', 'CategoryController@index');
Route::post('/admin-category-add', 'CategoryController@create');
Route::post('/admin-category-update/{id}', 'CategoryController@update');
Route::get('/admin-category/edit/{id}', 'CategoryController@show');
Route::get('/admin-category/delete/{id}', 'CategoryController@destroy');
//subcategory
Route::get('/admin-subcategory', 'SubCategoryController@index');
Route::post('/admin-subcategory-add', 'SubCategoryController@create');
Route::post('/admin-subcategory-update/{id}', 'SubCategoryController@update');
Route::get('/admin-subcategory/edit/{id}', 'SubCategoryController@show');
Route::get('/admin-subcategory/delete/{id}', 'SubCategoryController@destroy');
//slider
Route::get('/admin-slider', 'SliderController@index');
Route::post('/admin-slider-add', 'SliderController@create');
Route::get('/admin-slider/edit/{id}', 'SliderController@show');
Route::post('/admin-slider/update/{id}', 'SliderController@update');
Route::get('/admin-slider/delete/{id}', 'SliderController@destroy');
//product 
Route::get('/admin-product', 'ProductController@index');
Route::post('/ajax/subcatData', 'ProductController@ajaxSubcat');
Route::post('/admin-product-add', 'ProductController@create');
Route::post('/admin-product/update/{id}', 'ProductController@update');
Route::get('/admin-product/edit/{id}', 'ProductController@show');
Route::get('/admin-product/delete/{id}', 'ProductController@destroy');
// SiteSetting
Route::get('/admin-sitesetting', 'SiteSettingController@index');
Route::post('/admin-sitesetting-add', 'SiteSettingController@create');
Route::get('/admin-sitesetting/edit/{id}', 'SiteSettingController@show');
Route::post('/admin-sitesetting/update/{id}', 'SiteSettingController@update');
Route::get('/admin-sitesetting/delete/{id}', 'SiteSettingController@destroy');
//seosetting
Route::get('/admin-seosetting', 'SeoSettingController@index');
Route::post('/admin-seosetting-add', 'SeoSettingController@create');
Route::get('/admin-seosetting/edit/{id}', 'SeoSettingController@show');
Route::post('/admin-seosetting/update/{id}', 'SeoSettingController@update');
Route::get('/admin-seosetting/delete/{id}', 'SeoSettingController@destroy');
//About us
Route::get('/admin-about', 'AboutController@index');
Route::post('/admin-about-add', 'AboutController@create');
Route::get('/admin-about/edit/{id}', 'AboutController@show');
Route::post('/admin-about/update/{id}', 'AboutController@update');
Route::get('/admin-about/delete/{id}', 'AboutController@destroy');

//Contact Request
Route::get('/admin/contact/request','ContactController@index');
Route::get('/admin/contact/request/edit/{id}','ContactController@show');
Route::post('/admin/contact/request/update/{id}','ContactController@update');

Route::get('/admin/user', 'IndexController@user');
Route::post('/admin/user/update', 'IndexController@updateUserInfo');
Route::get('/admin/unlock', 'IndexController@unlock');


// Route::get('/home', 'HomeController@index')->name('home');
});
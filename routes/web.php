<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Route::group(['prefix' => 'admin','middleware' => ['auth','role']], function () {
  // Admin --Group
  Route::resource("/group", "GroupeController");
  // Route::get("svg","GroupeController@icons")->name("group.icons");// Admin --Group
  // Admin --Category
  Route::resource("/category", "CategoryController");
  // Admin --Category
  Route::resource("/sub-category", "TypeController");
  // Admin --Features
  Route::resource("/features", "FeatureController");
  // Admin --Client
  Route::resource("/client", "ClientController");
  // Admin --Ads
  Route::resource("/ads", "AnnonceController");
  Route::get('/dashboad', 'PagesController@index')->name('admin.dashboad');
});
//website --route
Route::get('/', "Site\HomeController@index")->name('site.index');
// Login personaliser
Route::get('/login/user',"LoginController@index")->name('login.user');
Route::post('/login/user', "LoginController@login")->name('login.custom');

// Route::post('/loginTest','TestController@login')->name('test');
// Route::get('/tt','TestController@tt')->name('tt');
Auth::routes();
Route::get('/home', "HomeController@index")->name('home');
<<<<<<< HEAD
Route::get('/createAd', "Site\AddAnnouce@showCategory" )->name('ad.category');
Route::get('/createAd/sub-category/{id}', "Site\AddAnnouce@showSubCategory" )->name('ad.subCategory');
//Login admin
Route::get('/admin', 'AdminPageController@index')->name('admin.login');
Route::post('/admin/post', 'AdminPageController@authenticated')->name('admin.post');
Route::get('/admin/logout','AdminPageController@logout')->name('admin.logout');
Route::get('/admin/reset-password','AdminPageController@forget')->name('admin.forget');
Route::post('/admin/reset-password/post','AdminPageController@postForget')->name('admin.postForget');
Route::get('/admin/reset-password/{token}','AdminPageController@getPassword')->name('admin.password');
Route::post('/admin/reset-password','AdminPageController@updatePassword')->name('admin.postPassword');
//Dashboard Client
Route::get('/home/my-ads', 'PagesController@annonce')->name('dashboard.ads');
=======
Route::get('/sigin', "HomeController@login");
// Route::get('/register', "HomeController@register");
Route::group(["prefix"=>"/createAd"],function(){
  Route::get('/', "Site\CreateAds@showGroup" )->name('ad.category');
  Route::get('/sub-category/{category}', "Site\CreateAds@showCategory" )->name('ad.subCategory');
  Route::get('/sub-feature/{category}', "Site\CreateAds@showFeature" )->name('ad.subFeature');
  Route::get('/ad-more-information/{group}', "Site\CreateAds@AddMoreInformation")->name('ad.AddMoreInfo');
  Route::post('/ad-more-information', "Site\CreateAds@storeAds")->name('ad.storeAds');
});
>>>>>>> boris-dev

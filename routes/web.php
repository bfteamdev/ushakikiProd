<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
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

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Route::group(['prefix' => 'admin','middleware' => ['role']], function () {
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
  Route::prefix('ads')->group(function () {
    Route::get("/immobilier", "AnnonceController@indexImmobilier")->name("ads.immobilier");
    Route::get("/voiture", "AnnonceController@indexVoiture")->name("ads.voiture");
    Route::get("/truc", "AnnonceController@indexTruc")->name("ads.truc");
    Route::get("/service", "AnnonceController@indexService")->name("ads.service");
  });
  Route::get('/dashboad', 'PagesController@index')->name('admin.dashboad');
});
//website --route
Route::get('/', "Site\HomeController@index")->name('site.index');
// Login personaliser
Route::get('/sigin',"LoginController@index")->name('login.user');
Route::post('/login/user', "LoginController@login")->name('login.custom');
//Login with Facebook and Google
Route::get('/login/google','LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'LoginController@handleGoogleCallback');
Route::get('/login/facebook','LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'LoginController@handleFacebookCallback');

Auth::routes();
Route::get('/home', "HomeController@index")->name('home');
Route::get('/logout',"HomeController@logout")->name('logout.user');
//Login admin
Route::get('/admin', 'AdminPageController@index')->name('admin.login');
Route::post('/admin/post', 'AdminPageController@authenticated')->name('admin.post');
Route::get('/admin/logout','AdminPageController@logout')->name('admin.logout');
Route::get('/admin/reset-password','AdminPageController@forget')->name('admin.forget');
Route::post('/admin/reset-password/post','AdminPageController@postForget')->name('admin.postForget');
Route::get('/admin/reset-password/{token}','AdminPageController@getPassword')->name('admin.password');
Route::post('/admin/reset-password','AdminPageController@updatePassword')->name('admin.postPassword');
//Dashboard Client
Route::get('/home/my-ads', 'AnnonceController@annonceByUser')->name('dashboard.ads');
Route::get('ad/', "Site\CreateAds@showGroup" )->name('ad.category');
Route::get('ad/{id}','AnnonceController@viewAnnonce')->name('dashboard.ads.show');
Route::patch('ad/{id}','AnnonceController@updateAd')->name('dashboard.ads.update');
//Message
Route::get('/message','Site\HomeController@messageView')->name('dashboard.message');
//Creation d'annonce
Route::group(["prefix"=>"/createAd",'middleware' => ['auth']],function(){
  Route::get('/sub-category/{category}', "Site\CreateAds@showCategory" )->name('ad.subCategory');
  Route::get('/sub-feature/{category}', "Site\CreateAds@showFeature" )->name('ad.subFeature');
  Route::get('/ad-more-information/{group}', "Site\CreateAds@AddMoreInformation")->name('ad.AddMoreInfo');
  Route::post('/ad-more-information', "Site\CreateAds@storeAds")->name('ad.storeAds');
});
Route::prefix('category')->group(function () {
  Route::get('/{group}/{name}','PagesController@showCategory')->name('category.show');
  Route::get('/{name}/sub-category/{products}','PagesController@showProducts')->name('category.ads');
  Route::get('/{name}/parent-category/{products}','PagesController@showProductsNotSub')->name('category.ads.not');
  Route::get('/{name}/product/{id}','PagesController@showOne')->name('category.product.one');
});

//site- search Home
Route::get('home-search', 'Site\HomeController@searchHome')->name('search.home');





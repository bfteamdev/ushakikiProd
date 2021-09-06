<?php

use App\Http\Controllers\FaqController;
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

Auth::routes();
// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

//---------------------------------------A-D-M-I-N----------------------------------------------------
Route::group(['prefix' => 'admin', 'middleware' => ['role']], function () {
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
  Route::get("/client-change-password/{client}", "ClientController@resetShow")->name("client.change.password");
  Route::patch("/client-change-password/{client}", "ClientController@changePassword")->name("client.update.password");
  Route::get("/client-ad/{client}", "ClientController@ad")->name("client.ad");
  // Admin --profil
  Route::get("/profil", "AdminPageController@ProfilShow")->name('profil.show');
  Route::patch("/profil", "AdminPageController@ProfilUpdate")->name('profil.update');
  Route::get("/password-update", "AdminPageController@ModifierPasswordShow")->name('profil.change');
  Route::patch("/password-update", "AdminPageController@ModifierPasswordUpdate")->name('profil.admin.update.password');
  // Admin --Ads
  Route::prefix('ads')->group(function () {
    //immobilier
    Route::get("/immobilier", "AnnonceController@indexImmobilier")->name("ads.immobilier");
    Route::get("/immobilier/{id}", "AnnonceController@showImmobilier")->name("ads.immobilier.show");
    Route::patch("/immobilier/{id}", "AnnonceController@updateImmobilier")->name('ads.immobilier.update');
    Route::get("/immobilier_search", "AnnonceController@searchImmobilier")->name('ads.immobilier.search');
    //voiture
    Route::get("/voiture", "AnnonceController@indexVoiture")->name("ads.voiture");
    Route::get("/voiture/{id}", "AnnonceController@showVoiture")->name('ads.voiture.show');
    Route::patch("/voiture/{id}", "AnnonceController@updateVoiture")->name('ads.voiture.update');
    Route::get("/voiture_search", "AnnonceController@searchVoiture")->name('ads.voiture.search');
    //truc
    Route::get("/truc", "AnnonceController@indexTruc")->name("ads.truc");
    Route::get("/truc/{id}", "AnnonceController@showTruc")->name("ads.truc.show");
    Route::patch("/truc/{id}", "AnnonceController@updateTruc")->name("ads.truc.update");
    Route::get("truc_search", "AnnonceController@searchTruc")->name("ads.truc.search");
    //Service
    Route::get("/service", "AnnonceController@indexService")->name("ads.service");
    Route::get("/service/{id}", "AnnonceController@showService")->name("ads.service.show");
    Route::patch("/service/{id}", "AnnonceController@updateService")->name("ads.service.update");
    Route::get("/service_search", "AnnonceController@searchService")->name("ads.service.search");
  });
  Route::get('/dashboad', 'PagesController@index')->name('admin.dashboad');
  //Admin-order
  Route::resource('/order', 'OrderController');
  Route::get("/order_search", "OrderController@search")->name("order.search");
  Route::resource('/faq', "FaqController");
});
//Login admin
Route::get('/admin', 'AdminPageController@index')->name('admin.login');
Route::post('/admin/post', 'AdminPageController@authenticated')->name('admin.post');
Route::get('/admin/logout', 'AdminPageController@logout')->name('admin.logout');
Route::get('/admin/reset-password', 'AdminPageController@forget')->name('admin.forget');
Route::post('/admin/reset-password/post', 'AdminPageController@postForget')->name('admin.postForget');
Route::get('/admin/reset-password/{token}', 'AdminPageController@getPassword')->name('admin.password');
Route::post('/admin/reset-password', 'AdminPageController@updatePassword')->name('admin.postPassword');
//----------------------------------------E-N-D----A-D-M-I-N-------------------------------------------
// Login personaliser
Route::get('/sigin', "LoginController@index")->name('login.user');
Route::post('/login/user', "LoginController@login")->name('login.custom');
//Login with Facebook and Google
Route::get('/login/google', 'LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'LoginController@handleGoogleCallback');
Route::get('/login/facebook', 'LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'LoginController@handleFacebookCallback');

//website --route
Route::prefix('/')->group(function () {
  Route::get('/', "Site\HomeController@index")->name('site.index');
  Route::get("/faq","Site\HomeController@faq")->name("faq.website");
  //Creation d'annonce
  Route::group(["prefix" => "/createAd", 'middleware' => ['auth']], function () {
    Route::get('/sub_category/{category}', "Site\CreateAds@showCategory")->name('ad.subCategory');
    Route::get('/sub-feature/{category}', "Site\CreateAds@showFeature")->name('ad.subFeature');
    Route::get('/ad-more-information/{group}', "Site\CreateAds@AddMoreInformation")->name('ad.AddMoreInfo');
    Route::post('/ad-more-information', "Site\CreateAds@storeAds")->name('ad.storeAds');
    Route::get('/detail-of-order', "Site\CreateAds@viewDetail")->name('ad.viewDetail');
  });
  Route::post('/call_back_url', [
    'uses' => 'Site\CreateAds@confirmcommande'
  ]);
  Route::prefix('category')->group(function () {
    Route::get('/{group}/{name}', 'PagesController@showCategory')->name('category.show');
    Route::get('/{name}/sub-category/{products}', 'PagesController@showProducts')->name('category.ads');
    Route::get('/{name}/parent-category/{products}', 'PagesController@showProductsNotSub')->name('category.ads.not');
    Route::get('/{name}/product/{id}', 'PagesController@showOne')->name('category.product.one')->middleware("auth");
  });

  Route::post("/message/{idReceiver}", 'MessageController@store')->name("message.store");
  //site- search Home
  Route::post('search_ads', 'Site\AutoSearchController@search')->name('AutoSearchController.search');
  //site- search Home
  Route::get('home-search', 'Site\HomeController@searchHome')->name('search.home');
  Route::get('createa-ad/', "Site\CreateAds@showGroup")->name('ad.category');
  //-----------------------Dashboard Client-----------------
  Route::prefix('dashboard')->group(function () {
    Route::get('', "HomeController@index")->name('home');
    Route::get('/category/{id}', "HomeController@viewAdByCategory")->name('ad.by.category');
    Route::get('/category/{id}/{name}', "HomeController@viewAdBySubCategory")->name('ad.by.type');
    Route::get('/logout', "HomeController@logout")->name('logout.user');
    Route::get('/my-ads', 'AnnonceController@annonceByUser')->name('dashboard.ads');
    Route::get('ad/{id}', 'AnnonceController@viewAnnonce')->name('dashboard.ads.show');
    Route::patch('ad/{id}', 'AnnonceController@updateAd')->name('dashboard.ads.update');
    Route::get('/my-ads/search', 'AnnonceController@searchAdByUser')->name('dashboard.ads.search');
    //Renew ads
    Route::get('ad/{id}/renew', 'AnnonceController@viewRenew')->name('dashboard.ad.renew');
    //Message
    Route::get('/message', 'Site\HomeController@messageView')->name('dashboard.message');
    Route::get('/message/{idSender}', 'Site\HomeController@messageViewOne')->name('dashboard.messageViewOne');
    //Profil
    Route::get('/profil', 'Site\HomeController@profilView')->name('dashboard.profil');
    Route::patch('/profil', 'Site\HomeController@updateProfil')->name('dashboard.profil.update');
    //Change Password
    Route::get('/change-password', 'Site\HomeController@changePassword')->name('dashboard.change.password');
    Route::patch('/change-password', 'Site\HomeController@changePasswordUpdate')->name('dashboard.change.password.update');
  });
});

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

Route::group(['prefix' => 'admin'], function () {
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
  Route::resource("/client", "ClientController")->middleware('auth');
  // Admin --Ads
  Route::resource("/ads", "AnnonceController");


  Route::get('/', 'PagesController@index');
});
//website --route
Route::get('/', "Site\HomeController@index")->name('site.index');

Auth::routes();
Route::get('/home', "HomeController@index")->name('home');
Route::get('/createAd', "Site\AddAnnouce@showCategory" )->name('ad.category');
Route::get('/createAd/sub-category/{id}', "Site\AddAnnouce@showSubCategory" )->name('ad.subCategory');
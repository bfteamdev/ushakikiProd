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



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//website --route
Route::get('/',[App\Http\Controllers\Site\HomeController::class, 'index'])->name('site.index');
Route::group(['middleware'=>'auth','admin'],function () {
    Route::get('/admin', 'PagesController@index');
    // Admin --Group
Route::resource("admin/group","GroupeController");
// Route::get("svg","GroupeController@icons")->name("group.icons");// Admin --Group

// Admin --Category
Route::resource("admin/category","CategoryController");

// Admin --Category
Route::resource("admin/sub-category","TypeController");

// Admin --Features
Route::resource("admin/features","FeatureController");

// Admin --Client
Route::resource("admin/client","ClientController")->middleware('auth');

// Admin --Ads
Route::resource("admin/ads","AnnonceController");
});
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::group([
"domain" => "http://localhost:8000/"
], function () {
Route::post('/call_back_url','Site\CreateAds@confirmcommande');

});
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("/", [
	"uses" => "\Bookie\Http\Controllers\HomeController@main",
	"as" => "home",
]);

Route::get("/register", [
	"uses" => "\Bookie\Http\Controllers\Auth\AuthController@showRegistrationForm",
	"as" => "register",
	"middleware" => "guest",
]);

Route::post("/register", [
	"uses" => "\Bookie\Http\Controllers\Auth\AuthController@register",
	"middleware" => "guest",
]);

Route::get("/login", [
	"uses" => "\Bookie\Http\Controllers\Auth\AuthController@showLoginForm",
	"as" => "login",
	"middleware" => "guest",
]);

Route::post("/login", [
	"uses" => "\Bookie\Http\Controllers\Auth\AuthController@login",
	"middleware" => "guest",
]);

Route::get("/logout", [
	"uses" => "\Bookie\Http\Controllers\Auth\AuthController@logout",
	"as" => "logout",
	"middleware" => "auth",
]);

Route::get("/owned/add", [
	"uses" => "\Bookie\Http\Controllers\OwnershipController@getAdd",
	"as" => "owned.add",
	"middleware" => "auth",
]);

Route::post("/owned/add", [
	"uses" => "\Bookie\Http\Controllers\OwnershipController@postAdd",
	"middleware" => "auth",
]);

Route::get("/owned", [
	"uses" => "\Bookie\Http\Controllers\OwnershipController@all",
	"as" => "owned.all",
	"middleware" => "auth",
]);

Route::get("/owned/{id}", [
	"uses" => "\Bookie\Http\Controllers\OwnershipController@one",
	"as" => "owned.one",
	"middleware" => "auth",
]);

Route::get("/owned/delete/{id}", [
	"uses" => "\Bookie\Http\Controllers\OwnershipController@delete",
	"as" => "owned.delete",
	"middleware" => "auth",
]);

Route::delete("/owned/delete/{id}", [
	"uses" => "\Bookie\Http\Controllers\OwnershipController@delete",
	"middleware" => "auth",
]);
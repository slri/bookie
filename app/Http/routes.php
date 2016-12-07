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
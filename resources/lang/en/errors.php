<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Ownership Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during for various
    | management-related messages that we need to display to the user.
    |
    */

    "404" => [
    	"header" => "404 Not Found",
    	"description" => "We seem to be unable to find the page you're looking for. Make sure you didn't misspell the URL.",
    	"cta" => [
    		"message" => "If you think this is an internal error, contact our administrator at ",
    	    "link" => env("WEBMASTER_EMAIL", "webmaster@example.com"),
    	    "name" => env("WEBMASTER_NAME", "webmaster"),
    	],
    ],

];

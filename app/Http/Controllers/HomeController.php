<?php

namespace Bookie\Http\Controllers;

use Bookie\Http\Controllers\Controller;

class HomeController extends Controller {

	public function main() {
		return view("home");
	}
}

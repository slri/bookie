<?php

namespace Bookie\Http\Controllers;

use Bookie\Models\Car;
use Bookie\Http\Controllers\Controller;

class OwnershipController extends Controller {

	protected function validator(array $data) {
        return Validator::make($data, [
            'car' => 'required|exists:cars',
        ]);
    }

	public function getAddOwned($request) {
		$cars = Car::all();

		if($request->wantsJson()) {
			return response($cars, 200);
		}

		return view("ownership.add", ["cars" => $cars]);
	}

	public function postAddOwned($request) {
		$validator = $this->validator($request->all());

		if($validator->fails()) {
			$this->throwValidationException($request, $validator);
		}

		Auth::user()->owns()->attach($request->input("id"));

		if($request->wantsJson()) {
			return response("Successfully added.", 200);
		}

		return redirect()->route("owned.all")->withInfo("Successfully added.");
	}

	public function allOwned($request) {
		$owns = Auth::user()->owns;

		if($request->wantsJson()) {
			return response($owns, 200);
		}

		return view("ownership.list", ["cars" => $owns]);
	}

	public function oneOwned($id, $request) {
		$owns = Auth::user()->owns()->find($id);

		if(!$owns) {
			if($request->wantsJson()) {
				return response("You don't own this car.", 404);
			}

			return redirect()->route("errors.404")->withInfo("You don't own this car.");
		}

		return view("ownership.details", ["car" => $owns]);
	}

	public function deleteOwned($id, $request) {
		$owns = Auth::user()->owns()->find($id);

		if(!$owns) {
			if($request->wantsJson()) {
				return response("You don't own this car.", 404);
			}

			return redirect()->route("errors.404")->withInfo("You don't own this car.");
		}

		if($request->wantsJson()) {
			return response("Successfully deleted.", 200);
		}

		return redirect()->route("owned.all")->withInfo("Successfully deleted.");
	}
}

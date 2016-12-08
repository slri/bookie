<?php

namespace Bookie\Http\Controllers;

use Auth;
use Bookie\Models\Car;
use Illuminate\Http\Request;
use Bookie\Http\Controllers\Controller;

class OwnershipController extends Controller {

	protected function validator(array $data) {
        return Validator::make($data, [
            'car' => 'required|exists:cars',
        ]);
    }

	public function getAdd(Request $request) {
		$cars = Car::all();

		if($request->wantsJson()) {
			return response($cars, 200);
		}

		return view("ownership.add", ["cars" => $cars]);
	}

	public function postAdd(Request $request) {
		$validator = $this->validator($request->all());

		if($validator->fails()) {
			$this->throwValidationException($request, $validator);
		}

		Auth::user()->owns()->attach($request->input("id"));

		if($request->wantsJson()) {
			return response(trans("success.add"), 200);
		}

		return redirect()->route("owned.all")->withInfo(trans("success.add"));
	}

	public function all(Request $request) {
		$owns = Auth::user()->owns()->paginate(config("view.itemsPerPage"));

		if($request->wantsJson()) {
			return response($owns, 200);
		}

		return view("ownership.list", ["cars" => $owns]);
	}

	public function one($id, Request $request) {
		$owns = Auth::user()->owns()->find($id);

		if(!$owns) {
			if($request->wantsJson()) {
				return response(trans("owner.not"), 404);
			}

			return redirect()->route("errors.404")->withInfo(trans("owner.not"));
		}

		return view("ownership.details", ["car" => $owns]);
	}

	public function delete($id, Request $request) {
		$owns = Auth::user()->owns()->find($id);

		if(!$owns) {
			if($request->wantsJson()) {
				return response(trans("owner.not"), 404);
			}

			return redirect()->route("errors.404")->withInfo(trans("owner.not"));
		}

		if($request->wantsJson()) {
			return response(trans("success.delete"), 200);
		}

		return redirect()->route("owned.all")->withInfo(trans("success.delete"));
	}
}

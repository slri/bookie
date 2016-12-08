<?php

namespace Bookie\Http\Controllers;

use Auth;
use Validator;
use Illuminate\Http\Request;
use Bookie\Models\Car;
use Bookie\Http\Controllers\Controller;

class RentalController extends Controller {

	protected function rules() {
        return [
            'car' => 'required|exists:cars,id',
        ];
    }

	public function getAdd(Request $request) {
		$rentable = Car::whereHas("owner", function($q) {
			$q->where("users.id", "!=", Auth::id());
		})->paginate(config("view.itemsPerPage"));

		return view("rental.add", ["cars" => $rentable]);
	}

	public function postAdd($id, Request $request) {
		if(!Car::findOrFail($id)) {
			return redirect()->route("errors.404");
		}

		Auth::user()->rents()->attach($id);

		if($request->wantsJson()) {
			return response(trans("ownership.success.add"), 200);
		}

		return redirect()->route("rented.all")->withInfo(trans("ownership.success.add"));
	}

	public function all(Request $request) {
		$rents = Auth::user()->rents()->paginate(config("view.itemsPerPage"));

		if($request->wantsJson()) {
			return response($rents, 200);
		}

		return view("rental.list", ["cars" => $rents]);
	}

	public function delete($id, Request $request) {
		$rents = Auth::user()->rents()->find($id);

		if(!$rents) {
			if($request->wantsJson()) {
				return response(trans("ownership.owner.not"), 404);
			}

			return redirect()->route("errors.404")->withInfo(trans("ownership.owner.not"));
		}

		Auth::user()->rents()->detach($id);

		if($request->wantsJson()) {
			return response(trans("ownership.success.delete"), 200);
		}

		return redirect()->route("rented.all")->withInfo(trans("ownership.success.delete"));
	}
}

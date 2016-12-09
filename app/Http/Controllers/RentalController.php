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
		$rentable = Car::with("type")->whereHas("user", function($q) {
			$q->where("users.id", "!=", Auth::id());
		})->paginate(config("view.itemsPerPage"));

		return view("rental.add", ["cars" => $rentable]);
	}

	public function postAdd($id, Request $request) {
		$car = Car::find($id);

		if(!$car) {
			return redirect()->route("errors.404");
		}

		Auth::user()->rentals()->create(["car_id" => $car->id]);

		if($request->wantsJson()) {
			return response(trans("ownership.success.add"), 200);
		}

		return redirect()->route("rented.all")->withInfo(trans("ownership.success.add"));
	}

	public function all(Request $request) {
		$rentals = Auth::user()->rentals()->with("car.type")->paginate(config("view.itemsPerPage"));

		if($request->wantsJson()) {
			return response($rentals, 200);
		}

		return view("rental.list", ["rentals" => $rentals]);
	}

	public function delete($id, Request $request) {
		$rental = Auth::user()->rentals()->find($id);

		if(!$rental) {
			if($request->wantsJson()) {
				return response(trans("ownership.owner.not"), 404);
			}

			return redirect()->route("errors.404")->withInfo(trans("ownership.owner.not"));
		}

		$rental->delete();

		if($request->wantsJson()) {
			return response(trans("ownership.success.delete"), 200);
		}

		return redirect()->route("rented.all")->withInfo(trans("ownership.success.delete"));
	}
}

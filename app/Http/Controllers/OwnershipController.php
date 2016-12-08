<?php

namespace Bookie\Http\Controllers;

use Auth;
use Bookie\Models\Car;
use Illuminate\Http\Request;
use Bookie\Http\Controllers\Controller;

class OwnershipController extends Controller {

	protected function rules() {
        return [
            'car' => 'required|exists:cars,id',
        ];
    }

	public function getAdd(Request $request) {
		$cars = Car::all();

		if($request->wantsJson()) {
			return response($cars, 200);
		}

		return view("ownership.add", ["cars" => $cars]);
	}

	public function postAdd(Request $request) {
		$this->validate($request, $this->rules());

		Auth::user()->owns()->attach($request->input("car"));

		if($request->wantsJson()) {
			return response(trans("ownership.success.add"), 200);
		}

		return redirect()->route("owned.all")->withInfo(trans("ownership.success.add"));
	}

	public function all(Request $request) {
		$owns = Auth::user()->owns()->paginate(config("view.itemsPerPage"));

		if($request->wantsJson()) {
			return response($owns, 200);
		}

		return view("ownership.list", ["cars" => $owns]);
	}

	public function one($id, Request $request) {
		$owns = Auth::user()->owns()->find($id)->first();

		if(!$owns) {
			if($request->wantsJson()) {
				return response(trans("ownership.owner.not"), 404);
			}

			return redirect()->route("errors.404")->withInfo(trans("ownership.owner.not"));
		}

		return view("ownership.details", ["car" => $owns]);
	}

	public function delete($id, Request $request) {
		$owns = Auth::user()->owns()->find($id);

		if(!$owns) {
			if($request->wantsJson()) {
				return response(trans("ownership.owner.not"), 404);
			}

			return redirect()->route("errors.404")->withInfo(trans("ownership.owner.not"));
		}
		Auth::user()->owns()->detach($id);

		if($request->wantsJson()) {
			return response(trans("ownership.success.delete"), 200);
		}

		return redirect()->route("owned.all")->withInfo(trans("ownership.success.delete"));
	}
}

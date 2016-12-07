@extends("templates.default")

@section("content")
				<form class='form-horizontal' role='form' method='post' action='{{ route("owned.add") }}'>
					<legend>Add a car for rental</legend>
					<div class="form-group">
						<label class="col-md-4 control-label" for="car">Car:</label>
						<div class="col-md-5">
							<select class="form-control" id="car" name="car">
								<option selected></option>
								@if(!empty($cars))
									@foreach($cars as $car)
										<option value='{{ $car->id }}'>{{ $car->manufacturer . " " . $car->model }}</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>

					<input name='_token' type='hidden' value='{{ Session::token() }}'>

					<!-- Submit button -->
					<div class='form-group'>
						<label class='col-md-4 control-label' for=''></label>
						<div class='col-md-4'>
							<button type='submit' class='btn btn-primary'>Add</button>
						</div>
					</div>
				</form>
@stop
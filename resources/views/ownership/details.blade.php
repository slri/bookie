@extends("templates.default")

@section("content")
				@if(!empty($car))
					<h2>{{ $car->type->manufacturer . " " . $car->type->model }}</h2>
					<p>{{ $car->type->description }}</p>
					<p>Owned by <a href='{{ "" }}'></a></p>

					<hr>

					<h3>About owner:</h3>
					<p>...</p>
				@endif
@stop
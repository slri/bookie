@extends("templates.default")

@section("content")
				@if(!empty($car))
					<h2>{{ $car->manufacturer . " " . $car->model }}</h2>
					<p>{{ $car->description }}</p>
					<p>Owned by <a href='{{ route("user", ["id" => $car->owner->id]) }}'></a></p>

					<hr>

					<h3>About {{ $car->owner->name }}:</h3>
					<p>...</p>
				@endif
@stop
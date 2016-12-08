@extends("templates.default")

@section("content")
				@if(!empty($car))
				{{ var_dump($car) }}
					<h2>{{ $car->original["manufacturer"] . " " . $car->original["model"] }}</h2>
					<p>{{ $car->original["description"] }}</p>
					<p>Owned by <a href='{{ "" }}'></a></p>

					<hr>

					<h3>About owner:</h3>
					<p>...</p>
				@endif
@stop
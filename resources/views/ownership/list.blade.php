@extends("templates.default")

@section("content")
				@if(!empty($cars))
					<ul>
						@foreach($cars as $car)
							<li>{{ $car->manufacturer . " " . $car->model }}</li>
						@endforeach
					</ul>
				@endif
@stop
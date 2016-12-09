@extends("templates.default")

@section("content")
				@if(!empty($cars))
					<ul>

						@foreach($cars as $car)
							<li class="jumbotron jumbotron-parent clearfix">
								<h4>{{ $car->type->manufacturer . " " . $car->type->model }}</h4>
								<div class="jumbotron jumbotron-child">{{ $car->type->description }}</div>
								<div class="col-sm-2 col-sm-offset-8">
									<a href='{{ route("rent", ["id" => $car->id]) }}' class="btn btn-block btn-default"><i class="fa fa-check"></i></a>
								</div>
								<div class="col-sm-2">
									<a href='{{ "" }}' class="btn btn-block btn-default"><i class="fa fa-angle-right"></i></a>
								</div>
							</li>
						@endforeach
					</ul>
					<div class="text-center">
						{{ $cars->links() }}
					</div>
				@endif
@stop
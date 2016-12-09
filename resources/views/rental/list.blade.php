@extends("templates.default")

@section("content")
				@if(!empty($rentals))
					<ul>

						@foreach($rentals as $rental)
							<li class="jumbotron jumbotron-parent clearfix">
								<h4>{{ $rental->car->type->manufacturer . " " . $rental->car->type->model }}</h4>
								<div class="jumbotron jumbotron-child">{{ $rental->car->type->description }}</div>
								<div class="col-sm-2 col-sm-offset-8">
									<a href='{{ route("rented.delete", ["id" => $rental->id]) }}' class="btn btn-block btn-default"><i class="fa fa-close"></i></a>
								</div>
								<div class="col-sm-2">
									<a href='{{ "" }}' class="btn btn-block btn-default"><i class="fa fa-angle-right"></i></a>
								</div>
							</li>
						@endforeach
					</ul>
					<div class="text-center">
						{{ $rentals->links() }}
					</div>
				@endif
@stop
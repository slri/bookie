				@if(Session::has("info"))
					<div class='alert alert-info'>
					  {{ Session::get("info") }}
					</div>
				@elseif(Session::has("warning"))
					<div class='alert alert-warning'>
					  {{ Session::get("warning") }}
					</div>
				@elseif(Session::has("danger"))
					<div class='alert alert-danger'>
					  {{ Session::get("danger") }}
					</div>
				@endif

				@if(!empty($notifications))
					@foreach($notifications as $notif)
						<div class='alert alert-warning'>
						  {{ $notif->message }}
						</div>
					@endforeach
				@endif
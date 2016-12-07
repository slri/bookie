@extends("templates.default")

@section("content")
				<form class='form-horizontal' role='form' method='post' action='{{ route("login") }}'>
					<legend>Login</legend>
					<div class='form-group{{ $errors->has("email") ? " has-error" : "" }}'>
						<label class='col-md-4 control-label' for='email'>Email:</label>
						<div class='col-md-5'>
							<input id='email' name='email' type='email' class='form-control input-md' value='{{ old("email") ?: "" }}'>
							@if($errors->has("email"))
								<span class='help-block'>{{ $errors->first("email") }}</span>
							@endif 
						</div>
					</div>
					<div class='form-group{{ $errors->has("password") ? " has-error" : "" }}'>
						<label class='col-md-4 control-label' for='password'>Password:</label>
						<div class='col-md-5'>
							<input id='password' name='password' type='password' class='form-control input-md'>
							@if($errors->has("password"))
								<span class='help-block'>{{ $errors->first("password") }}</span>
							@endif 
						</div>
					</div>

					<input name='_token' type='hidden' value='{{ Session::token() }}'>

					<!-- Submit button -->
					<div class='form-group'>
						<label class='col-md-4 control-label' for=''></label>
						<div class='col-md-4'>
							<button type='submit' class='btn btn-primary'>Login</button>
						</div>
					</div>
				</form>
@stop
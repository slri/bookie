            <nav class='navbar navbar-default' role='navigation'>
				<div class='container'>
					<div class='navbar-header'>
						<a class='navbar-brand' href='{{ route("home") }}'>Bookie</a>
					</div>
					<div class='collapse navbar-collapse'>

					<ul class='nav navbar-nav'>
						<li><a href='{{ route("home") }}'>Home</a></li>
						<li><a href='{{ route("rentable") }}'>Rent a Car</a></li>
					</ul>

					<ul class='nav navbar-nav navbar-right'>

						@if(Auth::check())
							<li><a>{{ Auth::user()->name }}</a></li>

							<li class='dropdown btn-group'>
								<a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>My Cars <i class="caret"></i></a>
								<ul class='dropdown-menu'>
									<li><a href='{{ route("owned.add") }}'>Add</a></li>
									<li class='divider'></li>
									<li><a href='{{ route("owned.all") }}'>Manage</a></li>
								</ul>
							</li>
							<li class='dropdown btn-group'>
								<a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>My Rentals <i class="caret"></i></a>
								<ul class='dropdown-menu'>
									<li><a href='{{ route("rented.all") }}'>Manage</a></li>
								</ul>
							</li>

							<li><a href='{{ "" }}'>My Settings</a></li>

							<li><a href='{{ route("logout") }}'>Logout</a></li>

						@else
						<li><a href='{{ route("register") }}'>Register</a></li>
						<li><a href='{{ route("login") }}'>Login</a></li>

						@endif 
					</ul>
					</div>
				</div>
			</nav>
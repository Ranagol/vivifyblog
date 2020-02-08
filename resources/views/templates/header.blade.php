<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="/welcome">Welcome</a>
				<a class="nav-item nav-link" href="/">Svi postovi</a>
				<a class="nav-item nav-link" href="/posts">Create new post</a>
				<a class="nav-item nav-link" href="/send/mail">Send mail</a>
				@if(Auth::check())
					<a class="nav-item nav-link" href="/#">Username: {{ auth()->user()->name }}</a>
					<a class="nav-item nav-link" href="/logout">Logout</a>
				@endif
				
			</div>
	</nav>
</div>

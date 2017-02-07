@extends('layouts.login')

@section('content')
<main class="uk-vertical-align sikd-login">
	<div class="uk-vertical-align-middle uk-width-1-1">
		<div class="uk-container uk-container-center uk-width-medium-2-3">
			<div class="card z-depth-3 soft hoverable">
				<div class="uk-grid uk-grid-collapse">
					<div class="uk-width-medium-1-2 card-image waves-effect waves-block waves-light">
						<img class="activator" src="assets/img/img-login.jpg">
						<h1 class="card-title">Dashboard Executive Information System SIKD</h1>
						<ul class="uk-subnav uk-subnav-line sikd-link-login">
			                <li><a href="{!! url('/tentang') !!}">Tentang</a></li>
			                <li><a href="{!! url('/disclaimer') !!}">Disclaimer</a></li>
			                <li><a href="{!! url('/panduan') !!}">Panduan</a></li>
			            </ul>
					</div>
					<div class="uk-width-medium-1-2">
						<div class="card-content">
							<form class="" action="{!! url('/login') !!}" method="post">
								<div class="row center">
									<span class="sikd-login-logo uk-margin-top"><img class="sikd-logo" src="assets/img/logo.png"></span>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix">email</i>
										<input id="email" name="username" type="email" class="validate">
										<label for="email">Your Email</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix">lock</i>
										<input id="password" name="password" type="password" class="validate">
										<label for="password">Password</label>
									</div>
								</div>
								<div class="row uk-margin-remove center">
									<button type="submit" name="login" class="btn waves-effect sikd-pink-bg">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection
@section('page-level-scripts')
	<script src="{!! asset('assets/js/jquery.js') !!}"></script>
	<script src="{!! asset('assets/js/materialize.min.js') !!}"></script>
@endsection

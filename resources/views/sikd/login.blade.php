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
			                <li><a href="#">Tentang</a></li>
			                <li><a href="#">Disclaimer</a></li>
			                <li><a href="#">Panduan</a></li>
			            </ul>
					</div>
					<div class="uk-width-medium-1-2">
						<div class="card-content">
							<form class="" action="{!! url('/login') !!}" method="post">
								<div class="row center">
									<span class="sikd-login-logo uk-margin-top sikd-blue-bg"><img class="sikd-logo" src="assets/img/logo-white.png"></span>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix">email</i>
										<input id="email" type="email" class="validate">
										<label for="email">Your Email</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix">lock</i>
										<input id="password" type="password" class="validate">
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
			<?php /*
			<div class="card-panel">
				<form class="col s12" action="{!! url('/login') !!}" method="post">
					<div class='row center'>
						<img class="sikd-logo uk-margin-top" src="assets/img/logo.png">
					</div>
					<div class="row uk-margin-remove">
						<div class='input-field col s12'>
							<input class='validate' type='email' name='username' id='email' />
							<label for='email'>Enter your email</label>
						</div>
					</div>

					<div class="row uk-margin-remove">
						<div class='input-field col s12'>
							<input class='validate' type='password' name='password' id='password' />
							<label for='password'>Enter your password</label>
						</div>
					</div>
					<div class="row uk-margin-remove">
						<button type='submit' name='login' class='btn waves-effect right indigo'>Login</button>
					</div>
				</form>
			</div>
			*/ ?>
		</div>
	</div>
</main>
@endsection
@section('page-level-scripts')

@endsection

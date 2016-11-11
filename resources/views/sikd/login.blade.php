@extends('layouts.login')

@section('content')
<main class="uk-vertical-align sikd-login">
	<div class="uk-vertical-align-middle uk-width-1-1">
		<div class="uk-container uk-container-center uk-width-1-3">
			<div class="card-panel">
				<form class="col s12" action="{!! url('/') !!}">
					<div class='row center'>
						<img class="sikd-logo uk-margin-top" src="assets/img/logo.png">
					</div>
					<div class="row uk-margin-remove">
						<div class='input-field col s12'>
							<input class='validate' type='email' name='email' id='email' />
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
		</div>
	</div>
</main>
@endsection
@section('page-level-scripts')

@endsection

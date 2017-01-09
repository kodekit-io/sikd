@extends('layouts.default')

@section('content')
<main class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
	<div class="uk-grid uk-margin-top uk-margin-bottom" data-uk-grid-match data-uk-grid-margin>
		<div class="uk-width-medium-1-1">
			<div class="card z-depth-3 soft hoverable">
				<div class="card-toolbar">
					<h2 class="card-title">
						My Account
					</h2>
				</div>
				<div class="card-content">
					<form class="uk-grid uk-grid-medium" data-uk-grid-margin>
						<div class="uk-width-medium-1-2">
							<div class="row">
								<h3 class="col s12">Profil</h3>
								<div class="input-field col s12">
									<input disabled value="admin" id="disabled" type="text" class="validate">
									<label for="disabled">Username (not editable)</label>
								</div>
								<div class="input-field col s12">
									<input id="name" type="text" class="validate">
									<label for="name">Nama</label>
								</div>
								<div class="input-field col s12">
									<input id="email" type="email" class="validate">
									<label for="email">Email</label>
								</div>
							</div>
						</div>
						<div class="uk-width-medium-1-2">
							<div class="row">
								<h3 class="col s12">Change Password</h3>
								<div class="input-field col s12">
									<input id="password" type="password" class="validate">
									<label for="password">New Password</label>
								</div>
								<div class="input-field col s12">
									<input id="password2" type="password" class="validate">
									<label for="password2">Repeat Password</label>
								</div>
							</div>
						</div>
						<div class="uk-width-medium-1-1">
							<hr>
							<div class="row">
								<div class="col s12">
									<button class="right btn waves-effect waves-light sikd-blue-bg white-text" type="submit" name="action">SAVE
										<i class="material-icons right">send</i>
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection

@section('page-level-scripts')
@endsection

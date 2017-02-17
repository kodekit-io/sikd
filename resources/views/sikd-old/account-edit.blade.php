@extends('layouts.default')

@section('content')
<main class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
	<div class="uk-grid uk-margin-top uk-margin-bottom" data-uk-grid-match data-uk-grid-margin>
		<div class="uk-width-medium-1-1">
			<div class="card z-depth-3 soft hoverable">
				<div class="card-toolbar">
					<h2 class="card-title">
						Edit Account
					</h2>
					<a href="#" class="orange z-depth-0 btn right" onclick="window.history.back();return false;">BACK <i class="material-icons left">keyboard_arrow_left</i></a>
				</div>
				<div class="card-content">
					<form class="uk-grid uk-grid-medium" data-uk-grid-margin>
						<div class="uk-width-medium-1-2">
							<div class="row">
								<h3 class="col s12">Profil</h3>
								<div class="input-field col s12">
									<input id="username" type="text" class="validate">
									<label for="username">Username</label>
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
								<h3 class="col s12">Password</h3>
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
							<div class="row">
								<h3 class="col s12">Akses</h3>
							<div class="row">
								<div class="col s12">
									<ul class="uk-subnav uk-subnav-line">
										<li>
											<input type="checkbox" class="filled-in" id="level1" checked="checked" />
											<label for="level1">Page Level 1</label>
										</li>
										<li>
											<input type="checkbox" class="filled-in" id="level2" checked="checked" />
											<label for="level2">Page Level 2</label>
										</li>
										<li>
											<input type="checkbox" class="filled-in" id="level3" checked="checked" />
											<label for="level3">Page Level 3</label>
										</li>
										<li>
											<input type="checkbox" class="filled-in" id="account-profile" checked="checked" />
											<label for="account-profile">Account Profile</label>
										</li>
										<li>
											<input type="checkbox" class="filled-in" id="account-edit"/>
											<label for="account-edit">Edit Account</label>
										</li>
										<li>
											<input type="checkbox" class="filled-in" id="account-add" />
											<label for="account-add">Add Account</label>
										</li>
										<li>
											<input type="checkbox" class="filled-in" id="account-manage" />
											<label for="account-manage">Manage Account</label>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="uk-width-medium-1-1">
							<div class="row uk-margin-small-bottom">
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

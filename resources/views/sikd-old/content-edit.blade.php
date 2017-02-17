@extends('layouts.default')

@section('content')
<main class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
	<div class="uk-grid uk-margin-top uk-margin-bottom" data-uk-grid-match data-uk-grid-margin>
		<div class="uk-width-medium-1-1">
			<div class="card z-depth-3 soft hoverable">
				<div class="card-toolbar">
					<h2 class="card-title">
						Edit Static Page
					</h2>
					<a href="#" class="orange z-depth-0 btn right" onclick="window.history.back();return false;">BACK <i class="material-icons left">keyboard_arrow_left</i></a>
				</div>
				<div class="card-content">
					<form class="uk-grid uk-grid-medium" data-uk-grid-margin>
						<div class="uk-width-medium-1-1">
							<div class="row">
								<h3 class="col s12">Judul</h3>
								<div class="input-field col s12">
									<input id="judul" type="text" class="validate">
								</div>
							</div>
							<div class="row">
								<h3 class="col s12">Post</h3>
								<div class="input-field col s12">
									<textarea id="post" class="materialize-textarea"></textarea>
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

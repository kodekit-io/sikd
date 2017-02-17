@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/datatables/dataTables.uikit.min.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
	<div class="uk-grid uk-margin-top uk-margin-bottom" data-uk-grid-match data-uk-grid-margin>
		<div class="uk-width-medium-1-1">
			<div class="card z-depth-3 soft hoverable">
				<div class="card-toolbar">
					<h2 class="card-title">
						Manage Accounts
					</h2>
					<a href="{!! url('/account-add') !!}" class="orange z-depth-0 btn right">ADD USER</a>
				</div>
				<div class="card-content">
					<table id="account_manage" class="uk-table uk-table-hover uk-table-striped uk-width-1-1"></table>
				</div>
			</div>
		</div>
	</div>
</main>
<?php //Modal Delete ?>
<div id="delete" class="uk-modal">
    <div class="uk-modal-dialog">
		<div class="uk-modal-header"><h2>Are you sure?</h2></div>
        <p>This user will be deleted FOREVER!</p>
		<div class="uk-modal-footer uk-clearfix">
			<ul class="uk-subnav">
				<li><a href="#" class="uk-modal-close uk-button grey white-text">CANCEL</a></li>
				<li><a href="#" class="uk-modal-close uk-button red white-text">YES, DELETE NOW!</a></li>
			</ul>
		</div>
    </div>
</div>

@endsection

@section('page-level-scripts')
<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('assets/js/datatables/dataTables.uikit.min.js') !!}"></script>
<script src="{!! asset('assets/js/pages/account-manage.js') !!}"></script>
@endsection

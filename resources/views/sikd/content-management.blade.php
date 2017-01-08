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
						Manage Contents
					</h2>
				</div>
				<div class="card-content">
					<table id="konten_manage" class="uk-table uk-table-hover uk-table-striped uk-width-1-1"></table>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection

@section('page-level-scripts')
<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('assets/js/datatables/dataTables.uikit.min.js') !!}"></script>
<script src="{!! asset('assets/js/pages/content-manage.js') !!}"></script>
@endsection

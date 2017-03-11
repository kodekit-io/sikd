@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/lib/dataTables.sikd.css') !!}" />
@endsection
@section('content')
@include('includes.nav-setting')
<main class="uk-container uk-container-expand sikd-cms">
	<div class="uk-card uk-card-hover uk-card-default uk-card-small uk-animation-fade l3card">
		<div class="uk-card-header uk-grid-small" uk-grid>
			<div class="uk-width-expand@m">
				<h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase">Pengaturan Pengguna</h3>
			</div>
			<div class="uk-width-auto@m">
				<a class="uk-button uk-button-small uk-button-default" href="{!! url('user/add') !!}">Tambah Pengguna</a>
			</div>
		</div>
		<div class="uk-card-body">
            @if($errors->any())
                <h4>{{ $errors->first() }}</h4>
            @endif
			<div class="uk-overflow-auto">
				<table id="list" class="uk-table uk-margin-remove" cellspacing="0" width="100%"></table>
			</div>
		</div>
	</div>
</main>
@endsection

@section('page-level-scripts')
	<script type="text/javascript">
		var $baseUrl = "{!! url('/') !!}";
		var $token = "{!! csrf_token() !!}";
	</script>
	<script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/echarts.theme.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/dataTables.sikd.js') !!}"></script>
	<script src="{!! asset('assets/js/lib/jquery.validate.min.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/manage-account.js') !!}"></script>
@endsection

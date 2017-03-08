@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/lib/dataTables.sikd.css') !!}" />
@endsection
@section('content')
<nav class="uk-navbar-container sikd-topbar" uk-sticky>
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li><a href="{!! url('/manage-account') !!}">Pengaturan Pengguna</a></li>
            <li class="uk-active"><a href="{!! url('/manage-tkdd') !!}">Postur TKDD</a></li>
			<li><a href="{!! url('/manage-apbd') !!}">Postur APBD</a></li>
			<li><a href="{!! url('/manage-apbd-mapping') !!}">Mapping Akun APBD</a></li>
        </ul>

    </div>
</nav>
<main class="uk-container uk-container-expand sikd-cms">
	<div class="uk-card uk-card-hover uk-card-default uk-card-small uk-animation-fade l3card">
		<div class="uk-card-header uk-grid-small" uk-grid>
			<div class="uk-width-expand@m">
				<h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase">Postur TKDD</h3>
			</div>
			<div class="uk-width-auto@m">
				<a href="{!! url('/manage-tkdd-add') !!}" class="uk-button uk-button-small uk-button-default " type="button">Tambah Postur</a>
			</div>
		</div>
		<div class="uk-card-body">
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
	</script>
	<script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/echarts.theme.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/dataTables.sikd.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/manage-tkdd.js') !!}"></script>
@endsection

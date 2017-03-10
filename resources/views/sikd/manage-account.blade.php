@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/lib/dataTables.sikd.css') !!}" />
@endsection
@section('content')
<nav class="uk-navbar-container sikd-topbar" uk-sticky>
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="{!! url('/manage-account') !!}">Pengaturan Pengguna</a></li>
            <li><a href="{!! url('/manage-tkdd') !!}">Postur TKDD</a></li>
			<li><a href="{!! url('/manage-apbd') !!}">Postur APBD</a></li>
			<li><a href="{!! url('/manage-apbd-mapping') !!}">Mapping Akun APBD</a></li>
        </ul>

    </div>
</nav>
<main class="uk-container uk-container-expand sikd-cms">
	<div class="uk-card uk-card-hover uk-card-default uk-card-small uk-animation-fade l3card">
		<div class="uk-card-header uk-grid-small" uk-grid>
			<div class="uk-width-expand@m">
				<h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase">Pengaturan Pengguna</h3>
			</div>
			<div class="uk-width-auto@m">
				<a id="add_account_btn" class="uk-button uk-button-small uk-button-default" uk-toggle="target: #add_account">Tambah Pengguna</a>
				<div id="add_account" uk-modal>
				    <div class="uk-modal-dialog uk-modal-body">
				        <button class="uk-modal-close-default" type="button" uk-close></button>
				        <h4>Tambah Pengguna</h4>
						<form id="add_account_form" method="post" action="{!! url('/user/add') !!}">
							<div class="uk-margin">
						        <label class="uk-form-label" for="name">Nama</label>
						        <div class="uk-form-controls">
						            <input class="uk-input" id="name" name="name" type="text" placeholder="Nama">
						        </div>
						    </div>
							<div class="uk-margin">
						        <label class="uk-form-label" for="email">Email</label>
						        <div class="uk-form-controls">
						            <input class="uk-input" id="email" name="email" type="text" placeholder="email@domain.name">
						        </div>
						    </div>
							<div class="uk-flex uk-flex-between">
					            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
					            <button class="uk-button uk-button-primary" type="submit">Save</button>
					        </div>
						</form>
				    </div>
				</div>
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
		var $token = "{!! csrf_token() !!}";
	</script>
	<script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/echarts.theme.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/dataTables.sikd.js') !!}"></script>
	<script src="{!! asset('assets/js/lib/jquery.validate.min.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/manage-account.js') !!}"></script>
@endsection

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
				<h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase">Edit Pengguna</h3>
			</div>
			<div class="uk-width-auto@m">
				<button class="uk-button uk-button-small uk-button-default" type="button" onclick="history.go(-1);" title="Kembali ke halaman sebelumnya" uk-tooltip="pos: left"><span uk-icon="icon: arrow-left"></span> BACK</button>
			</div>
		</div>
		<div class="uk-card-body">
			<form id="add_account_form" method="post" action="{!! url('user/update/' . $id) !!}">
				{!! csrf_field() !!}
				<input type="hidden" id="id" name="id" value="">
				<div class="uk-margin">
					<label class="uk-form-label" for="name">Nama</label>
					<div class="uk-form-controls">
						<input class="uk-input" id="name" name="name" type="text" placeholder="Nama" value="{!! $user->name !!}">
					</div>
				</div>
				<div class="uk-margin">
					<label class="uk-form-label" for="email">Email</label>
					<div class="uk-form-controls">
						<input class="uk-input" id="email" name="email" type="text" placeholder="email@domain.name" value="{!! $user->email !!}">
					</div>
				</div>
				<input type="hidden" id="created_at" name="created_at" value="">
				<input type="hidden" id="updated_at" name="updated_at" value="">
				<div class="uk-flex uk-flex-between">
					<a href="{!! url('/user/edit/' . $id) !!}" class="uk-button uk-button-default uk-modal-close">Cancel</a>
					<button class="uk-button uk-button-primary" type="submit">Save</button>
				</div>
			</form>
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
	<script src="{!! asset('assets/js/lib/jquery.validate.min.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/manage-account.js') !!}"></script>
@endsection

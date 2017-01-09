@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/datatables/dataTables.materialize.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-center uk-margin-top">
	<div class="card z-depth-3 soft hoverable sikd-map">
		<div class="card-toolbar">
			<h2 class="card-title">
				Realisasi Total Penyaluran TKDD Se-Provinsi Bali
			</h2>
			<a href="#" data-activates="switchdata" class="dropdown-button orange z-depth-0 btn right" data-beloworigin="true" data-alignment="right">PILIH PROVINSI <i class="material-icons right">arrow_drop_down</i></a>
			<ul id="switchdata" class="dropdown-content">
				<li><a href="#!">Nanggro Aceh Darussalam</a></li>
				<li><a href="#!">Sumatera Utara</a></li>
				<li><a href="#!">Sumatera Barat</a></li>
				<li><a href="#!">Riau</a></li>
				<li><a href="#!">Kepulauan Riau</a></li>
				<li><a href="#!">Jambi</a></li>
				<li><a href="#!">Sumatera Selatan</a></li>
				<li><a href="#!">Bangka Belitung</a></li>
				<li><a href="#!">Bengkulu</a></li>
				<li><a href="#!">Lampung</a></li>
				<li><a href="#!">DKI Jakarta</a></li>
				<li><a href="#!">Jawa Barat</a></li>
				<li><a href="#!">Banten</a></li>
				<li><a href="#!">Jawa Tengah</a></li>
				<li><a href="#!">Daerah Istimewa Yogyakarta</a></li>
				<li><a href="#!">Jawa Timur</a></li>
				<li><a href="#!">Bali</a></li>
				<li><a href="#!">Nusa Tenggara Barat</a></li>
				<li><a href="#!">Nusa Tenggara Timur</a></li>
				<li><a href="#!">Kalimantan Barat</a></li>
				<li><a href="#!">Kalimantan Tengah</a></li>
				<li><a href="#!">Kalimantan Selatan</a></li>
				<li><a href="#!">Kalimantan Timur</a></li>
				<li><a href="#!">Kalimantan Utara</a></li>
				<li><a href="#!">Sulawesi Utara</a></li>
				<li><a href="#!">Sulawesi Barat</a></li>
				<li><a href="#!">Sulawesi Tengah</a></li>
				<li><a href="#!">Sulawesi Tenggara</a></li>
				<li><a href="#!">Sulawesi Selatan</a></li>
				<li><a href="#!">Gorontalo</a></li>
				<li><a href="#!">Maluku</a></li>
				<li><a href="#!">Maluku Utara</a></li>
				<li><a href="#!">Papua Barat</a></li>
				<li><a href="#!">Papua</a></li>
			</ul>
		</div>
		<div class="card-content">
			<table id="tableProv" class="display uk-table-condensed uk-margin-remove" cellspacing="0" width="100%"></table>
		</div>

	</div>
</main>
@endsection

@section('page-level-scripts')
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/dataTables.materialize.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-2.js') !!}"></script>
@endsection

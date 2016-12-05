@extends('layouts.default')

@section('content')
<main class="uk-container uk-container-center">
	<div class="card uk-margin-top uk-margin-bottom sikd-map">
		<div class="card-action card-toolbar">
			<h2 class="card-title uk-margin-remove">
				REALISASI TOTAL PENYALURAN TKDD NASIONAL
			</h2>
			<a href="#" data-activates="switchdata" class="dropdown-button orange z-depth-0 btn right" data-beloworigin="true" data-alignment="right">Pilih Jenis Informasi <i class="material-icons right">arrow_drop_down</i></a>
			<!-- Dropdown Structure -->
			<ul id="switchdata" class="dropdown-content">
				<li><a href="#!">Penyaluran TKDD</a></li>
				<li><a href="#!">Penyaluran DAK</a></li>
				<li><a href="#!">Penyaluran DD</a></li>
				<li><a href="#!">Penyaluran DID</a></li>
				<li><a href="#!">Penyerapan DAK</a></li>
				<li><a href="#!">Pelaporan DD</a></li>
				<li><a href="#!">Penerima DID</a></li>
				<li><a href="#!">Belanja APBD</a></li>
				<li><a href="#!">PAD</a></li>
				<li><a href="#!">Belanja Modal</a></li>
				<li><a href="#!">Belanja Pegawai</a></li>
				<li><a href="#!">Belanja Perjadin</a></li>
				<li><a href="#!">APBD</a></li>
				<li><a href="#!">LPP APBD</a></li>
			</ul>
		</div>
		<div class="card-content">
			<div id="map" class=""></div>
		</div>

	</div>
</main>
@endsection

@section('page-level-scripts')
	<script src="{!! asset('assets/js/highcharts/highmaps.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/id-all.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-1.js') !!}"></script>
@endsection
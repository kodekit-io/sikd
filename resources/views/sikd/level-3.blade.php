@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/datatables/dataTables.materialize.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-center">
	<ul class="uk-grid uk-grid-small uk-margin-top uk-margin-bottom" data-uk-grid-match data-uk-grid-margin>
		<li class="uk-width-1-1">
			<div class="card uk-margin-remove">
				<div class="card-action card-toolbar">
					<h2 class="card-title uk-margin-remove">
						DATA UMUM KAB. BADUNG
					</h2>
					<a href="{!! url('/') !!}" class="btn-floating waves-effect waves-light right z-depth-0 indigo" data-uk-tooltip title="Ke Beranda"><i class="material-icons">home</i></a>
					<a href="javascript: history.go(-1)" class="btn-floating waves-effect waves-light right z-depth-0 orange uk-margin-small-right" data-uk-tooltip title="Halaman Sebelumnya"><i class="material-icons">arrow_back</i></a>
				</div>
			</div>
		</li>
		<li class="uk-width-1-5">
			<div class="card-panel bgmap" style="background-image:url(http://wisata.balitoursclub.com/wp-content/uploads/2012/09/Peta-Badung.jpg)">
				<div class="note">
					Population (2010)<br>
					 • Total: 543332<br>
					 • Kepadatan: 1293,37 jiwa/km2<br>
					 • Kecamatan: 6<br>
					 • Kelurahan: 63<br>
				</div>
			</div>
		</li>
		<li class="uk-width-1-5">
			<div class="card-panel">
				<div class="skid-gauge-wrap">
					<div id="g1" class="skid-gauge"></div>
				</div>
			</div>
		</li>
		<li class="uk-width-1-5">
			<div class="card-panel">
				<div class="skid-gauge-wrap">
					<div id="g2" class="skid-gauge"></div>
				</div>
			</div>
		</li>
		<li class="uk-width-1-5">
			<div class="card-panel">
				<div class="skid-gauge-wrap">
					<div id="g3" class="skid-gauge"></div>
				</div>
			</div>
		</li>
		<li class="uk-width-1-5">
			<div class="card-panel">
				<div class="skid-gauge-wrap">
					<div id="g4" class="skid-gauge"></div>
				</div>
			</div>
		</li>
		<li class="uk-width-1-1">
			<div class="card-panel">
				<ul class="tabs uk-margin-bottom-remove" style="border-bottom: 1px solid #ddd;">
					<li class="tab col s3"><a class="active" href="#tab1">Data Realisasi TKDD</a></li>
					<li class="tab col s3"><a href="#tab2">Data PAD</a></li>
					<li class="tab col s3"><a href="#tab3">Belanja Perjenis</a></li>
					<li class="tab col s3"><a href="#tab4">Opini LKPD</a></li>
				</ul>
				<div id="tab1" class="col s12">
					Tabel Realisasi TKDD
				</div>
				<div id="tab2" class="col s12">
					Tabel Data PAD
				</div>
				<div id="tab3" class="col s12">
					Tabel Belanja Perjenis
				</div>
				<div id="tab4" class="col s12">
					Tabel Opini LKPD
				</div>
			</div>
		</li>
	</ul>
</main>
@endsection

@section('page-level-scripts')
	<script src="{!! asset('assets/js/highcharts/highcharts.js') !!}"></script>
	<script src="{!! asset('assets/js/highcharts/highcharts-more.js') !!}"></script>
	<script src="{!! asset('assets/js/highcharts/modules/solid-gauge.js') !!}"></script>
	<script src="{!! asset('assets/js/highcharts/themes/mw.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/dataTables.materialize.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-3.js') !!}"></script>
	<script>
	$('.tablenya').DataTable({
		"pageLength": 50,
		"paging": false,
		"searching": false,
		"info": false,
		"lengthChange": false,
	});
	</script>
@endsection

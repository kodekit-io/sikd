@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/lib/dataTables.sikd.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-expand">
	<div class="uk-card uk-card-hover uk-card-default uk-card-small uk-animation-fade l3card">
		<div class="uk-card-header uk-grid-small" uk-grid>
			<div class="uk-width-expand@m">
				<h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase">Profil {!! $pemdaName !!} Tahun {!! $year !!}</h3>
			</div>
			<div class="uk-width-auto@m">
				<button class="uk-button uk-button-small uk-button-default " type="button"><span class="uk-visible@m">PILIH </span>TAHUN <span uk-icon="icon: chevron-down"></span></button>
				<div uk-dropdown>
		            <ul class="uk-nav uk-nav-default uk-dropdown-nav">
						@foreach($years as $theYear)
							<li><a href="{!! url('pemda/' . $satkerCode . '/' . $theYear) !!}">{!! $theYear !!}</a></li>
						@endforeach
		            </ul>
				</div>
				<button class="uk-button uk-button-small uk-button-default" type="button" onclick="history.go(-1);" title="Kembali ke halaman sebelumnya" uk-tooltip="pos: left"><span uk-icon="icon: arrow-left"></span> BACK</button>
			</div>
		</div>
		<div class="uk-card-body">
			<div class="uk-grid-small uk-grid-match" uk-grid>
				<div id="panel1" class="l3panel uk-width-1-5@m uk-width-1-1@s"></div>
				<div id="panel2" class="l3panel uk-width-1-5@m uk-width-1-2@s"></div>
				<div id="panel3" class="l3panel uk-width-1-5@m uk-width-1-2@s"></div>
				<div id="panel4" class="l3panel uk-width-1-5@m uk-width-1-2@s"></div>
				<div id="panel5" class="l3panel uk-width-1-5@m uk-width-1-2@s"></div>
			</div>
			<ul uk-tab>
			    <li><a href="#" class="rem125 uk-text-bold">TKDD</a></li>
			    <li><a href="#" class="rem125 uk-text-bold">APBD</a></li>
			    <li><a href="#" class="rem125 uk-text-bold">LAINNYA</a></li>
			</ul>
			<ul class="uk-switcher uk-margin">
			    <li>
					<div class="uk-overflow-auto">
						<table id="tkdd" class="uk-table uk-table-striped uk-margin-remove" cellspacing="0" width="100%"></table>
					</div>
				</li>
				<li>
					<div class="uk-overflow-auto">
						<table id="apbd" class="uk-table uk-table-striped uk-margin-remove" cellspacing="0" width="100%"></table>
					</div>
				</li>
				<li>
					<div id="lainnya"></div>
				</li>
			</ul>

		</div>
	</div>
</main>
@endsection

@section('page-level-scripts')
	<script type="text/javascript">
		$('.uk-switcher').on('show.uk.switcher', function(){
			$(window).trigger('resize');
		});
		var $baseUrl = '{!! url('/') !!}';
		var $year = '{!! $year !!}';
		var $satkerCode = '{!! $satkerCode !!}';
	</script>
	<script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/echarts.theme.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-3.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-3-table-apbd.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-3-table-tkdd.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-3-table-lainnya.js') !!}"></script>
@endsection

@extends('layouts.default')
@section('page-level-styles')
@endsection
@section('content')
<main class="uk-container uk-container-expand">
	<div class="uk-card uk-card-hover uk-card-default uk-card-small uk-animation-fade l1card">
		<div class="uk-card-header uk-grid-small" uk-grid>
			<div class="uk-width-expand@m">
				<h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase"><span id="title"></span> Per Provinsi Tahun <span id="tahun">{!! $year !!}</span></h3>
			</div>
			<div class="uk-width-auto@m">
				<button class="uk-button uk-button-small uk-button-default " type="button"><span class="uk-visible@m">PILIH </span>TAHUN <span uk-icon="icon: chevron-down"></span></button>
				<div uk-dropdown>
		            <ul class="uk-nav uk-nav-default uk-dropdown-nav">
		                @foreach($years as $year)
		                <li><a href="{!! url('level-1/' . $reportType . '/' . $postureId . '/' . $year) !!}">{!! $year !!}</a></li>
		                @endforeach
		            </ul>
				</div>
				<button class="uk-button uk-button-small uk-button-default " type="button"><span class="uk-visible@m">PILIH </span>INFORMASI <span uk-icon="icon: chevron-down"></span></button>
				<div uk-dropdown class="uk-height-large uk-max-height-large uk-overflow-auto">
		            <ul class="uk-nav uk-nav-default uk-dropdown-nav">
						<li class="uk-nav-header">TKDD</li>
		                @foreach($postures as $posture)
		                    <li id="tkdd{!! $posture->idPostur !!}"><a href="{!! url('level-1/tkdd/' . $posture->idPostur . '/' . $year) !!}">{!! $posture->uraianPosturSingkat !!}</a></li>
		                @endforeach
						<li class="uk-nav-divider"></li>
						<li class="uk-nav-header">APBD</li>
						@foreach($reportTypes as $type)
							<li><a href="{!! url('level-1/apbd/' . $type->id . '/' . $year) !!}">{!! $type->name !!}</a></li>
						@endforeach
					</ul>
				</div>

				<button class="uk-button uk-button-small uk-button-default" type="button" onclick="history.go(-1);" title="Kembali ke halaman sebelumnya" uk-tooltip="pos: left"><span uk-icon="icon: arrow-left"></span> BACK</button>
			</div>
		</div>
		<div class="uk-card-body">
			<div id="map" class="sikd-map"></div>
		</div>
	</div>
</main>

@endsection

@section('page-level-scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tkdd45').hide();
		});
		var $baseUrl = "{!! url('/') !!}";
		var $reportType = "{!! $reportType !!}";
		var $postureId = "{!! $postureId !!}";
		var $reportName = "{!! $reportName !!}";
		var $year = $('#tahun').text();
	</script>
    <script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/echarts.theme.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-1.js') !!}"></script>
@endsection
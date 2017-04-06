@extends('layouts.default')
@section('page-level-styles')
@endsection
@section('content')
<main class="uk-container uk-container-expand">
	<div class="uk-card uk-card-hover uk-card-default uk-card-small uk-animation-fade l2card">
		<div class="uk-card-header uk-grid-small" uk-grid>
			<div class="uk-width-expand@m">
				<h3 class="uk-card-title sikd-blue-text uk-float-left uk-margin-remove uk-text-uppercase">{!! $reportName !!} Se-Provinsi {!! $provinceName !!} Tahun <span id="tahun">{!! $year !!}</span></h3>
			</div>
			<div class="uk-width-auto@m">

				<button class="uk-button uk-button-small uk-button-default " type="button"><span class="uk-visible@m">PILIH </span>TAHUN <span uk-icon="icon: chevron-down"></span></button>
				<div uk-dropdown>
		            <ul class="uk-nav uk-nav-default uk-dropdown-nav">
						@foreach($years as $theYear)
							<li><a href="{!! url('level-2/' . $type . '/' . $postureId . '/' . $theYear . '/' . $provinceId . '/' . $monthParam) !!}">{!! $theYear !!}</a></li>
						@endforeach
		            </ul>
				</div>

				@if($postureId == 'lra')
                    <button class="uk-button uk-button-small uk-button-default " type="button"><span class="uk-visible@m">PILIH </span>BULAN <span uk-icon="icon: chevron-down"></span></button>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-nav-default uk-dropdown-nav">
                            @foreach($months as $monthId => $month)
                                <li><a href="{!! url('level-2/' . $type . '/' . $postureId . '/' . $year . '/' . $provinceId . '/' . $monthId) !!}">{!! $month !!}</a></li>
                            @endforeach
                        </ul>
                    </div>
				@endif

				<button class="uk-button uk-button-small uk-button-default " type="button"><span class="uk-visible@m">PILIH </span>INFORMASI <span uk-icon="icon: chevron-down"></span></button>
				<div uk-dropdown class="uk-height-large uk-max-height-large uk-overflow-auto">
		            <ul class="uk-nav uk-nav-default uk-dropdown-nav">
						<li class="uk-nav-header">TKDD</li>
						@foreach($tkddPostures as $tkddPosture)
		                    <li id="tkdd{!! $tkddPosture->idPostur !!}"><a href="{!! url('level-2/tkdd/' . $tkddPosture->idPostur . '/' . $year . '/' . $provinceId) !!}">{!! $tkddPosture->uraianPosturSingkat !!}</a></li>
		                @endforeach
						<li class="uk-nav-divider"></li>
						<li class="uk-nav-header">APBD</li>
						@foreach($apbdPostures as $apbdPosture)
		                    <li><a href="{!! url('level-2/apbd/' . $apbdPosture->id . '/' . $year . '/' . $provinceId) !!}">{!! $apbdPosture->name !!}</a></li>
		                @endforeach
						<li><a href="{!! url('level-2/apbd/lra/' . $year . '/' . $provinceId . '/' . $monthParam) !!}">Penyampaian Data LRA</a></li>
					</ul>
				</div>

				<button class="uk-button uk-button-small uk-button-default " type="button"><span class="uk-visible@m">PILIH </span>PROVINSI <span uk-icon="icon: chevron-down"></span></button>
				<div uk-dropdown class="uk-height-large uk-max-height-large uk-overflow-auto">
					<ul class="uk-nav uk-nav-default uk-dropdown-nav">
						@foreach($gProvinces as $province)
		                    <li><a href="{!! url('level-2/' . $type . '/' . $postureId . '/' . $year .  '/' . $province['id']) !!}">{!! $province['name'] !!}</a></li>
		                @endforeach
					</ul>
				</div>

				<button class="uk-button uk-button-small uk-button-default" type="button" onclick="history.go(-1);" title="Kembali ke halaman sebelumnya" uk-tooltip="pos: left"><span uk-icon="icon: arrow-left"></span> BACK</button>
			</div>
		</div>
		<div class="uk-card-body">
			<div class="uk-overflow-auto">
				<table id="tableProv" class="uk-table-striped uk-margin-remove" cellspacing="0" width="100%"></table>
			</div>
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
        var $provinceId = '{!! $provinceId !!}';
        var $year = "{!! $year !!}";
        var $type = '{!! $type !!}';
        var $postureId = '{!! $postureId !!}';
        var $month = '{!! $monthParam !!}';
        var $chartData = {
            'baseUrl': $baseUrl,
            'provinceId': $provinceId,
            'year': $year,
            'type': $type,
            'postureId': $postureId,
            'month': $month
        };
    </script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	{{--<script src="{!! asset('assets/js/datatables/dataTables.sikd.js') !!}"></script>--}}
	<script src="{!! asset('assets/js/pages/level-2.js') !!}"></script>
@endsection

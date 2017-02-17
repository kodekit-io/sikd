@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/datatables/dataTables.materialize.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
	<div class="card z-depth-3 soft hoverable sikd-map">
		<div class="card-toolbar">
			<h2 class="card-title">
				{!! $reportName !!} Se-Provinsi {!! $provinceName !!}
			</h2>
			<a href="#" data-activates="switchdata" class="dropdown-button orange white-text z-depth-0 uk-button right" data-beloworigin="true" data-alignment="right">PILIH PROVINSI <i class="material-icons right">arrow_drop_down</i></a>
			<ul id="switchdata" class="dropdown-content slim-drop">
				@foreach($gProvinces as $province)
                    <li><a href="{!! url('level-2/' . $type . '/' . $postureId . '/' . $year .  '/' . $province['id']) !!}">{!! $province['name'] !!}</a></li>
                @endforeach
			</ul>

			<a href="#" data-activates="reportType" class="dropdown-button orange white-text z-depth-0 uk-button right uk-margin-right" data-beloworigin="true" data-alignment="right">PILIH INFORMASI APBD<i class="material-icons right">arrow_drop_down</i></a>
			<ul id="reportType" class="dropdown-content slim-drop">
                @foreach($apbdPostures as $apbdPosture)
                    <li><a href="{!! url('level-2/apbd/' . $apbdPosture->id . '/' . $year . '/' . $provinceId) !!}">{!! $apbdPosture->name !!}</a></li>
                @endforeach
			</ul>

            <a href="#" data-activates="posture" class="dropdown-button orange white-text z-depth-0 uk-button right uk-margin-right" data-beloworigin="true" data-alignment="right">PILIH INFORMASI TKDD <i class="material-icons right">arrow_drop_down</i></a>
            <ul id="posture" class="dropdown-content slim-drop">
                @foreach($tkddPostures as $tkddPosture)
                    <li><a href="{!! url('level-2/tkdd/' . $tkddPosture->idPostur . '/' . $year . '/' . $provinceId) !!}">{!! $tkddPosture->uraianPosturSingkat !!}</a></li>
                @endforeach
            </ul>

			<a href="#" data-activates="year" class="dropdown-button orange white-text z-depth-0 uk-button right uk-margin-right" data-beloworigin="true" data-alignment="right">PILIH TAHUN <i class="material-icons right">arrow_drop_down</i></a>
			<ul id="year" class="dropdown-content slim-drop">
				@foreach($years as $theYear)
					<li><a href="{!! url('level-2/' . $type . '/' . $postureId . '/' . $theYear . '/' . $provinceId) !!}">{!! $theYear !!}</a></li>
				@endforeach
			</ul>

		</div>
		<div class="card-content">
			<table id="tableProv" class="display uk-table-condensed uk-margin-remove" cellspacing="0" width="100%"></table>
		</div>

	</div>
</main>
@endsection

@section('page-level-scripts')
    <script type="text/javascript">
        var $provinceId = '{!! $provinceId !!}';
        var $year = '{!! $year !!}';
        var $type = '{!! $type !!}';
        var $postureId = '{!! $postureId !!}';
    </script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/dataTables.materialize.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-2.js') !!}"></script>
@endsection

@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/datatables/dataTables.materialize.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
	<div class="card z-depth-3 soft hoverable sikd-map">
		<div class="card-toolbar">
			<h2 class="card-title">
				{!! $reportTypes[$reportType] !!} Se-Provinsi {!! $provinceName !!}
			</h2>
			<a href="#" data-activates="switchdata" class="dropdown-button orange white-text z-depth-0 uk-button right" data-beloworigin="true" data-alignment="right">PILIH PROVINSI <i class="material-icons right">arrow_drop_down</i></a>
			<ul id="switchdata" class="dropdown-content slim-drop">
				@foreach($provinces as $province)
                    <li><a href="{!! url('level-2/' . $province['id'] . '/' . $reportType) !!}">{!! $province['name'] !!}</a></li>
                @endforeach
			</ul>

			<a href="#" data-activates="reportType" class="dropdown-button orange white-text z-depth-0 uk-button right uk-margin-right" data-beloworigin="true" data-alignment="right">PILIH JENIS INFORMASI <i class="material-icons right">arrow_drop_down</i></a>
			<ul id="reportType" class="dropdown-content slim-drop">
                @foreach($reportTypes as $id => $name)
                    <li><a href="{!! url('level-2/' . $provinceId . '/' . $id) !!}">{!! $name !!}</a></li>
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
        var $reportType = '{!! $reportType !!}';
    </script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/dataTables.materialize.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-2.js') !!}"></script>
@endsection

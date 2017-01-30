@extends('layouts.default')

@section('content')
<main class="uk-container uk-container-center uk-margin-top">
	<div class="card z-depth-3 soft hoverable sikd-map uk-animation-fade">
		<div class="card-toolbar">
			<h2 class="card-title" id="titleMap"></h2>
			<a href="#" data-activates="switchdata" class="dropdown-button orange white-text z-depth-0 uk-button right" data-beloworigin="true" data-alignment="right">PILIH JENIS INFORMASI <i class="material-icons right">arrow_drop_down</i></a>
			<ul id="switchdata" class="dropdown-content slim-drop">
				@foreach($reportTypes as $id => $name)
					<li><a href="{!! url('level-1/' . $id) !!}">{!! $name !!}</a></li>
				@endforeach
			</ul>

            <a href="#" data-activates="postures" class="dropdown-button orange white-text z-depth-0 uk-button right uk-margin-right" data-beloworigin="true" data-alignment="right">PILIH POSTUR <i class="material-icons right">arrow_drop_down</i></a>
            <ul id="postures" class="dropdown-content slim-drop">
                @foreach($postures as $posture)
                    <li><a href="{!! url('level-1/' . $posture->idPostur) !!}">{!! $posture->uraianPosturSingkat !!}</a></li>
                @endforeach
            </ul>
		</div>
		<div class="card-content">
			<div id="map" class=""></div>
		</div>
	</div>
</main>
@endsection

@section('page-level-scripts')
    <script type="text/javascript">
        var $baseUrl = "{!! url('/') !!}";
        var $reportType = "{!! $reportType !!}";
        var $reportName = "{!! $reportName !!}";
    </script>
	<script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/sikd.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-1.js') !!}"></script>
@endsection

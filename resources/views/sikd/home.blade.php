@extends('layouts.home')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/lib/jquery.bxslider.min.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-expand">
	{{--@if ($role == 'admin,home')--}}

	<div class="uk-grid-small uk-child-width-1-1@m" uk-grid uk-sortable="handle: .sikd-card-wrap">
		{{--ROW 1 A--}}
		<div id="l0r1a" class="sikd-home-row1 uk-width-1-2@m sikd-card-wrap">
		</div>
		{{--ROW 1 B--}}
		<div id="l0r1b" class="sikd-home-row1 uk-width-1-2@m sikd-card-wrap">
		</div>
		{{--ROW 2--}}
	    <div id="l0r2" class="sikd-home-row2 sikd-card-wrap">
	    </div>
		{{--ROW 3--}}
	    <div id="l0r3" class="sikd-home-row3 sikd-card-wrap">
	    </div>
	</div>
	{{--@endif--}}
</main>

@endsection

@section('page-level-scripts')
	<script type="text/javascript">
		var $baseUrl = "{!! url('/') !!}";
		var $tkddData = '{!! $tkddData !!}';
        var $apbdData = '{!! $apbdData !!}';
        var $reportTypes = '{!! $reportTypes !!}';
        var $year = '{!! $year !!}';
	</script>
    <script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/echarts.theme.js') !!}"></script>
	<script src="{!! asset('assets/js/lib/jquery.bxslider.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/home.js') !!}"></script>
@endsection

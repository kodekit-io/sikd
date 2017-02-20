@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/lib/jquery.bxslider.min.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-expand">
	<div class="uk-grid-small uk-child-width-1-1@m" uk-grid>
		{{--ROW 1 A--}}
		<div id="l0r1a" class="sikd-home-row1 uk-width-1-2@m">
		</div>
		{{--ROW 1 B--}}
		<div id="l0r1b" class="sikd-home-row1 uk-width-1-2@m">
		</div>
		{{--ROW 2--}}
	    <div id="l0r2" class="sikd-home-row2">
	    </div>
		{{--ROW 3--}}
	    <div id="l0r3" class="sikd-home-row3">
	    </div>
	</div>
</main>

@endsection

@section('page-level-scripts')
	<script type="text/javascript">
		var baseUrl = "{!! url('/') !!}";
		var tkddData = '{!! $tkddData !!}';
        var apbdData = '{!! $apbdData !!}';
        var reportTypes = '{!! $reportTypes !!}';
        var thisYear = '{!! $thisYear !!}';
	</script>
    <script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/echarts.theme.js') !!}"></script>
	<script src="{!! asset('assets/js/lib/jquery.bxslider.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/home.js') !!}"></script>
@endsection
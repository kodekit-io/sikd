@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/datatables/dataTables.uikit.min.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
	<div class="uk-grid uk-margin-top uk-margin-bottom" data-uk-grid-match data-uk-grid-margin>
		{{--ROW 1 A--}}
		<div class="uk-width-medium-1-2">
			<div class="card z-depth-3 soft hoverable">
				<div class="card-content">
					<ul id="L0A" class="uk-switcher">
						<li><div class="" id="A1"></div></li>
						<li><div class="" id="A2"></div></li>
						<li><div class="" id="A3"></div></li>
						<li><div class="" id="A4"></div></li>
						<li><div class="" id="A5"></div></li>
						<li><div class="" id="A6"></div></li>
						<li><div class="" id="A7"></div></li>
                        <li><div class="" id="A8"></div></li>
					</ul>
				</div>
				<div class="card-action">
					<ul class="tabs" data-uk-switcher="{connect:'#L0A'}">
						<li class="tab" id="A1tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="A2tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="A3tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="A4tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="A5tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="A6tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="A7tab"><a href="#" data-uk-tooltip title="Title"></a></li>
                        <li class="tab" id="A8tab"><a href="#" data-uk-tooltip title="Title"></a></li>
					</ul>
				</div>
			</div>
		</div>
		{{--ROW 1 B--}}
		<div class="uk-width-medium-1-2">
			<div class="card z-depth-3 soft hoverable">
				<div class="card-content">
					<ul id="L0B" class="uk-switcher">
						<li><div class="" id="B1"></div></li>
						<li><div class="" id="B2"></div></li>
						<li><div class="" id="B3"></div></li>
						<li><div class="" id="B4"></div></li>
						<li><div class="" id="B5"></div></li>
						<li><div class="" id="B6"></div></li>
						{{--<li><div class="" id="B7"></div></li>--}}
                        <li><div class="" id="B8"></div></li>
                        {{--<li><div class="" id="B9"></div></li>
                        <li><div class="" id="B10"></div></li>
                        <li><div class="" id="B11"></div></li>--}}
					</ul>
				</div>
				<div class="card-action">
					<ul class="tabs" data-uk-switcher="{connect:'#L0B'}">
						<li class="tab" id="B1tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="B2tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="B3tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="B4tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="B5tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						<li class="tab" id="B6tab"><a href="#" data-uk-tooltip title="Title"></a></li>
						{{--<li class="tab" id="B7tab"><a href="#" data-uk-tooltip title="Title"></a></li>--}}
						<li class="tab" id="B8tab"><a href="#" data-uk-tooltip title="Title"></a></li>
                        {{--<li class="tab" id="B9tab"><a href="#" data-uk-tooltip title="Title"></a></li>
                        <li class="tab" id="B10tab"><a href="#" data-uk-tooltip title="Title"></a></li>
                        <li class="tab" id="B11tab"><a href="#" data-uk-tooltip title="Title"></a></li>--}}
					</ul>
				</div>
			</div>
		</div>

		{{--ROW 2--}}
		<div class="uk-width-medium-1-1">
			<div class="card-panel z-depth-3 soft hoverable uk-margin-top-remove uk-margin-bottom-remove">
				<div class="uk-slideshow sikd-leading uk-switcher" id="L0C">
					<div id="LOC1" class="uk-width-1-1" style="height:400px;width:100%;"></div>
					<div id="LOC2" class="uk-width-1-1" style="height:400px;width:100%;"></div>
				</div>
				<ul class="uk-dotnav uk-flex-center uk-margin-remove" data-uk-switcher="{connect:'#L0C'}">
					<li class="uk-margin-remove"><a></a></li>
					<li class="uk-margin-remove"><a></a></li>
				</ul>
			</div>
		</div>

		{{--ROW 3--}}
		<div class="uk-width-medium-1-1">
			<div class="card z-depth-3 soft hoverable uk-margin-top-remove uk-margin-bottom">
				<div class="card-content">
					<div id="topBottom" class="uk-grid uk-grid-medium uk-grid-width-medium-1-5"></div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection

@section('page-level-scripts')
	<script type="text/javascript">
		$('[data-uk-switcher]').on('show.uk.switcher', function(event){
			$(window).trigger('resize');
		});
		var $baseUrl = "{!! url('/') !!}";
		var tkddData = '{!! $tkddData !!}';
        var apbdData = '{!! $apbdData !!}';
        var reportTypes = '{!! $reportTypes !!}';
        var thisYear = '{!! $thisYear !!}';
	</script>
    <script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/sikd.js') !!}"></script>
	{{--<script src="{!! asset('assets/js/components/slideshow.min.js') !!}"></script>--}}
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/dataTables.uikit.min.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/home.js') !!}"></script>
@endsection

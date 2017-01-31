@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/datatables/dataTables.materialize.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-center uk-margin-top uk-margin-bottom" data-uk-observe>
	<ul class="uk-grid uk-grid-medium uk-margin-top uk-margin-bottom" data-uk-grid-match data-uk-grid-margin>
		<li class="uk-width-1-1">
			<div class="card-panel z-depth-3 soft">
				<h2 class="card-title">Data Umum {!! $pemdaName !!}</h2>
			</div>
		</li>
		<li class="uk-width-1-5"><div id="panel1"></div></li>
		<li class="uk-width-1-5"><div id="panel2"></div></li>
		<li class="uk-width-1-5"><div id="panel3"></div></li>
		<li class="uk-width-1-5"><div id="panel4"></div></li>
		<li class="uk-width-1-5"><div id="panel5"></div></li>
		<li class="uk-width-1-1">
			<div class="card z-depth-3 soft hoverable uk-margin-top-remove">
				<div class="card-action-top">
					<ul class="tabs" data-uk-switcher="{connect:'#tab-level-3'}">
						<li class="tab"><a class="active" href="#tab1">Data Realisasi TKDD</a></li>
						<li class="tab"><a href="#tab2">Data PAD</a></li>
						<li class="tab"><a href="#tab3">Belanja Perjenis</a></li>
						<li class="tab"><a href="#tab4">Opini LKPD</a></li>
					</ul>
				</div>
				<div class="card-content">
					<ul id="tab-level-3" class="uk-switcher">
						<li><table class="uk-table uk-table-striped uk-table-hover" id="A1"></table></li>
						<li><div class="" id="A2">2</div></li>
						<li><div class="" id="A3">3</div></li>
						<li><div class="" id="A4">4</div></li>
					</ul>
				</div>
			</div>
		</li>
	</ul>
</main>
@endsection

@section('page-level-scripts')
	<script type="text/javascript">
		var $baseUrl = '{!! url('/') !!}';
		var $year = '{!! $year !!}';
		var $satkerCode = '{!! $satkerCode !!}';
	</script>
	<script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/sikd.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/dataTables.materialize.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-3.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/level-3-A1.js') !!}"></script>
@endsection

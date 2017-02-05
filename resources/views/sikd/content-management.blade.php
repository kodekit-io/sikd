@extends('layouts.default')
@section('page-level-styles')
	<link rel="stylesheet" href="{!! asset('assets/css/components/sortable.min.css') !!}" />
	<link rel="stylesheet" href="{!! asset('assets/css/datatables/dataTables.uikit.min.css') !!}" />
@endsection
@section('content')
<main class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
	<div class="uk-grid uk-margin-top uk-margin-bottom" data-uk-grid-match data-uk-grid-margin>
		<div class="uk-width-medium-1-1">
			<div class="card z-depth-3 soft hoverable">
				<div class="card-toolbar">
					<h2 class="card-title">
						Manage Contents
					</h2>
				</div>
				<div class="card-content">
					<?php /*
					<h3>Home Slider <span class="uk-text-small">(drag to sort)</span></h3>
					<ul class="uk-grid uk-grid-small uk-grid-width-medium-1-5 uk-sortable uk-margin-bottom" data-uk-sortable="{handleClass:'uk-panel-slider'}" data-uk-grid-margin id="sortslider">
						<li data-id="1">
							<div class="uk-panel uk-panel-box uk-panel-slider">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>Item 1</strong>
							</div>
						</li>
						<li data-id="2">
							<div class="uk-panel uk-panel-box uk-panel-slider">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>Item 2</strong>
							</div>
						</li>
						<li data-id="3">
							<div class="uk-panel uk-panel-box uk-panel-slider">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>Item 3</strong>
							</div>
						</li>
						<li data-id="4">
							<div class="uk-panel uk-panel-box uk-panel-slider">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>Item 4</strong>
							</div>
						</li>
						<li data-id="5">
							<div class="uk-panel uk-panel-box uk-panel-slider">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>Item 5</strong>
							</div>
						</li>
					</ul>
					<button id="saveslide" type="button" class="uk-button uk-button-success">Save</button>
					<hr>
					<h3>Home Indicator <span class="uk-text-small">(drag to sort)</span></h3>
					<ul class="uk-grid uk-grid-small uk-grid-width-medium-1-5 uk-sortable uk-margin-bottom" data-uk-sortable="{handleClass:'uk-panel-ind'}" data-uk-grid-margin id="sortind">
						<li data-id="1">
							<div class="uk-panel uk-panel-box uk-panel-ind">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>DEFISIT APBD</strong>
							</div>
						</li>
						<li data-id="2">
							<div class="uk-panel uk-panel-box uk-panel-ind">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>TAX RATIO</strong>
							</div>
						</li>
						<li data-id="3">
							<div class="uk-panel uk-panel-box uk-panel-ind">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>TOP 5 TKDD</strong>
							</div>
						</li>
						<li data-id="4">
							<div class="uk-panel uk-panel-box uk-panel-ind">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>TOP 5 APBD</strong>
							</div>
						</li>
						<li data-id="5">
							<div class="uk-panel uk-panel-box uk-panel-ind">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>TOP 5 TERPATUH</strong>
							</div>
						</li>
						<li data-id="6">
							<div class="uk-panel uk-panel-box uk-panel-ind">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>TOP 5 DANA DESA</strong>
							</div>
						</li>
						<li data-id="7">
							<div class="uk-panel uk-panel-box uk-panel-ind">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>TOP 5 KAS</strong>
							</div>
						</li>
						<li data-id="8">
							<div class="uk-panel uk-panel-box uk-panel-ind">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>TOP 5 HIBAH</strong>
							</div>
						</li>
						<li data-id="9">
							<div class="uk-panel uk-panel-box uk-panel-ind">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>TOP 5 SANKSI</strong>
							</div>
						</li>
						<li data-id="10">
							<div class="uk-panel uk-panel-box uk-panel-ind">
							    <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
							    <strong>TOP 5 DID</strong>
							</div>
						</li>
					</ul>
					<button id="saveind" type="button" class="uk-button uk-button-success">Save</button>
					<hr>
					*/?>
					<h3>Static Page</h3>
					<table id="konten_manage" class="uk-table uk-table-hover uk-table-striped uk-width-1-1"></table>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection

@section('page-level-scripts')
	<script src="{!! asset('assets/js/components/sortable.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! asset('assets/js/datatables/dataTables.uikit.min.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/content-manage.js') !!}"></script>
@endsection

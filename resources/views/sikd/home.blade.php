@extends('layouts.default')

@section('content')
<main class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
	<div class="uk-grid uk-margin-top uk-margin-bottom" data-uk-grid-match data-uk-grid-margin>
		<?php //ROW 1 A ?>
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
					</ul>
				</div>
			</div>
		</div>
		<?php //ROW 1 B ?>
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
						<li><div class="" id="B7"></div></li>
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
						<li class="tab" id="B7tab"><a href="#" data-uk-tooltip title="Title"></a></li>
					</ul>
				</div>
			</div>
		</div>

		<?php //ROW 2 ?>
		<div class="uk-width-medium-1-1">
			<div class="card-panel z-depth-3 soft hoverable uk-margin-top-remove uk-margin-bottom-remove">
				<div class="uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
					<ul class="uk-slideshow sikd-leading">
						<li><div id="LOC1"></div></li>
						<li><div id="LOC2"></div></li>
						<li><div id="LOC3"></div></li>
						<li><div id="LOC4"></div></li>
						<li><div id="LOC5"></div></li>
					</ul>
					<a class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
					<a class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next"></a>
					<ul class="uk-dotnav uk-position-bottom uk-flex-center uk-margin-bottom-remove">
						<li data-uk-slideshow-item="0"><a></a></li>
						<li data-uk-slideshow-item="1"><a></a></li>
						<li data-uk-slideshow-item="2"><a></a></li>
						<li data-uk-slideshow-item="3"><a></a></li>
						<li data-uk-slideshow-item="4"><a></a></li>
					</ul>
				</div>
			</div>
		</div>

		<?php //ROW 3 ?>
		<div class="uk-width-medium-1-1">
			<div class="card z-depth-3 soft hoverable uk-margin-top-remove uk-margin-bottom">
				<div class="card-content">
					<ul id="sikd-thematics" class="uk-switcher">
						<li class="uk-width-1-1">
							<ul class="uk-grid uk-grid-medium uk-grid-width-1-5">
								<li>
									<div class="card-panel blue lighten-5 z-depth-0 skid-thematic">
										<i class="uk-icon-button uk-icon-medium indigo white-text uk-icon-line-chart"></i>
										<div class="skid-thematic__text">
											<h5>Defisit APBD</h5>
											<p>Nilai Indikator</p>
										</div>
									</div>
								</li>
								<li>
									<div class="card-panel blue lighten-5 z-depth-0 skid-thematic">
										<i class="uk-icon-button uk-icon-medium cyan white-text uk-icon-pie-chart"></i>
										<div class="skid-thematic__text">
											<h5>Tax Ratio</h5>
											<p>Nilai Indikator</p>
										</div>
									</div>
								</li>
								<li>
									<div class="card-panel blue lighten-5 z-depth-0 skid-thematic">
										<i class="uk-icon-button uk-icon-medium amber white-text uk-icon-trophy"></i>
										<div class="skid-thematic__text">
											<h5>Top 5 TKDD</h5>
											<p>Nilai Indikator</p>
										</div>
									</div>
								</li>
								<li>
									<div class="card-panel blue lighten-5 z-depth-0 skid-thematic">
										<i class="uk-icon-button uk-icon-medium green white-text uk-icon-trophy"></i>
										<div class="skid-thematic__text">
											<h5>Top 5 APBD</h5>
											<p>Nilai Indikator</p>
										</div>
									</div>
								</li>
								<li>
									<div class="card-panel blue lighten-5 z-depth-0 skid-thematic">
										<i class="uk-icon-button uk-icon-medium blue white-text uk-icon-trophy"></i>
										<div class="skid-thematic__text">
											<h5>Top 5 Terpatuh</h5>
											<p>Nilai Indikator</p>
										</div>
									</div>
								</li>
							</ul>
						</li>
						<li class="uk-width-1-1">
							<ul class="uk-grid uk-grid-medium uk-grid-width-1-5">
								<li>
									<div class="card-panel blue lighten-5 z-depth-0 skid-thematic">
										<i class="uk-icon-button uk-icon-medium teal white-text uk-icon-trophy"></i>
										<div class="skid-thematic__text">
											<h5>Top 5 Dana Desa</h5>
											<p>Nilai Indikator</p>
										</div>
									</div>
								</li>
								<li>
									<div class="card-panel blue lighten-5 z-depth-0 skid-thematic">
										<i class="uk-icon-button uk-icon-medium pink darken-4 white-text uk-icon-trophy"></i>
										<div class="skid-thematic__text">
											<h5>Top 5 Kas</h5>
											<p>Nilai Indikator</p>
										</div>
									</div>
								</li>
								<li>
									<div class="card-panel blue lighten-5 z-depth-0 skid-thematic">
										<i class="uk-icon-button uk-icon-medium purple white-text uk-icon-trophy"></i>
										<div class="skid-thematic__text">
											<h5>Top 5 Hibah</h5>
											<p>Nilai Indikator</p>
										</div>
									</div>
								</li>
								<li>
									<div class="card-panel blue lighten-5 z-depth-0 skid-thematic">
										<i class="uk-icon-button uk-icon-medium red white-text uk-icon-trophy"></i>
										<div class="skid-thematic__text">
											<h5>Top 5 Sanksi</h5>
											<p>Nilai Indikator</p>
										</div>
									</div>
								</li>
								<li>
									<div class="card-panel blue lighten-5 z-depth-0 skid-thematic">
										<i class="uk-icon-button uk-icon-medium lime white-text uk-icon-trophy"></i>
										<div class="skid-thematic__text">
											<h5>Top 5 DID</h5>
											<p>Nilai Indikator</p>
										</div>
									</div>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="uk-pagination uk-margin-bottom-remove" data-uk-switcher="{connect:'#sikd-thematics'}">
						<li class="uk-active"><span>1</span></li>
						<li><span>2</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('assets/js/echarts/echarts.js') !!}"></script>
	<script src="{!! asset('assets/js/echarts/sikd.js') !!}"></script>
	<script src="{!! asset('assets/js/pages/home.js') !!}"></script>
@endsection

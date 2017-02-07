<div class="navbar-fixed">
	<nav class="white z-depth-1 soft">
		<div class="nav-wrapper">
			<a href="#" data-activates="sidedrawer" class="left sikd-btn-sidedrawer sikd-blue"><i class="material-icons">menu</i></a>

			<h1 class="sikd-page-title left">
				<a href="{!! url('/') !!}"  title="Monitoring Nasional SIKD" class="sikd-blue">
					<img class="sikd-logo" src="{!! asset('assets/img/icon.png') !!}">
					<span class="uk-hidden-small">Monitoring Nasional SIKD</span>
				</a>
			</h1>


			<ul class="right uk-subnav uk-margin-right">
				<li>
					<a class="btn-floating waves-effect waves-light z-depth-0 grey" title="Screenshot" data-uk-tooltip onclick="capture();"><i class="material-icons">camera_enhance</i></a>
				</li>
				<li>
					<a class="btn-floating waves-effect waves-light z-depth-0 grey" data-uk-tooltip title="Refresh Page" onclick="location.reload();"><i class="material-icons">refresh</i></a>
				</li>
				<li>
					<a class="chip sikd-account" data-activates="sikd-account-dropdown" data-beloworigin="true" data-hover="true" data-alignment="right" data-constrainwidth="false">
						<i class="material-icons sikd-chip-contact">account_circle</i>
						djpk@kemenkeu.go.id
					</a>
					<div id="sikd-account-dropdown" class="dropdown-content transparent z-depth-0">
						<ul>
							<?php /*
							<li><a href="{!! url('/account-profile') !!}"><i class="uk-icon-user uk-margin-small-right"></i> My Account</a></li>
							<?php //if user can ?>
							<li><a href="{!! url('/account-manage') !!}"><i class="uk-icon-users uk-margin-small-right"></i> Manage Account</a></li>
							<li><a href="{!! url('/content-management') !!}"><i class="uk-icon-cog uk-margin-small-right"></i> Content Management</a></li>
							<?php //end if  ?>
							*/ ?>
							<li><a href="{!! url('logout') !!}"><i class="uk-icon-power-off uk-margin-small-right"></i> Logout</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</div>

<ul id="sidedrawer" class="side-nav collapsible collapsible-accordion">
	<li class=" sikd-page-title center">
		<img class="sikd-logo" src="{!! asset('assets/img/logo.png') !!}">
	</li>
	<li><a href="{!! url('/') !!}">BERANDA</a></li>

	<li><a href="{!! url('/level-1') !!}">DATA NASIONAL</a></li>

	<li>
		<a class="collapsible-header">DATA PROVINSI<i class="material-icons right">arrow_drop_down</i></a>

		<div class="collapsible-body">
			<ul>
				@foreach($gProvinces as $province)
                    <li><a href="{!! url('/level-2/' . $province['id']) !!}">{!! $province['name'] !!}</a></li>
                @endforeach
			</ul>
		</div>

	</li>
</ul>

<div class="navbar-fixed">
	<nav class="white z-depth-1 soft">
		<div class="nav-wrapper">
			<a href="#" data-activates="sidedrawer" class="left sikd-btn-sidedrawer sikd-blue"><i class="material-icons">menu</i></a>

			<h1 class="sikd-page-title left">
				<a href="{!! url('/') !!}"  title="Monitoring Nasional SIKD" class="sikd-blue">
					<img class="sikd-logo" src="assets/img/icon.png">
					<span class="uk-hidden-small">Monitoring Nasional SIKD</span>
				</a>
			</h1>


			<ul class="right uk-subnav uk-margin-right">
				<li>
					<a class="btn-floating waves-effect waves-light z-depth-0 grey" data-uk-tooltip title="Search"><i class="material-icons">search</i></a>
				</li>
				<li>
					<a class="btn-floating waves-effect waves-light z-depth-0 grey" data-uk-tooltip title="Refresh Page" onclick="location.reload();"><i class="material-icons">refresh</i></a>
				</li>
				<li>
					<a class="chip sikd-account" data-activates="sikd-account-dropdown" data-beloworigin="true" data-hover="true" data-alignment="right" data-constrainwidth="false">
						<i class="material-icons sikd-chip-contact">account_circle</i>
						MENKEU
					</a>
					<div id="sikd-account-dropdown" class="dropdown-content transparent z-depth-0">
						<ul>
							<li><a href="#!"><i class="uk-icon-cog uk-margin-small-right"></i> User Account</a></li>
							<li><a href="{!! url('logout') !!}"><i class="uk-icon-power-off uk-margin-small-right"></i> Logout</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</div>

<ul id="sidedrawer" class="side-nav">
	<li class=" sikd-page-title center">
		<img class="sikd-logo" src="assets/img/logo.png">
	</li>
	<li><a href="{!! url('/') !!}">BERANDA</a></li>
	<li><a href="{!! url('/level-1') !!}">DATA NASIONAL</a></li>
	<li><a href="#!">MENU 1</a></li>
	<li><a href="#!">MENU 2</a></li>
	<li><a href="#!">MENU 3</a></li>
</ul>

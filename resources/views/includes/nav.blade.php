<div class="navbar-fixed">
	<nav class="indigo lighten-5">
		<div class="nav-wrapper">
			<a href="#" data-activates="sidedrawer" class="left sikd-btn-sidedrawer indigo white-text"><i class="material-icons">menu</i></a>

			<h1 class="sikd-page-title left">
				<a href="{!! url('/') !!}"  title="Monitoring Nasional SIKD" class="indigo-text">
					<img class="sikd-logo" src="assets/img/icon.png">
					Monitoring Nasional SIKD
				</a>
			</h1>

			<ul class="right">
				<li>
					<a class="btn-floating waves-effect waves-light z-depth-0 indigo lighten-2 white-text" data-uk-tooltip title="Refresh Page" onclick="location.reload();">
						<i class="material-icons">refresh</i>
					</a>
				</li>
				<li>
					<a class="chip indigo white-text sikd-account" data-activates="sikd-account-dropdown" data-beloworigin="true" data-hover="true" data-alignment="right">
						<i class="material-icons sikd-chip-contact">account_circle</i>
						MENKEU
					</a>
					<ul id="sikd-account-dropdown" class="dropdown-content transparent z-depth-0">
						<li><a href="#!"><i class="uk-icon-cog uk-margin-small-right"></i> User Setting</a></li>
						<li><a href="{!! url('logout') !!}"><i class="uk-icon-power-off uk-margin-small-right"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</div>

<ul id="sidedrawer" class="side-nav">
	<li class="indigo sikd-page-title center">
		<img class="sikd-logo" src="assets/img/logo-white.png">
	</li>
	<li><a href="{!! url('/') !!}">BERANDA</a></li>
	<li><a href="{!! url('/level-1') !!}">DATA NASIONAL</a></li>
	<li><a href="#!">MENU 1</a></li>
	<li><a href="#!">MENU 2</a></li>
	<li><a href="#!">MENU 3</a></li>
</ul>

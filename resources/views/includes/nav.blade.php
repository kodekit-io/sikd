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
					<a class="btn-floating waves-effect waves-light z-depth-0 grey" data-uk-tooltip title="Refresh Page" onclick="location.reload();"><i class="material-icons">refresh</i></a>
				</li>
				<li>
					<a class="chip sikd-account" data-activates="sikd-account-dropdown" data-beloworigin="true" data-hover="true" data-alignment="right" data-constrainwidth="false">
						<i class="material-icons sikd-chip-contact">account_circle</i>
						ADMIN
					</a>
					<div id="sikd-account-dropdown" class="dropdown-content transparent z-depth-0">
						<ul>
							<li><a href="{!! url('/account-profile') !!}"><i class="uk-icon-user uk-margin-small-right"></i> My Account</a></li>
							<?php //if user can ?>
							<li><a href="{!! url('/account-manage') !!}"><i class="uk-icon-users uk-margin-small-right"></i> Manage Account</a></li>
							<li><a href="{!! url('/content-management') !!}"><i class="uk-icon-cog uk-margin-small-right"></i> Content Management</a></li>
							<?php //end if  ?>
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
		<img class="sikd-logo" src="assets/img/logo.png">
	</li>
	<li><a href="{!! url('/') !!}">BERANDA</a></li>

	<li><a href="{!! url('/level-1') !!}">DATA NASIONAL</a></li>

	<li>
		<a class="collapsible-header">DATA PROVINSI<i class="material-icons right">arrow_drop_down</i></a>
		<div class="collapsible-body">
			<ul>
				{{--@foreach($gProvinces as $province)--}}
                    {{--<li><a href="{!! url('/level-2/' . $province->PemdaKey) !!}">{!! $province->ProvName !!}</a></li>--}}
                {{--@endforeach--}}

				<li><a href="{!! url('/level-2') !!}">Sumatera Utara</a></li>
				<li><a href="{!! url('/level-2') !!}">Sumatera Barat</a></li>
				<li><a href="{!! url('/level-2') !!}">Riau</a></li>
				<li><a href="{!! url('/level-2') !!}">Kepulauan Riau</a></li>
				<li><a href="{!! url('/level-2') !!}">Jambi</a></li>
				<li><a href="{!! url('/level-2') !!}">Sumatera Selatan</a></li>
				<li><a href="{!! url('/level-2') !!}">Bangka Belitung</a></li>
				{{--<li><a href="{!! url('/level-2') !!}">Bengkulu</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Lampung</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">DKI Jakarta</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Jawa Barat</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Banten</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Jawa Tengah</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Daerah Istimewa Yogyakarta</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Jawa Timur</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Bali</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Nusa Tenggara Barat</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Nusa Tenggara Timur</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Kalimantan Barat</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Kalimantan Tengah</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Kalimantan Selatan</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Kalimantan Timur</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Kalimantan Utara</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Sulawesi Utara</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Sulawesi Barat</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Sulawesi Tengah</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Sulawesi Tenggara</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Sulawesi Selatan</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Gorontalo</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Maluku</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Maluku Utara</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Papua Barat</a></li>--}}
				{{--<li><a href="{!! url('/level-2') !!}">Papua</a></li>--}}
			</ul>
		</div>
	</li>
</ul>

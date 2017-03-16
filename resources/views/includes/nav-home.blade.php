<nav class="sikd-nav-side">
    <div class="uk-padding-small">
        <ul class="uk-nav uk-nav-default">
            <li><a href="#offcanvas" title="Open Menu" uk-tooltip="pos: bottom-left" uk-toggle><span uk-icon="icon: menu"></span></a></li>
            <li><a href="{!! url('/') !!}" title="Monitoring Nasional SIKD" uk-tooltip="pos: bottom-left"><span uk-icon="icon: home"></span></a></li>
            <li class="uk-nav-divider"></li>
            <li>
                <a href="{!! url('/') !!}" title="Pilih Tahun" uk-tooltip="pos: bottom-left"><span uk-icon="icon: calendar"></span></a>
				<div uk-dropdown="pos: right-top">
		            <ul class="uk-nav uk-nav-default uk-dropdown-nav">
		                <li><a href="{!! url('home/2015') !!}">Tahun 2015</a></li>
                        <li><a href="{!! url('home/2016') !!}">Tahun 2016</a></li>
                        <li><a href="{!! url('home/2017') !!}">Tahun 2017</a></li>
		            </ul>
				</div>
            </li>
            <li class="uk-nav-divider"></li>
            <li><a title="Refresh Page" uk-tooltip="pos: bottom-left" onclick="location.reload();"><span uk-icon="icon: refresh"></span></a></li>
            <li><a title="Screenshot" uk-tooltip="pos: bottom-left" onclick="capture();"><span uk-icon="icon: camera"></span></a></li>
            @if ($role == 'admin')
            <li><a href="{!! url('user') !!}" title="Setting" uk-tooltip="pos: bottom-left"><span uk-icon="icon: cog"></span></a></li>
            @endif
            <li><a href="{!! url('logout') !!}" title="Logout" uk-tooltip="pos: bottom-left"><span uk-icon="icon: sign-out" style="top:0"></span></a></li>
        </ul>
    </div>
</nav>
<div id="offcanvas" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <div class="uk-cover-container sikd-cover-title">
            <img class="uk-blend-multiply" src="{!! asset('assets/img/img-login.jpg') !!}" alt="SIKD" uk-cover>
            <canvas width="300" height="300"></canvas>
            <h1 class="sikd-login-title">
                <div class="sikd-login-logo"><img class="sikd-logo" src="{!! asset('assets/img/logo-white.png') !!}"></div>
                Dashboard Executive Information System SIKD
            </h1>
        </div>
        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
            <li><a href="{!! url('/') !!}" title="Monitoring Nasional SIKD" uk-tooltip="pos: top-left"><span uk-icon="icon: home" class="uk-margin-small-right"></span> HOME</a></li>
            <li><a href="{!! url('/level-1/tkdd/39/'.$year.'') !!}" title="Data Nasional" uk-tooltip="pos: top-left"><span uk-icon="icon: thumbnails" class="uk-margin-small-right"></span> DATA NASIONAL</a></li>
            <li class="uk-parent">
                <a title="Data Provinsi" uk-tooltip="pos: top-left"><span uk-icon="icon: grid" class="uk-margin-small-right"></span> DATA PROVINSI</a>
                <ul class="uk-nav-sub">
    				@foreach($gProvinces as $province)
                        <li><a href="{!! url('/level-2/tkdd/39/'.$year.'/' . $province['id']) !!}">{!! $province['name'] !!}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="uk-nav-divider"></li>
            <li class="uk-parent">
                <a title="Data Provinsi" uk-tooltip="pos: top-left"><span uk-icon="icon: calendar" class="uk-margin-small-right"></span> PILIH TAHUN</a>
                <ul class="uk-nav-sub">
                    <li><a href="{!! url('home/2015') !!}">Tahun 2015</a></li>
                    <li><a href="{!! url('home/2016') !!}">Tahun 2016</a></li>
                    <li><a href="{!! url('home/2017') !!}">Tahun 2017</a></li>
                </ul>
            </li>
            <li class="uk-nav-divider"></li>
            <li><a title="Refresh Page" uk-tooltip="pos: top-left" onclick="location.reload();"><span class="uk-margin-small-right" uk-icon="icon: refresh"></span> Refresh</a></li>
            <li><a title="Screenshot" uk-tooltip="pos: top-left" onclick="capture();"><span class="uk-margin-small-right" uk-icon="icon: camera"></span> Screenshot</a></li>
            @if ($role == 'admin')
            <li><a href="{!! url('user') !!}" title="Setting" uk-tooltip="pos: bottom-left"><span class="uk-margin-small-right" uk-icon="icon: cog"></span> Setting</a></li>
            @endif
            <li><a href="{!! url('logout') !!}" title="Logout" uk-tooltip="pos: top-left"><span class="uk-margin-small-right" uk-icon="icon: sign-out" style="top:0"></span> Logout</a></li>
        </ul>
    </div>
</div>

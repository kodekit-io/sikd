<nav class="sikd-nav-side">
    <div class="uk-padding-small">
        <ul class="uk-nav uk-nav-default">
            <li><a href="#offcanvas" title="Open Menu" uk-tooltip="pos: bottom-left" uk-toggle><span uk-icon="icon: menu"></span></a></li>
            <li><a href="{!! url('/') !!}" title="Monitoring Nasional SIKD" uk-tooltip="pos: bottom-left"><span uk-icon="icon: home"></span></a></li>
        </ul>
    </div>
    <div class="uk-position-bottom uk-padding-small">
        <ul class="uk-nav uk-nav-default">
            <li class="uk-nav-divider"></li>
            <li><a title="Refresh Page" uk-tooltip="pos: top-left" onclick="location.reload();"><span uk-icon="icon: refresh"></span></a></li>
            <li><a title="Screenshot" uk-tooltip="pos: top-left" onclick="capture();"><span uk-icon="icon: camera"></span></a></li>
        </ul>
    </div>
</nav>
<div id="offcanvas" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">

        <ul class="uk-nav uk-nav-default">
            <li>
                Home
            </li>
            <li>
                Nasional
            </li>
        </ul>
        <div class="uk-position-bottom uk-padding-small">
            <ul class="uk-nav uk-nav-default">
                <li class="uk-nav-divider"></li>
                <li><a title="Refresh Page" uk-tooltip="pos: top-left" onclick="location.reload();"><span class="uk-margin-small-right" uk-icon="icon: refresh"></span> Refresh</a></li>
                <li><a title="Screenshot" uk-tooltip="pos: top-left" onclick="capture();"><span class="uk-margin-small-right" uk-icon="icon: camera"></span> Screenshot</a></li>
            </ul>
        </div>
    </div>
</div>
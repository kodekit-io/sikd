<nav class="uk-navbar-container sikd-topbar" uk-sticky>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li {!! isset($classUser) ? $classUser : '' !!}><a href="{!! url('user') !!}">Pengaturan Pengguna</a></li>
            <li {!! isset($classTkdd) ? $classTkdd : '' !!}><a href="{!! url('tkdd-posture') !!}">Postur TKDD</a></li>
            <li {!! isset($classApbd) ? $classApbd : '' !!}><a href="{!! url('apbd-posture') !!}">Postur APBD</a></li>
            <li {!! isset($classAkun) ? $classAkun : '' !!}><a href="{!! url('account-mapping') !!}">Mapping Akun APBD</a></li>
        </ul>
    </div>
</nav>
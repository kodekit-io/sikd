<footer class="uk-width-1-1 sikd-blue-bg white-text">
    <div class="uk-container uk-container-center">
        <div class="uk-align-left uk-margin-remove">
            Copyright &copy; <?php echo date('Y'); ?> - DJPK Kementerian Keuangan RI
        </div>
        <div class="uk-navbar-flip">
            <ul class="uk-subnav uk-subnav-line uk-margin-bottom-remove">
                <li><a href="{!! url('/tentang') !!}">Tentang</a></li>
                <li><a href="{!! url('/disclaimer') !!}">Disclaimer</a></li>
                <li><a href="{!! url('/panduan') !!}">Panduan</a></li>
            </ul>
        </div>
    </div>
</footer>

@section('page-level-js-variables')
    <script type="text/javascript">
        var baseUrl = '{!! url('/') !!}';
    </script>
@show

<script src="{!! asset('assets/js/jquery.js') !!}"></script>
<script src="{!! asset('assets/js/materialize.min.js') !!}"></script>
<script src="{!! asset('assets/js/uikit.min.js') !!}"></script>
<script src="{!! asset('assets/js/components/tooltip.min.js') !!}"></script>
<script src="{!! asset('assets/js/html2canvas.min.js') !!}"></script>
<script src="{!! asset('assets/js/html2canvas.svg.min.js') !!}"></script>
<script src="{!! asset('assets/js/jquery.plugin.html2canvas.js') !!}"></script>
<script src="{!! asset('assets/js/main.js') !!}"></script>
<script src="{!! asset('assets/js/numeral.js') !!}"></script>
@section('page-level-scripts')
@show
</body>
</html>

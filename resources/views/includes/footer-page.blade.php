<footer class="full-width sikd-footer">
    <div class="uk-grid-collapse" uk-grid>
        <div class="uk-width-expand@m">
            Copyright &copy; <?php echo date('Y'); ?> - DJPK Kementerian Keuangan RI
        </div>
        <div class="uk-width-auto@m">
            <ul class="uk-subnav uk-margin-remove uk-flex uk-flex-center">
                <li><a href="{!! url('/tentang') !!}" title="Tentang" uk-tooltip>Tentang</a></li>
                <li><a href="{!! url('/disclaimer') !!}" title="Disclaimer" uk-tooltip>Disclaimer</a></li>
                <li><a href="{!! url('/panduan') !!}" title="Panduan" uk-tooltip>Panduan</a></li>
            </ul>
        </div>
    </div>
</footer>

@section('page-level-js-variables')
    <script type="text/javascript">
        var baseUrl = '{!! url('/') !!}';
    </script>
@show

@section('page-level-scripts')
@show
</body>
</html>

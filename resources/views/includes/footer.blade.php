<footer class="sikd-footer">
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

<script src="{!! asset('assets/js/lib/html2canvas.min.js') !!}"></script>
<script src="{!! asset('assets/js/lib/jquery.plugin.html2canvas.js') !!}"></script>
<script src="{!! asset('assets/js/lib/numeral.js') !!}"></script>
<script src="{!! asset('assets/js/lib/numeral.locale-id.js') !!}"></script>
@section('page-level-scripts')
@show
<script src="{!! asset('assets/js/main.js') !!}"></script>
</body>
</html>

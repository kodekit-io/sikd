@include('includes.header')
@yield('content')
<footer class="uk-width-1-1">
    <div class="uk-container uk-container-center">
        <div class="center">
            Copyright &copy; <?php echo date('Y'); ?> - DJPK Kementerian Keuangan RI
        </div>
    </div>
</footer>

@section('page-level-scripts')
@show
</body>
</html>

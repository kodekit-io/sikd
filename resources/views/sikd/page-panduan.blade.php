@extends('layouts.page')

@section('content')
	
	<main class="full-width">
		<div class="uk-container uk-container-large">
			<article class="uk-article">

			    <h1 class="uk-article-title" id="title"></h1>
				<div id="content"></div>

			    <div class="uk-grid-small uk-child-width-auto" uk-grid>
			        <div>
			            <a href="{!! url('/') !!}" class="uk-button uk-button-text rem1"><span class="fa fa-arrow-left"></span> BACK</a>
			        </div>
			    </div>

			</article>
		</div>
	</main>

@endsection

@section('page-level-scripts')

	<script type="text/javascript">
		var $baseUrl = "{!! url('/') !!}";
		var $id = 2;
	</script>
	<script src="{!! asset('assets/js/pages/static.js') !!}"></script>

@endsection

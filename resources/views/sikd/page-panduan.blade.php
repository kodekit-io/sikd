@extends('layouts.page')

@section('content')
<header id="header"></header>
<main class="full-width uk-container uk-container-expand">
	<div id="content" class="uk-margin-bottom"></div>
	<a href="{!! url('/') !!}" class="btn amber darken-2 white-text uk-margin-large-bottom">BACK</a>
</main>

@endsection

@section('page-level-scripts')
<script>
$(document).ready(function() {
	$.ajax({
		url : 'data/konten.json',
		beforeSend : function(xhr) {
			$('#content').hide();
		},
		complete : function(xhr, status) {
			$('#content').show();
		},
		success : function(result) {
			$data = result.data;
			//console.log($data);
			$id = [];
			$title = [];
			$mainimg = [];
			$content = [];
			if ($data.length === 0) {
				$('#content').html("<div class='center'>No data chart</div>");
			} else {
				for (i = 0; i < $data.length; i++) {
					$id[i] = $data[i].id;
					$title[i] = $data[i].judul;
					$mainimg[i] = $data[i].mainimg;
					$content[i] = $data[i].konten;
				}
				var post = {
					title: $title,
					img: $mainimg,
					content: $content
				};
				var header = '<header class="header-page uk-vertical-align" style="background-image:url('+post.img[2]+');"> \
					<div class="uk-vertical-align-middle"> \
						<h1 id="title" class="title-page  uk-margin-remove">'+post.title[2]+'</h1> \
					</div> \
				</header>';
				$('#header').html(header);
				$('#content').html(post.content[2]);
				$(window).trigger("resize");
			}
		}
	});
});
</script>
@endsection

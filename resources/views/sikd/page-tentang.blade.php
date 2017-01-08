@extends('layouts.page')

@section('content')
<header class="header-page uk-vertical-align" style="background-image:url();">
	<div class="uk-vertical-align-middle">
		<h1 id="title" class="title-page"></h1>
	</div>
</header>
<main class="uk-container uk-container-center">
	<div id="content"></div>
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
				var mainimg = post.img[0];
				$('#title').html(post.title[0]);
				$('#content').html(post.content[0]);
				$(window).trigger("resize");
			}
		}
	});
});
</script>
@endsection

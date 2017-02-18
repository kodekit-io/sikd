@extends('layouts.login')

@section('content')
	<main class="sikd-login uk-padding-remove uk-margin-remove">
        <div class="uk-animation-fade uk-card uk-card-hover uk-card-default uk-position-center">

			<div class="uk-grid-collapse uk-child-width-1-2@m " uk-grid>

	            <div class="uk-card-media-left uk-cover-container">
	                <img class="uk-blend-multiply" src="{!! asset('assets/img/img-login.jpg') !!}" alt="SIKD" uk-cover>
	                <canvas width="400" height="400"></canvas>
	                <h1 class="sikd-login-title">Dashboard Executive Information System SIKD</h1>
	            </div>

	            <div>
	                <div class="uk-card-body">
						<div class="sikd-login-logo uk-text-center"><img class="sikd-logo" src="{!! asset('assets/img/logo.png') !!}"></div>
	                    <h3 class="uk-card-title uk-text-center uk-margin-small-top sikd-blue-text">LOGIN</h3>
	                    <form id="login" action="{!! url('/login') !!}" method="post">
	                        <div class="uk-margin">
	                            <div class="uk-inline uk-width-1-1">
	                                <span class="uk-form-icon" uk-icon="icon: mail"></span>
	                                <input id="email" name="username" type="email" class="uk-input validate" required>
	                            </div>
	                        </div>
	                        <div class="uk-margin">
	                            <div class="uk-inline uk-width-1-1">
	                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
	                                <input id="password" name="password" type="password" class="uk-input validate" required>
	                            </div>
	                        </div>
							<div class="uk-clearfix uk-text-center">
								<button type="submit" name="login" class="uk-button uk-button-secondary sikd-blue rem1">LOGIN</button>
							</div>
	                    </form>

	                </div>
				</div>
            </div>

        </div>
    </main>

@endsection
@section('page-level-scripts')
	<script src="{!! asset('assets/js/lib/jquery.js') !!}"></script>
	<script src="{!! asset('assets/js/lib/jquery.validate.min.js') !!}"></script>
	<script>
        $(document).ready(function() {
            $('#login').validate({
                rules: {
                    username: {
                        required: true,
                        email: true
                    },
					password: {
                        required: true,
                        minlength: 6
                    }
                },
				errorElement: "em",
				errorPlacement: function(error, element) {
				    if (element.attr("name") == "username" )
				        $(".label-username").html(error);
				    else if  (element.attr("name") == "password" )
				        $(".label-password").html(error);
				    else
				        error.insertAfter(element);
				}
            });
        });
    </script>
@endsection

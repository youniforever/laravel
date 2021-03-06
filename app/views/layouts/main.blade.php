<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel</title>

<!-- Bootstrap -->
<link href="/css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"
	type="text/javascript"></script>

<body>
	@section("navi")
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"
		type="text/javascript"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	<div class="container theme-showcase" role="main">


		<!-- Button trigger modal -->
		<p class="text-right">
			<button type="button" class="btn btn-primary btn-xs"
				data-toggle="modal" data-target="#myModal">Sign in</button>
			<button type="button" class="btn btn-default btn-xs">고객센터</button>
			<span class="glyphicon glyphicon-plus"></span>
		</p>

	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">×</button>
					<h4 class="modal-title">Sign in</h4>
				</div>
				<div class="modal-body">
					<div class="form-group has-error">
						<label class="control-label" for="inputError">Email</label> <input
							type="text" class="form-control" id="inputError">
					</div>
					<div class="form-group has-error">
						<label class="control-label" for="inputError">Password</label> <input
							type="text" class="form-control" id="inputError">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">OK</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->



	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Laravel</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="{{ ( preg_match("/^bbs/", Route::currentRouteName()) ? "active" : "" ) }}"><a href="/bbs">Community</a></li>
					<li class="{{ ( preg_match("/^contact/", Route::currentRouteName()) ? "active" : "" ) }}"><a href="/contact">Contact</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	@show

	@yield("content")
</body>
</html>

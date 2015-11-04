<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>ExploreTasman WebApp</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="css/main.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<nav class="navbar navbar-default">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">ExTasman</a>
						<!-- <a href="index.html"><img src="images/logo.png"></a> -->
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
								<li class="search"><a data-target=".search-wrapper" data-toggle="modal" href="javascript:void(0);"><i class="fa fa-search"></i></a></li>
								
								<li class="dropdown langs nav-border">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-globe"></i> <span>Welcome Nehal</span> <i class="fa fa-caret-down"></i></a>
										<ul class="dropdown-menu">
												<li><a href="/profilePage">My Profile</a></li>
												<li><a href="/auth/logout">Logout</a></li>
										</ul>
								</li>
								<!-- <li class="login nav-border">
										<a data-target="#loginModal" data-toggle="modal" href="javascript:"><i class="fa fa-user"></i> <span>Login/Register</span></a>
								</li> -->
								
						</ul>

						<ul id="nav-pad" class="nav navbar-nav">
								<li><a href="/home">Home</a></li>
								<li><a href="/photoMap">PhotoMap</a></li>
								<li><a href="#">Events</a></li>
								<li><a href="#">Contact Us</a></li>
						</ul>
				</div>
			</div>
		</nav>



    @yield('main_content')
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/map.js"></script>
	</body>
</html>
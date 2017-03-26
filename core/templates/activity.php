<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ru"> <!--<![endif]-->

<head>

	<meta charset="utf-8">

	<title>Заголовок</title>
	<meta name="description" content="">

	<link rel="shortcut icon" href="./assets/img/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="./assets/img/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="./assets/img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="./assets/img/favicon/apple-touch-icon-114x114.png">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="format-detection" content="telephone=no">

	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600"> -->
	<link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="./assets/css/normalize.css">
	<link rel="stylesheet" href="./assets/css/fonts.css">
	<link rel="stylesheet" href="./assets/css/main.css">
	<link rel="stylesheet" href="./assets/css/media.css">

</head>

<body>

	<div id="wrap">

		<header class="header">
			
			<nav class="line-top" role="navigation">
				<div class="container">
					<div class="logo navbar-header col-md-2">
						<a href="#">SingInCloud</a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<img src="./assets/img/icons/nav.svg" alt="">
						</button>
					</div>

					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="top-nav navbar-nav">
							<li><a href="dashboard.html">Summary</a></li>
							<li><a href="#" class="active">Activity</a></li>
							<li><a href="#">Reserved*</a></li>
						</ul>
						<div class="line-top_buttons">
							<a href="#" class="btn btn-clear btn-invert">Log out</a>
						</div>
					</div>
				</div>
			</nav>

			<div class="userbar container-fluid">
				<div class="container">
					<div class="user-image">
						<img src="./assets/img/icons/user.png" class="img-responsive" alt="User image">
					</div>
					<div class="user-info">
						<div class="user-name">
							<h3>
								Hi, Short Name
								<a href="#" class="edit-btn"></a>
							</h3>
						</div>
						<div class="user-email">
							<span>
								LoremIpsum@sample.com
								<a href="#" class="edit-btn"></a>
							</span>
						</div>
					</div>
				</div>
			</div><!-- end userbar -->

		</header>

		<main class="main">

			<ul class="activity-tabs container">
				<li><a href="#signActivityPane" class="active">Signs</a></li>
				<li><a href="#deviceActivityPane">Devices</a></li>
			</ul>

			<div class="activity-contant container">

				<!-- #activity-sign -->
				<div class="activity-pane col-md-9 col-md-offset-1 fade in active" id="signActivityPane">
					<div class="row-titles row hidden-xs">
						<div class="col-md-2 col-sm-2">
							<span>Event</span>
						</div>
						<div class="col-md-6 col-sm-6">
							<span>Device</span>
						</div>
						<div class="col-md-4 col-sm-4">
							<span>Where</span>
						</div>
					</div>
					<ul class="activity-list row">
						<li>
							<button data-target="#sign2" class="collapse-btn visible-xs">2016.11.23 11.35 pm</button>
							<div id="sign2" class="collapse">
								<div class="activity-list_row">
									<div class="event-column col-md-2 col-sm-2 hidden-xs">
										<span>Sign in</span>
									</div>
									<div class="device-column col-md-6 col-sm-6">
										<span>Nexus 4 - ID: 23456789012</span>
									</div>
									<div class="where-column col-md-4 col-sm-4">
										<span>www.amazon.com</span>
									</div>
								</div>
							</div>
						</li>
						<li>
							<button data-target="#sign1" class="collapse-btn visible-xs">2016.11.23 11.35 pm</button>
							<div id="sign1" class="collapse">
								<div class="activity-list_row">
									<div class="event-column col-md-2 col-sm-2 hidden-xs">
										<span>Sign in</span>
									</div>
									<div class="device-column col-md-6 col-sm-6">
										<span>Nexus 4 - ID: 23456789012</span>
									</div>
									<div class="where-column col-md-4 col-sm-4">
										<span>www.amazon.com</span>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div><!-- end #activity-sign -->

				<!-- #activity-device -->
				<div class="activity-pane col-md-9 col-md-offset-1 fade" id="deviceActivityPane">
					<div class="row-titles row hidden-xs">
						<div class="col-md-3 col-sm-3">
							<span>Time</span>
						</div>
						<div class="col-md-4 col-sm-4">
							<span>Event</span>
						</div>
						<div class="col-md-5 col-sm-5">
							<span>Device</span>
						</div>
					</div>
					<ul class="activity-list row">
						<li>
							<button data-target="#device2" class="collapse-btn visible-xs">2016.11.23 11.35 pm</button>
							<div id="device2" class="collapse">
								<div class="activity-list_row">
									<div class="date-column col-md-3 col-sm-3 hidden-xs">
										<span>2016.11.23 11.35 pm</span>
									</div>
									<div class="event-column event-icon connected col-md-4 col-sm-4">
										<span>Connected</span>
									</div>
									<div class="device-column col-md-5 col-sm-5">
										<span>Nexus 4 - ID: 23456789012</span>
									</div>
								</div>
							</div>
						</li>
						<li>
							<button data-target="#device1" class="collapse-btn visible-xs">2016.11.23 11.35 pm</button>
							<div id="device1" class="collapse">
								<div class="activity-list_row">
									<div class="date-column col-md-3 col-sm-3 hidden-xs">
										<span>2016.11.23 11.35 pm</span>
									</div>
									<div class="event-column event-icon mmain col-md-4 col-sm-4">
										<span>Made Main</span>
									</div>
									<div class="device-column col-md-5 col-sm-5">
										<span>iPhone SE - ID: 112345678910111213</span>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div><!-- end #activity-device -->

			</div>

		</main>

	</div>
	
	<div class="hidden"></div>

	<div class="loader">
		<div class="loader_inner"></div>
	</div>

	<!--[if lt IE 9]>
	<script src="bower_components/html5shiv/es5-shim.min.js"></script>
	<script src="bower_components/html5shiv/html5shiv.min.js"></script>
	<script src="bower_components/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="./bower_components/respond/dest/respond.min.js"></script>
	<![endif]-->

	<script src="./bower_components/jquery/dist/jquery.min.js"></script>
	<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		
	<script src="./assets/js/main.js"></script>
	<script src="./js/activity.js"></script>
	
</body>
</html>
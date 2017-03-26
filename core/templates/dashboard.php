<?php
/** @var $this \views\Index */
?><!DOCTYPE html>
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
							<li><a href="#" class="active">Summary</a></li>
							<li><a href="activity.html">Activity</a></li>
							<li><a href="#">Reserved*</a></li>
						</ul>
						<div class="line-top_buttons">
							<a href="logout.html" class="btn btn-clear btn-invert">Log out</a>
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
								Hi, <?php echo $this->getOwner()->getUser('firstName', 'user'); ?>
<!--								<a href="#" class="edit-btn"></a>-->
							</h3>
						</div>
						<div class="user-email">
							<span>
								 <?php echo $this->getOwner()->getUser('email', 'email'); ?>
<!--								<a href="#" class="edit-btn"></a>-->
							</span>
						</div>
					</div>
				</div>
			</div><!-- end userbar -->

		</header>

		<main class="main">
			<div class="device-title text-center container">
				<h2>Devices</h2>
			</div>
			<div class="devices-contant container">
				<ul class="devices-list col-md-8">
                    <?php if (!empty($devices)): ?>
                        <?php foreach ($devices as $device): ?>
                            <li class="device online-device">
                                <div class="device_image hidden-xs text-right col-md-1 col-sm-1">
                                    <img src="assets/img/devices/sumsung.svg" alt="<?php echo $device['name']; ?>">
                                </div>
                                <a data-target="#device2"
                                   class="device_info online-device collapse-btn col-md-4 col-sm-4">
                                    <b><?php echo $device['model']; ?></b>
                                    <span>ID: <?php echo $device['uid']; ?></span>
                                </a>
                                <div class="device_btn-group collapse col-md-7 col-sm-7" id="device2">
                                    <ul>
                                        <li><a href="#" class="btn">Disconect</a></li>
                                        <li><a href="#" class="btn">Make Main</a></li>
                                        <li><a href="#" class="btn btn-clear">Remove</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <i>You have no devices yet!</i>
                    <?php endif; ?>
					<!--<li class="device main-device online-device">-->
						<!--<div class="device_image hidden-xs text-right col-md-1 col-sm-1">-->
							<!--<img src="assets/img/devices/iphone.svg" alt="Device name">-->
						<!--</div>-->
						<!--<a data-target="#device1" class="device_info online-device collapse-btn col-md-4 col-sm-4">-->
							<!--<b>iPhone SE</b>-->
							<!--<span>ID: 12345678910111213</span>-->
						<!--</a>-->
						<!--<div class="device_btn-group collapse col-md-7 col-sm-7" id="device1">-->
							<!--<ul>-->
								<!--<li><a href="#" class="btn">Disconect</a></li>-->
							<!--</ul>-->
						<!--</div>-->
					<!--</li>-->

					<!--<li class="device online-device">-->
						<!--<div class="device_image hidden-xs text-right col-md-1 col-sm-1">-->
							<!--<img src="assets/img/devices/sumsung.svg" alt="Device name">-->
						<!--</div>-->
						<!--<a data-target="#device3" class="device_info online-device collapse-btn col-md-4 col-sm-4">-->
							<!--<b>Samsung Galaxy Note II</b> -->
							<!--<span>ID: 12345678910111213</span>-->
						<!--</a>-->
						<!--<div class="device_btn-group collapse col-md-7 col-sm-7" id="device3">-->
							<!--<ul>-->
								<!--<li><a href="#" class="btn">Disconect</a></li>-->
								<!--<li><a href="#" class="btn">Make Main</a></li>-->
								<!--<li><a href="#" class="btn btn-clear">Remove</a></li>-->
							<!--</ul>-->
						<!--</div>-->
					<!--</li>-->
					<!--<li class="device online-device">-->
						<!--<div class="device_image hidden-xs text-right col-md-1 col-sm-1">-->
							<!--<img src="assets/img/devices/nexus.svg" alt="Device name">-->
						<!--</div>-->
						<!--<a data-target="#device4" class="device_info online-device collapse-btn col-md-4 col-sm-4">-->
							<!--<b>Nexus 4</b>-->
							<!--<span>ID: 12345678910111213</span>-->
						<!--</a>-->
						<!--<div class="device_btn-group collapse col-md-7 col-sm-7" id="device4">-->
							<!--<ul>-->
								<!--<li><a href="#" class="btn">Disconect</a></li>-->
								<!--<li><a href="#" class="btn">Make Main</a></li>-->
								<!--<li><a href="#" class="btn btn-clear">Remove</a></li>-->
							<!--</ul>-->
						<!--</div>-->
					<!--</li>-->
					<!--<li class="device offline-device">-->
						<!--<div class="device_image hidden-xs text-right col-md-1 col-sm-1">-->
							<!--<img src="assets/img/devices/laptop.svg" alt="Device name">-->
						<!--</div>-->
						<!--<a data-target="#device5" class="device_info online-device collapse-btn col-md-4 col-sm-4">-->
							<!--<b>Laptop</b>-->
							<!--<span>ID: 12345678910111213</span>-->
						<!--</a>-->
						<!--<div class="device_btn-group collapse col-md-7 col-sm-7" id="device5">-->
							<!--<ul>-->
								<!--<li><a href="#" class="btn">Disconect</a></li>-->
								<!--<li><a href="#" class="btn">Make Main</a></li>-->
								<!--<li><a href="#" class="btn btn-clear">Remove</a></li>-->
							<!--</ul>-->
						<!--</div>-->
					<!--</li>-->
				</ul><!-- end devices-list -->
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
<!--	<script src="./js/dash.js"></script>-->

</body>
</html>
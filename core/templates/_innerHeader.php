<?php
/** @var $this \views\Index */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ru"> <!--<![endif]-->

<head>

    <meta charset="utf-8">

    <title><?php echo !empty($title) ? $title : $this->getOwner()->getConfig('appName'); ?></title>
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
                    <a href="<?php echo $this->getOwner()->getConfig('baseUri'); ?>">SingInCloud</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <img src="./assets/img/icons/nav.svg" alt="">
                    </button>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="top-nav navbar-nav">
                        <li><a href="dashboard.html" <?php if (isset($active) && ('dashboard' === $active)): ?>class="active"<?php endif;?>>Summary</a></li>
                        <li><a href="activity.html" <?php if (isset($active) && ('activity' === $active)): ?>class="active"<?php endif;?>>Activity</a></li>
                        <li><a href="/demo-shop/?email=<?php echo $this->getOwner()->getUser('email', ''); ?>" target="_blank">Demo - online shopping</a></li>
                        <li><a href="/signature/?uid=<?php echo $this->getOwner()->getUser('uid', ''); ?>" target="_blank">Demo - document sign</a></li>
<!--                        <li><a href="#">Reserved*</a></li>-->
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
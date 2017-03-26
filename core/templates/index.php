<?php
/** @var $this \views\Index */
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $this->getOwner()->getConfig('appName'); ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link href="./css/style.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<div class="supreme-container">
    <!-- navigation bar -->
    <div class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-collapse">
                <a class="logo" href="#">
                    <img class="navbar-brand"
                                 src="./img/logo.png"
                                 alt="logo">
                    <?php echo $this->getOwner()->getConfig('appName'); ?>
                </a>
                <div class="pull-right">
                    <div class="nav navbar-nav navbar-right">
                        <?php //if ($this->getOwner()->) ?>
                        <button type="button" class="btn btn-signin" data-toggle="modal"
                                data-target="#login-email-verification">LOG IN
                        </button>
                        <?php //else: ?>
                        <a href="#" class="btn btn-signin">DASHBOARD
                        </a>
                        <?php //endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--bannner-->
    <div class="banner container-fluid">
        <div class="bg-color">
            <div class="container">
                <div class="row">
                    <div class="banner-text text-center">
                        <h1 class="text-dec">SingInCloud - realtime, cloud-based handwritten signature authentication
                            platform
                        </h1>
                        <p class="small-text">Sign Up With App From</p>

                        <div class="container">
                            <ul class="btn-group list-inline">
                                <li class="btn-appstore"><a href="#"></a></li>
                                <li class="btn-googleplay"><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/banner-->
</div>


<!-- EMAIL ENTER MODAL -->
<div class="modal fade" id="login-email-verification">
    <div class="modal-dialog modal-sm center-block">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <!-- form for entering email -->
            <div class="modal-body">
                <button class="close close-cross" type="button" data-dismiss="modal">&times</button>
                <div class="container-fluid " id="email-input-container">

                    <a class="logo" href="#">
                        <img class="logo-on-modal"
                                     src="./img/logo.png"
                                     alt="logo">
                        SignID
                    </a>
                    <form>
                        <div class="group">
                            <input type="email" id="email" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label for="email">Please enter Email</label>
                        </div>
                        <!--<button class="btn btn-next center-block" type="button" data-toggle="modal" data-dismiss="modal"-->
                                <!--data-target="#sign-verification">-->
                            <!--NEXT-->
                        <!--</button>-->
                        <button class="btn btn-next center-block" type="button" id="sign-in">
                            NEXT
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /EMAIL ENTER MODAL -->

<!-- SIGN MODAL -->
<div class="modal fade" id="sign-verification">
    <div class="modal-dialog modal-sm center-block">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <!-- form for entering email -->
            <div class="modal-body">
                <button class="close close-cross" type="button" data-dismiss="modal">&times</button>
                <div class="container-fluid">

                    <a class="logo" href="#">
                        <img class="logo-on-modal"
                                     src="./img/logo.png"
                                     alt="logo">
                        SignID
                    </a>
                    <form>
                        <div class="text-modal-wait">
                            <p class="center message" align="center">Please Sign on device</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SIGN MODAL -->

<!--[if lt IE 9]>
<!--<script src="bower_components/html5shiv/es5-shim.min.js"></script>-->
<script src="./bower_components/html5shiv/dist/html5shiv.min.js"></script>
<script src="./bower_components/html5shiv/dist/html5shiv-printshiv.min.js"></script>
<script src="./bower_components/respond/dest/respond.min.js"></script>
<!--[endif]-->

<script src="./bower_components/jquery/dist/jquery.min.js"></script>
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="./js/index.js"></script>
</body>
</html>
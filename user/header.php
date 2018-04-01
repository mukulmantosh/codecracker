<?php require 'cloudesession.php';  ?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">       
        <title>CodeCracker - Student Assessment Application</title>
        <link href="assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/autowide.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script  src="assets/js/jquery.min.js"></script>
       
       
</script>


    </head>


    <body class="widescreen fixed-left-void">

        <div class="bg-img-main"></div>

        <!-- Begin page -->
        <div id="wrapper" class="forced enlarged">

            <!-- Top Bar Start -->
            <div class="topbar">

               

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <span class="clearfix"></span>
                            </div>

                          


                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                
                               
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/users/user.svg" width="36" height="36"> </a>
                                    <ul class="dropdown-menu">
                                     
                                     <li><a href="changepassword.php"><i class="glyphicon glyphicon-qrcode"></i> Change Password</a></li>

                                        <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                           <li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="index.php" class="waves-effect waves-light"><i class="ti-home"></i> <span> Dashboard </span> </a>
                               
                            </li>

                                 <li class="has_sub">
                                <a href="arena.php" class="waves-effect waves-light"><i class="ti-gift"></i><span> Arena </span></a>
                                </li> 


                                <li class="has_sub">
                                <a href="scorecard.php" class="waves-effect waves-light"><i class="glyphicon glyphicon-signal"></i><span>Scorecard &amp; Games</span></a>
                                </li>    


                                 <li class="has_sub">
                                <a href="extras.php" class="waves-effect waves-light"><i class="glyphicon glyphicon-th"></i><span> Extras </span></a>
                                </li>                 
                           

                                                              
                            

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            
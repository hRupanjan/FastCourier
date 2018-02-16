<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header('Location: admin.php');
} else {
    $user_check = $_SESSION['login_user'];
    //echo $user_check;
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Fast Courier</title>


            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
            <!--<link rel="stylesheet" href="res/css/bootstrap.css">-->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
            <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
            <!--<link rel="stylesheet" href="res/css/animate.css">-->
            <link rel="shortcut icon" href="res/img/favicon.png" />
            <style>

                .swal2-buttonswrapper .btn{
                    margin-left: 5px;
                    margin-right: 5px;
                }

                input, span:not(.glyphicon), a, p, button, label {
                    font-family: 'Lato', sans-serif !important;
                }

                .input-group,.form-group{
                    margin-bottom: 10px;
                }

                h1{
                    font-family: 'Lato', sans-serif !important;
                    color: white !important;
                }

                h4{
                    font-family: 'Lato', sans-serif !important;
                    color: white;
                }

                section h1{
                    margin-bottom: 30px;
                }

                #footer{
                    background-color: #330066 !important; 
                    border-color: #330066 !important;
                    height: 40px;
                }

                #footer .container{
                    padding-top: 10px;
                }

                #footer p{
                    font-family: 'Lato', sans-serif !important;
                    color: white !important;
                }
                .navbar-default {
                    background-color: #330066 !important;/* #330066 */
                    border-color: #330066 !important;
                }
                .navbar-nav{
                    font-family: 'Lato', sans-serif;
                    margin: 30px 0 5px 0 !important; 
                    /*margin: 30px 100px 0 !important;*/ 
                }

                .navbar-default .navbar-nav>li>a{
                    color: white !important;
                }

                .navbar-default .navbar-nav li a:hover{
                    color: #cc33ff !important;
                }

                .brand-logo img{
                    margin: -15px 0 0 50px !important;
                }



                .btn{
                    font-family: 'Lato', sans-serif;
                }
                .btn-default{
                    background-color: #cc33ff !important;
                    border-color: #cc33ff !important;
                    color: white !important;
                }
                .btn-default:hover{
                    background-color: #9933cc !important;
                    border-color: #9933cc !important;
                }

                .btn-default:active{
                    background-color: #cc66ff !important;
                    border-color: #cc66ff !important;
                }

                /*
                Media Queries
                */

                @media(max-width:768px){
                    .brand-logo img{
                        margin: -10px 0 0 15px !important;
                    }   
                    .navbar-nav{
                        margin: 0!important; 
                    }
                    .navbar-toggle{
                        margin-top: 30px  !important;
                    }
                    .btn-default{
                        margin-top: 10px;
                    }
                }



                @media (max-width: 767px){
                    .navbar-default .navbar-nav .open .dropdown-menu>li>a {
                        color: #ffffff;
                    }
                    .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus,a:hover {
                        color: #cc66ff;
                    }
                }

                @media(max-width:1200px){
                    .brand-logo img{
                        margin: -10px 0 0 15px !important;
                    }   
                    .navbar-nav{
                        margin: 30px 0 5px 0; 
                        /*margin:0 !important;*/
                    }
                    .navbar-toggle{
                        margin-top: 60px  !important;
                    }
                    .btn-default{
                        margin-top: 10px;
                    }
                }
                /*
                Animations
                */
                .delay-1s{
                    animation-delay: 1s !important;
                    -webkit-animation-delay: 1s !important;
                }
                .delay-2s{
                    -webkit-animation-delay: 2s !important;
                    animation-delay: 2s !important;
                }
                .delay-3s{
                    -webkit-animation-delay: 3s !important;
                    animation-delay: 3s !important;
                }
                .delay-4s{
                    -webkit-animation-delay: 4s !important;
                    animation-delay: 4s !important;
                }
                .delay-5s{
                    -webkit-animation-delay: 5s !important;
                    animation-delay: 5s !important;
                }
                .fast{
                    -webkit-animation-duration: 0.5s !important;
                    animation-duration: 0.5s !important;
                }
                .trucks{
                    margin: auto;
                    position: relative;
                    max-width: fit-content;
                    max-width: -moz-fit-content;
                }

                #truck-on-road-anim{
                    /*background: yellow;*/
                    height: fit-content;
                    height: -moz-fit-content;
                    margin: 150px 0 100px 0;
                }

                .trucks .col-md-4{
                    padding-left: 70px; 
                    padding-right: 70px; 
                }

                .function-logo{
                    top: 18px; 
                    left: 37%; 
                    position: absolute
                }

                .date{
                    margin-top: 10px;
                    margin-bottom: 10px;
                }

                .function:not(.function-active){
                    display: none;
                }

                @media (max-width: 992px)
                {
                    .trucks .col-md-4{
                        padding-top: 30px; 
                        padding-bottom: 30px; 
                        padding-left: 0px; 
                        padding-right: 0px; 
                    }
                }

                @keyframes bounceInUp {
                    from, 60%, 75%, 90%, to {
                        animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                    }

                    from {
                        opacity: 0;
                        transform: translate3d(0, 50px, 0);
                    }

                    60% {
                        opacity: 1;
                        transform: translate3d(0, -20px, 0);
                    }

                    75% {
                        transform: translate3d(0, 10px, 0);
                    }

                    90% {
                        transform: translate3d(0, -5px, 0);
                    }

                    to {
                        transform: translate3d(0, 0, 0);
                    }
                }

                .table thead tr th,.table tbody tr td{
                    text-align: center;
                    vertical-align: middle;
                }

                /*            .fa-defer-style{
                                padding: 0px !important;
                                background: transparent !important;
                                height: 20px !important;
                            }*/




                .panel-heading{
                    background-color: #cc33ff !important;
                    color: white !important;
                }
                .panel-title{
                    font-size: 20px !important;
                }

                .panel-heading a:focus {
                    /*outline: 5px auto -webkit-focus-ring-color;*/
                    /*outline-offset: -2px;*/
                    color: #330033;
                    text-decoration: none;
                }

                .panel-heading a:hover {
                    color: #660099;
                    text-decoration: none;
                }

                .panel-heading a:active, a:hover {
                    outline: 0;
                }

                h4.modal-title{
                    color: black !important;
                }

                .quick-nav{
                    position: fixed; 
                    z-index: 999; 
                    top: 50%;
                }

                .quick-nav-container{
                    position: absolute; 
                    left: -60px;
                }

                .q-nav-item{
                    padding-left: 30px; 
                    padding-right: 20px;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    min-width: 50px; 
                    background-color: #cc66ff; 
                    border-radius: 0px 5px 5px 0px; 
                    border:1px #cc66ff solid;
                    margin-top: 5px; 
                    margin-bottom: 5px;
                    margin-left: 0px;
                    margin-right: 0px;
                    position: relative; 
                    display: block;
                    float: left;
                }

                .q-nav-item:hover{
                    animation-name: slideRight;
                    animation-duration: 0.2s;
                    animation-timing-function: linear;
                    animation-fill-mode:forwards;
                    cursor: pointer;
                }

                @keyframes slideRight{
                    from{
                        left: 0px;
                        background-color: #cc66ff; 
                    }
                    to{
                        left: 40px;
                        background-color: #ffffff; 
                    }
                }
            </style>
        </head>
        <body>
            <input name="userid" id="userid" value="<?php echo $user_check; ?>" type="hidden">
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <div class="brand-logo">
                                <img src="res/img/logo.png" alt="Brand Logo" width="90" height="90">
                            </div>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="hidden"><a href="#filter" data-toggle="function" data-target="#filter">Filter</a></li>
                            <li class="hidden"><a href="#search" data-toggle="function" data-target="#search">Search</a></li>
                            <li class="hidden"><a href="#register" data-toggle="function" data-target="#register">Register</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user" style=""></i><?php echo " " . $user_check; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" data-toggle="modal" data-target="#cPass">Change Password</a></li>
                                    <li><a href="res/php/logout.php">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div id="cPass" class="modal fade" role="dialog">

                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Change Password</h4>
                        </div>
                        <div class="modal-body text-center" style="padding: 10px; vertical-align: middle">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa-fw fa-defer-style"></i></span>
                                        <input class="form-control" type="password" name="oldpass" id="oldpass" placeholder="Old Password" onkeyup="valoldpass()"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="input-group" id="passchk">
                                        <span class="input-group-addon"><i class="fa fa-file-text-o fa-fw fa-defer-style"></i></span>
                                        <input class="form-control" type="password" name="newpass" id="newpass" placeholder="New Password" onkeyup="valpass()" title="Lenght must be greater than 6. Password must contain atlease one digit and capital letter." data-toggle="tooltip" data-position="auto" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-file-text-o fa-fw fa-defer-style"></i></span>
                                        <input class="form-control" type="password" name="confpass" id="confpass" placeholder="Confirm Password" onkeyup="valconfpass(1)"/>
                                    </div>
                                </div>
                            </div>
                            <center><p id="stat" style="color:green"></p></center>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <button id="chngpass" class="btn btn-success" style="width: 100%" disabled>OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="">

                    </div>
                </div>

            </div>


            <div class="quick-nav" id="q-nav" style="display: none;">
                <div class="quick-nav-container">
                    <div class="q-nav-item" data-toggle="function" data-target="#filter" title="Filter">
                        <img src="res/img/filter.svg" width="20" height="20" >
                    </div>
                    <div class="q-nav-item" data-toggle="function" data-target="#search" title="Search">
                        <img src="res/img/magnifier.svg" width="20" height="20" >
                    </div>    
                    <div  class="q-nav-item" data-toggle="function" data-target="#register" title="New Registration">
                        <img src="res/img/clipboard-verification-symbol.svg" width="20" height="20" >                        
                    </div>    
                </div>
            </div>


            <section id="truck-on-road-anim">  
                <div class="container-fluid">
                    <div class="row trucks">
                        <div class="col-md-4 animated bounceInLeft">
                            <div class="row animated bounceInUp delay-3s fast">
                                <a href="#filter" data-toggle="function" data-target="#filter" title="Filter">
                                    <img src="res/img/logi-map-marker.svg" width="200" height="100">
                                    <img src="res/img/filter.svg" width="30" height="30" class="function-logo">
                                </a>    
                            </div>
                            <a href="#filter" data-toggle="function" data-target="#filter"><img src="res/img/logi-truck.svg" width="200" height="100"></a>
                        </div>
                        <div class="col-md-4 animated bounceInLeft delay-1s">
                            <div class="row animated bounceInUp delay-3s fast">
                                <a href="#search" data-toggle="function" data-target="#search" title="Search">
                                    <img src="res/img/logi-map-marker.svg" width="200" height="100">
                                    <img src="res/img/magnifier.svg" width="29" height="29" class="function-logo">
                                </a>    
                            </div>
                            <a href="#search" data-toggle="function" data-target="#search"><img src="res/img/logi-truck.svg" width="200" height="100"></a>
                        </div>
                        <div class="col-md-4 animated bounceInLeft delay-2s">
                            <div class="row animated bounceInUp delay-3s fast">
                                <a href="#register" data-toggle="function" data-target="#register" class="text-center" title="New Registration">
                                    <img src="res/img/logi-map-marker.svg" width="200" height="100">
                                    <img src="res/img/clipboard-verification-symbol.svg" width="35" height="35" class="function-logo">
                                </a>    
                            </div>
                            <a href="#register" data-toggle="function" data-target="#register"><img src="res/img/logi-truck.svg" width="200" height="100"></a>
                        </div>
                    </div>
                </div>
            </section>


            <section id="functions" style="padding-left: 10px; padding-right: 10px; margin-bottom: 100px;">
                <div id="filter" class="function">
                    <div class="container">
                        <div class="row" style="background-color: rgba(204,102,255,0.5); height: fit-content; height: -moz-fit-content; border-radius: 5px;">
                            <form name="filter-by-date">
                                <h1 style="margin-left: 20px;">By Date</h1>
                                <div class="col-md-1 text-center" style="padding: 10px;">
                                    <p>From</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group date" data-provide="datepicker" id="filter-from-date">
                                        <input type="text" class="form-control" >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 text-center" style="padding: 10px;">
                                    <p>To</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group date" data-provide="datepicker" id="filter-to-date">
                                        <input type="text" class="form-control" >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center" style="margin-top: 10px; margin-bottom: 10px;">
                                    <label class="radio-inline">
                                        <input type="radio" name="filter-by-radio" checked="" value="0">Book date
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="filter-by-radio" value="1">Pick date
                                    </label>
                                </div> 
                                <div class="col-md-1" style="margin-top: 10px; margin-bottom: 10px;">
                                    <button class="btn btn-default btn-block" type="submit"><span><i class="fa fa-search fa-defer-style fa-fw fa-lg" style=""></i></span></button>
                                </div>    
                            </form>

                        </div>    
                    </div>
                </div>
                <div id="search" class="function function-active">
                    <div class="container">
                        <div class="row" style="background-color: rgba(204,102,255,0.5); height: fit-content; height: -moz-fit-content; border-radius: 5px;">
                            <form name="search">
                                <h1 style="margin-left: 20px;">Search</h1>
                                <div class="col-md-10" style="margin-top: 10px; margin-bottom: 10px;">
                                    <div class="form-group">
                                        <input id='search-index' type="text" class="form-control" placeholder="Search by Id , Date (Eg.:- YYYY-MM-DD) , Status , Name , Transport Mode , Shipment Type">
    <!--                                        <span class="input-group-addon"><i class="fa fa-search fa-defer-style" style=""></i></span>-->
                                    </div>

                                </div>
                                <div class="col-md-2" style="margin-top: 10px; margin-bottom: 10px;">
                                    <button class="btn btn-default btn-block" type="submit"><span><i class="fa fa-search fa-defer-style fa-fw fa-lg" style=""></i></span></button>
                                </div>    
                            </form>
                        </div>    
                    </div>

                </div>
                <div id="register" class="function">
                    <div class="container">
                        <div class="row" style="background-color: rgba(204,102,255,0.2); height: fit-content; height: -moz-fit-content; border-radius: 5px; padding: 10px;">
                            <h1 style="margin-left: 20px;">Register</h1>
                            <form name="reg"  enctype="multipart/form-data" id="new_reg">



                                <!--<div class="container" style="margin-top: 20px">-->
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion">
                                            <h4 class="panel-title text-center">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="fa fa-share fa-1x fa-defer-style"></i> Shipper Details</a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-user fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="sfname" id="sfname" placeholder="First Name" onkeyup="valName('sfname', 1)" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" name="smname" id="smname" placeholder="Middle Name" onkeyup="valName('smname', 2)" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" name="slname" id="slname" placeholder="Last Name" onkeyup="valName('slname', 1)" />
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-building fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="sbuilding" id="sbuilding" placeholder="Building" onkeyup="valAddr('sbuilding', 'building')" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-street-view fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="sstreet" id="sstreet" placeholder="Street" onkeyup="valAddr('sstreet', 'street')" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-institution fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="spo" id="spo" placeholder="Post Office" onkeyup="valAddr('spo', 'post')" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="scity" id="scity" placeholder="City" onkeyup="valAddr('scity', 'city')" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-map fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="sstate" id="sstate" placeholder="State" onkeyup="valAddr('sstate', 'state')" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-globe fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="spin" id="spin" placeholder="Pin Code" onkeyup="valAddr('spin', 'pin')" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-envelope fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="semail" id="semail" placeholder="Email ID" onkeyup="valEmail('semail', 1)"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-phone fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="sphone" id="sphone" placeholder="Phone" onkeyup="valPhone('sphone')"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title text-center">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="fa fa-reply fa-1x fa-defer-style"></i> Receiver Details</a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-user fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="rfname" id="rfname" placeholder="First Name" onkeyup="valName('rfname', 1)" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" name="rmname" id="rmname" placeholder="Middle Name" onkeyup="valName('rmname', 2)" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" name="rlname" id="rlname" placeholder="Last Name" onkeyup="valName('rlname', 1)" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-building fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="rbuilding" id="rbuilding" placeholder="Building" onkeyup="valAddr('rbuilding', 'building')" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-street-view fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="rstreet" id="rstreet" placeholder="Street" onkeyup="valAddr('rstreet', 'street')" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-institution fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="rpo" id="rpo" placeholder="Post Office" onkeyup="valAddr('rpo', 'post')" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="rcity" id="rcity" placeholder="City" onkeyup="valAddr('rcity', 'city')" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-map fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="rstate" id="rstate" placeholder="State" onkeyup="valAddr('rstate', 'state')" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-globe fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="rpin" id="rpin" placeholder="Pin Code" onkeyup="valAddr('rpin', 'pin')" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-envelope fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="remail" id="remail" placeholder="Email ID" onkeyup="valEmail('remail', 2)" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-phone fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="rphone" id="rphone" placeholder="Phone" onkeyup="valPhone('rphone')" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title text-center">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class="fa fa-clone fa-1x fa-defer-style"></i> Shipment Details</a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-6">
                                                            <div class="input-group">
                                                                <select name="ship_type" class="selectpicker show-tick" id="ship_type" title="---Select type of ship---">
                                                                    <option value="document">Document</option>
                                                                    <option value="parcel">Parcel</option>
                                                                </select>
                                                            </div>    
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="input-group">
                                                                <select name="bmode" class="selectpicker show-tick" id="bmode" title="---Select Booking mode---" >
                                                                    <option value="paid">Paid</option>
                                                                    <option value="topay">ToPay</option>
                                                                </select>
                                                            </div>    
                                                        </div>
                                                        <!--
                                                                    <div class="col-lg-4">
                                                                                        <div class="input-group">
                                                                                            <select name="smode" class="selectpicker show-tick" id="smode">
                                                                                                <option value="air">Air</option>
                                                                                                <option value="read">Road</option>
                                                                                                <option value="train">Train</option>
                                                                                                <option value="sea">Sea</option>
                                                                                            </select>
                                                                                        </div>    
                                                                                    </div>
                                                        -->
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-gavel fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="weight" id="weight" placeholder="Weight(kg)" onkeyup="valRest('weight')" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-database fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="quantity" id="quantity" placeholder="Quantity" onfocus="inpDate()" onkeyup="valRest('quantity')"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-ship fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="freight" id="freight" placeholder="Freight" onkeyup="valRest('freight')"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw fa-defer-style"></i></span>
                                                                <input class="form-control" type="text" name="bdate" id="bdate" placeholder="Booking Date" disabled />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="tarea" id="tarea" placeholder="Comment" rows="5" onkeyup="valCmnt()"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!--</div>-->





                                <div style="margin: 10vh">
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-5">
                                            <button id="sub_reg" class="btn btn-success" style="width: 100%" data-toggle="modal" data-backdrop="static" data-target="#myModal" >Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </section>


            <section id="show" style="background-color: rgba(204,102,255,0.5); padding-bottom: 20px; padding-top: 20px; display: none; min-height: 500px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive" style="display: none; background-color: white; padding: 10px;" id="shipment-info">          
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Sl. No.</th>
                                            <th colspan="2">Unique Ids</th>
                                            <th colspan="4">Shipper</th>
                                            <th colspan="4">Receiver</th>
                                            <th colspan="14">Shipment</th>
                                            <th colspan="2">Operations</th>
                                        </tr>
                                        <tr>
                                            <th>Consignment No.</th>
                                            <th>Invoice No.</th>

                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Address</th>

                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Address</th>

                                            <th>Status Type</th>
                                            <th>Status Date</th>
                                            <th>Status Time</th>
                                            <th>Current Place</th>
                                            <th>Mode</th>
                                            <th>Freight</th>
                                            <th>Weight</th>
                                            <th>Quantity</th>
                                            <th>Shipment Type</th>
                                            <th>Book Mode</th>
                                            <th>Book Date</th>
                                            <th>Pick Date</th>
                                            <th>Pick Time</th>
                                            <th>Comments</th>
                                            
                                            <th>Update</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>





            <div id="updateModal" class="modal fade" role="dialog">

                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Shipment</h4>
                        </div>
                        <div class="modal-body" style="padding: 10px; vertical-align: middle">
                            <form action="res/php/update_transit.php" method="get">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user fa-fw fa-defer-style"></i></span>
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Shipper Name" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-file-text-o fa-fw fa-defer-style"></i></span>
                                            <input class="form-control" type="text" name="consign" id="consign" placeholder="Consignment No." disabled/>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw fa-defer-style"></i></span>
                                            <input class="form-control" type="text" name="sdate" id="sdate" placeholder="Shipment Date" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-hourglass-2 fa-fw fa-defer-style"></i></span>
                                            <input class="form-control" type="text" name="stime" id="stime" placeholder="Shipment Time" disabled/>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <select name="shipmode" class="selectpicker show-tick" id="shipmode">
                                                <option value="air">Air</option>
                                                <option value="read">Road</option>
                                                <option value="train">Train</option>
                                                <option value="sea">Sea</option>
                                            </select>
                                        </div>    
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <select name="status" class="selectpicker show-tick" id="status" onchange="inpDateTime()">
                                                <option value="hold">Hold</option>
                                                <option value="in transit">In Transit</option>
                                                <option value="landed">Landed</option>
                                                <option value="delivered">Delivered</option>
                                            </select>
                                        </div>    
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <select name="office" class="selectpicker show-tick" id="office">
                                                <option value="siliguri">Siliguri</option>
                                                <option value="bardwan">Bardwan</option>
                                                <option value="kolkata">Kolkata</option>
                                                <option value="hooghly">Hooghly</option>
                                            </select>
                                        </div>    
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw fa-defer-style"></i></span>
                                            <input class="form-control" type="text" name="pdate" id="pdate" data-provide="datepicker" placeholder="Pick Date" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-hourglass-2 fa-fw fa-defer-style"></i></span>
                                            <input class="form-control" type="text" name="ptime" id="ptime" data-provide="datepicker" placeholder="Pick Time" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="tarea_comment" id="tarea_comment" placeholder="Comment" rows="5"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <center><p id="ack" style="color:green"></p></center>
                                <div style="margin: 3vh">
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-4">
                                            <button id="cupdate" class="btn btn-success" style="width: 100%">Confirm Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer" style="">

                            </div>
                        </div>

                    </div>
                </div>

            </div>



            <div id="myModal" class="modal fade" role="dialog">

                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" onclick="valAll()">&times;</button>
                            <h4 class="modal-title">Registration Status</h4>
                        </div>
                        <div class="modal-body text-center" style="padding: 10px; vertical-align: middle">
                            <i id="wait" class="fa fa-spinner fa-pulse fa-5x fa-defer-style" style="color:#cc66ff;display: none; font-size: 5em !important;"></i>
                            <i id="chk" class="fa fa-check-square-o fa-5x fa-defer-style" style="color:#cc66ff; display: none; font-size: 5em !important;"></i>
                            <p id="msg" style="padding: 1vw; display: inline; word-wrap: break-word;" ></p>
                        </div>
                        <div class="modal-footer" style="">

                        </div>
                    </div>

                </div>
            </div>


            <!-- Overlay Loader-->
            <div id="overlay-loader" style="top:0px; position: fixed; min-height: 100%; min-width: 100%; z-index: 999999999; background: rgba(0,0,0,0.5); text-align: center; vertical-align: middle; display: none">
                <i class="fa fa-spinner fa-pulse fa-5x" style="color:#cc99ff; position: absolute; top: 50%; font-size: 5em !important; margin-left: auto; margin-right: auto;"></i>
            </div>



            <!-- Footer -->
            <section id="footer" class="navbar-default">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <p>Copyright © 2017 <a href="#">FastCourier</a></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- JQuery 3.2.1 -->
            <script type="text/javascript" src="res/js/jquery-3.2.1.js"></script>
            <!-- Bootstrap -->
            <script type="text/javascript" src="res/js/bootstrap.js"></script>
            <!-- Date-Picker -->
            <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
            <script type="text/javascript" src="res/js/bootstrap-datetimepicker.js"></script>        
            <!-- Bootstrap Select -->     
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js"></script>
            <!-- Data Table-->
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>



            <!--registration-->
            <script type="text/javascript" src="res/js/registration.js"></script>
            <!-- validation-->
            <script type="text/javascript" src="res/js/validation.js"></script>
            <!-- Sweet Alert 2-->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
            <script type="text/javascript">
                                var idleTime = 0;
                                $(document).ready(function () {
                                    //Increment the idle time counter every minute.
                                    var idleInterval = setInterval(timerIncrement, 5 * 60000); // 1 minute

                                    //Zero the idle timer on mouse movement.
                                    $(this).mousemove(function (e) {
                                        idleTime = 0;
                                    });
                                    $(this).keypress(function (e) {
                                        idleTime = 0;
                                    });
                                });

                                function timerIncrement() {
                                    idleTime = idleTime + 1;
                                    if (idleTime >= 1) {
                                        alert('You did nothing for a long time. You will be logged out soon!');
                                        window.location.href = "res/php/logout.php";

                                    }
                                }
            </script>  
            <script>
                $.fn.extend({
                    animateCss: function (animationName) {
                        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                        this.addClass('animated ' + animationName).one(animationEnd, function () {
                            $(this).removeClass('animated ' + animationName);
                        });
                        return this;
                    }
                });
                
                
                
                

                var search_db = function (sender) {
                    $('#show').slideUp(100);
//                    $('#overlay-loader').show();


                    $('#footer').addClass('navbar-fixed-bottom');

                    if ( data_table.data().any() ) {
                        data_table.clear().draw(true);
                    }
                    


                    $('#search-index').closest('.input-group,.form-group').removeClass('has-error');
                    $('#filter-from-date').closest('.input-group,.form-group').removeClass('has-error');
                    $('#filter-to-date').closest('.input-group,.form-group').removeClass('has-error');
                    //AJAX
                    
                    
        
    
                    
                    
                    if ($('#search-index').val() !== '' || sender === 'filter')
                    {

                        var rs;
                        
                            
                        $.ajax({
                            url: "res/php/view.php",
                            method: "POST",
                            dataType: "JSON",
//                            async: false,
                            data: {
                                search_key: (sender !== "filter") ? $('#search-index').val() : "",
                                filter_date_to: (sender === "filter") ? $('#filter-to-date input').val() : "",
                                filter_date_from: (sender === "filter") ? $('#filter-from-date input').val() : "",
                                filter_date_by: ($('input[name="filter-by-radio"]:checked').val() === '0') ? 'book_date' : 'pick_date'
                            },
                            beforeSend: function (xhr) {
                            $('#overlay-loader').show();
                            },
                            success: function (data) {
                                
                                try{
//                                    console.log(data);
                                    if (data !== 'error')
                                    {var repo = JSON.parse(JSON.stringify(data));
                                    rs = repo;}
                                    else
                                    {rs = 'error';}
//                                    console.log(rs);
                                    $('#overlay-loader').hide();
                                }
                                catch(exception)
                                {
                                    rs = 'error';
                                    $('#overlay-loader').hide();
                                }
                                
                                
                            },
                            error: function() {
                                   rs = 'error';
                                   $('#overlay-loader').hide();
                             }
                        }).done(function() {
        
                        //done after ajax call
                        
                        if (rs !== 'error')
                        {
                            
                                    for (var i = 0; i < rs.length; i++)
                                    {
                                        var $update_btn = '<button class="btn btn-default" data-target="#updateModal" data-toggle="modal" value="'+rs[i].cons_id+'" name="update" onclick="update(this.value)"><span><i class="fa fa-pencil fa-lg fa-fw"></i></span></button>';
                                        var $delete_btn = '<button class="btn btn-default" value="'+rs[i].cons_id+'" name="delete" onclick="del(this)"><span><i class="fa fa-trash fa-lg fa-fw"></i></span></button>';
                                        var record = [
                                            i + 1,
                                            rs[i].cons_id,
                                            rs[i].invoice_no,
                                            rs[i].ship_name,
                                            rs[i].ship_phone,
                                            rs[i].ship_email,
                                            rs[i].ship_addr,
                                            rs[i].rev_name,
                                            rs[i].rev_phone,
                                            rs[i].rev_email,
                                            rs[i].rev_addr,
                                            rs[i].shipment_status,
                                            rs[i].shipment_date,
                                            rs[i].shipment_time,
                                            rs[i].shipment_office,
                                            rs[i].shipment_mode,
                                            rs[i].shipment_freight,
                                            rs[i].shipment_weight,
                                            rs[i].shipment_qty,
                                            rs[i].shipment_type,
                                            rs[i].shipment_book_mode,
                                            rs[i].shipment_book_date,
                                            rs[i].shipment_pick_date,
                                            rs[i].shipment_pick_time,
                                            rs[i].shipment_comments,
                                            $update_btn,
                                            $delete_btn
                                        ];
                                        
                                        data_table.row.add( record ).draw(true);
                                        
//                                        $( document ).ajaxComplete(function( event, jqxhr, settings ) {
//                                            if ( settings.url === "res/php/view.php" ) {
//                                              $('#overlay-loader').hide();
//                                              console.log('out');
//                                            }
//                                          });
                                        
//                                        $( document ).ajaxStart(function(event, request, settings) {
//                                            $( "#overlay-loader" ).hide();
//                                          });
                                        
                                        
//                                    $('#overlay-loader').hide();
                                    $('#show').slideDown();
                                    $('#shipment-info').slideDown();
                                    $('#footer').removeClass('navbar-fixed-bottom');

                                    var $hidden = $('.hidden');
                                    if ($hidden.length > 0)
                                    {
                                        $hidden.removeClass('hidden');
                                        $('#q-nav').show(400);
                                        $('#truck-on-road-anim').slideUp();
                                        $('#functions').css({
                                            'margin-top': '18px',
                                            'margin-bottom': '20px'
                                        });
                                    }
                        }
                        }
                        else{
//                            $('#overlay-loader').hide();
                                    $('#show').slideUp();
                                    
                                    if ( data_table.data().any() ) {
                                        data_table.clear().draw(true);
                                    }
                                    
    //                                $('#footer').addClass('navbar-fixed-bottom');
                                    if (sender !== "filter")
                                        $('#search-index').closest('.input-group,.form-group').addClass('has-error');
                                    else
                                    {
                                        $('#filter-from-date').closest('.input-group,.form-group').addClass('has-error');
                                        $('#filter-to-date').closest('.input-group,.form-group').addClass('has-error');
                                    }
                        }
                        
                        
                        //end of else
                      
                    });

                    } else
                    {
                        $('#footer').addClass('navbar-fixed-bottom');
                        $('#overlay-loader').hide();
                        if (sender !== "filter")
                            $('#search-index').closest('.input-group,.form-group').addClass('has-error');
                        else
                        {
                            $('#filter-from-date').closest('.input-group,.form-group').addClass('has-error');
                            $('#filter-to-date').closest('.input-group,.form-group').addClass('has-error');
                        }
                    }

                };







                function del(elem) {
//                    console.log(elem.value);
                    //AJAX

                    swal({
                        title: 'Are you sure?',
                        text: "Do you want to delete Cons. ID "+$(elem).val()+"? You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
    //                        confirmButtonColor: '#3085d6',
    //                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger',
                        buttonsStyling: false
                    }).then(function () {
                        $.post('res/php/delete.php', {id: elem.value}, function (data, status) {
                            if (status === 'success')
                            {
//                                console.log(data);
                                if (data === 'done')
                                {
                                    $(elem).closest('tr').addClass('row-remove');//remove();
                                    data_table.row('.row-remove').remove().draw(true);
                                }
                            }
                        });
                        swal('Deleted!', 'Consignment has been deleted.', 'success');
                    }, function (dismiss) {
                        // dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                        if (dismiss === 'cancel') {
                            swal('Cancelled', 'Consignment is safe.', 'error');
                        }
                    });


                }
                ;








                $('form[name="filter-by-date"]').on('submit', function (event) {
                    event.preventDefault();
                    search_db('filter');
                });

                $('form[name="search"]').on('submit', function (event) {
                    event.preventDefault();
                    search_db('search');
                });


                $('[data-toggle="function"]').each(function () {
                    $(this).on('click', function () {
                        toggle(this);
                    });
                });

                var toggle = function (elem) {
                    var target_id = $(elem).attr('data-target');
                    $('.function').removeClass('function-active').hide();
                    $(target_id).slideToggle();
                    $(target_id).addClass('function-active');
                };



                $(document).ready(function () {
    //                $('.function').not('.function-active').hide();
                    $('[data-toggle="tooltip"]').tooltip();
                    $('#sub_reg').attr('disabled', 'true');


                    data_table = $('#shipment-info table').DataTable();


                    $('a[href^="#"]').not('[data-toggle="collapse"]').on('click', function (event) {
                        event.preventDefault();
                        var s = $(this).attr('href');

                        if (s.length > 1)
                        {
                            $(document.documentElement).animate({
                                scrollTop: $(s).offset().top - 100
                            }, 400);
                        }

                    });


                    $('.q-nav-item').on('click', function () {
                        var s = $(this).attr('data-target');

                        if (s.length > 1)
                        {
                            $(document.documentElement).animate({
                                scrollTop: $(s).offset().top - 100
                            }, 400);
                        }

                    });

                    $(function () {

                        $('#filter-from-date').datetimepicker({
                            format: 'YYYY-MM-DD'
                        });
                        $('#filter-to-date').datetimepicker({
                            useCurrent: false, //Important! See issue #1075
                            format: 'YYYY-MM-DD'
                        });
                        $("#filter-from-date").on("dp.change", function (e) {
                            $('#filter-to-date').data("DateTimePicker").minDate(e.date);
                        });
                        $("#filter-to-date").on("dp.change", function (e) {
                            $('#filter-from-date').data("DateTimePicker").maxDate(e.date);
                        });


                    });
                });
            </script>
            <script type="text/javascript">
                function inpDateTime() {
                    var d = new Date();
                    var m = d.getUTCMonth() + 1;
                    var inpd = d.getFullYear() + '-' + m + '-' + d.getDate();
                    $('#sdate').val(inpd);
    //                                       $('#bdate').closest('.input-group').addClass('has-success');
    //                                       var inpt=d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
                    var hours = d.getHours();
                    var minutes = d.getMinutes();
                    var ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    var inpt = hours + ':' + minutes + ':' + d.getSeconds() + ' ' + ampm;
                    $('#stime').val(inpt);
    //                                       $('#btime').closest('.input-group').addClass('has-success');
                }
                $(document).ready(function () {

                    $('#pdate').datetimepicker({
                        useCurrent: false, //Important! See issue #1075
                        format: 'YYYY-MM-DD'
                    });
                    $('#ptime').datetimepicker({
                        useCurrent: false, //Important! See issue #1075
                        format: 'hh:mm:ss A'
                    });


                });

                function update(id) {
                    // console.log(id);
                    $.ajax({
                        url: "res/php/update.php",
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            update: id
                        },
                        beforeSend: function (xhr) {
                            $('#overlay-loader').show();
                            },
                        success: function (data) {
							$('#pdate').val("");
							$('#ptime').val("");
                            var obj = JSON.parse(JSON.stringify(data));
                            $('#name').val(obj[0].ship_name);
                            $('#consign').val(obj[0].cons_id);
                            $('#sdate').val(obj[0].shipment_date);
                            $('#stime').val(obj[0].shipment_time);
                            $('#tarea_comment').val(obj[0].shipment_comments);
                            $('#shipmode').val(obj[0].shipment_mode).change();
                            $('#status').val(obj[0].shipment_status).change();
                            $('#office').val(obj[0].shipment_office).change();
							$('#pdate').val(obj[0].pick_date);
							$('#ptime').val(obj[0].pick_time);
                            $('#overlay-loader').hide();
                        }
                    });
                }

                $('#cupdate').click(function (e) {
                    e.preventDefault();
                    console.log($('#ptime').val());
                    $.ajax({
                        url: "res/php/update_transit.php",
                        type: "POST",
                        data: {
                            name: $('#name').val(),
                            consign: $('#consign').val(),
                            pdate: $('#pdate').val(),
                            ptime: $('#ptime').val(),
                            sdate: $('#sdate').val(),
                            stime: $('#stime').val(),
                            tarea: $('#tarea_comment').val(),
                            office: $('#office').val(),
                            shipmode: $('#shipmode').val(),
                            status: $('#status').val()
                        },
                        beforeSend: function (xhr) {
                            $('#overlay-loader').show();
                            },
                        success: function (data) {
                            $('#overlay-loader').hide();
                            $('#ack').html(data);
                            search_db();

                        }
                    });
                });

                function valAllPass()
                {
                    var m = $('#cPass .has-error');
                    var k = $('#cPass input');
                    var flag = true;
                    for (var i = 0; i < k.length; i++)
                    {
                        if ($(k[i]).val() === '')
                        {
                            flag = false;
                            break;
                        }
                    }

                    if (flag && m.length === 0) {
                        $('#cPass #chngpass').removeAttr('disabled');
                        return true;
                    } else {
                        $('#cPass #chngpass').prop('disabled', 'true');
                        return false;
                    }
                }


                $('#chngpass').click(function (e) {
                    e.preventDefault();
                    if (valAllPass()) {
                        $.ajax({
                            url: "res/php/changePass.php",
                            type: "POST",
                            data: {
                                userid: $('#userid').val(),
                                oldpass: $('#oldpass').val(),
                                confpass: $('#confpass').val()

                            },

                            success: function (data) {
                                $('#stat').html(data);
                                $('#cPass #chngpass').prop('disabled', 'true');
                                clearPass();
                            }
                        });
                    }
                });

                function clearPass() {      /*this jQuery function used to clear all fields after submission*/
                    $('#cPass :input').each(function () {
                        $(this).val('');
                    });
                    $('#cPass .input-group').each(function () {
                        $(this).removeClass('has-error').removeClass('has-success');
                    });
                }
            </script>

        </body>
    </html>
    <?php
}
?>
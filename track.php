<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fast Courier</title>
        <!-- Style -->
        <link rel="stylesheet" type="text/css" href="res/css/style.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="shortcut icon" href="res/img/favicon.png" />
        <style>
            
            input, span, a, p, button, label {
                font-family: 'Lato', sans-serif !important;
            }
            
            #track-package{
                position: relative;
                margin-bottom: 50px;
                top: 100px;
            }
            body{
                position: relative;
            }

            .navbar-default .navbar-nav>li.active>a, .navbar-default .navbar-nav>li.active>a:focus, .navbar-default .navbar-nav>li.active>a:hover{
                color: white !important;
                background-color: #660099;
            }

            .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover{
                color: #cc33ff;
            }




            .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover{
                background-color: #cc33ff;
                color: white !important;
            }

            .dropdown-menu>li>a{
                background-color: white;
                color: #cc33ff !important;
            }


            div.col-lg-12 div {
                margin-bottom: 20px; 
                border-radius: 5px;
            }
            #section1 {
                color: #fff; background-color: rgba(204,102,255,0.5);
                padding: 20px 20px 20px 20px;
            }
            #section2 {
                color: #fff; background-color: #660099;
                padding: 20px 20px 20px 20px;
                word-wrap: break-word;
            }


            @media screen and (max-width: 768px) 
            {
                .navbar-default .navbar-nav .open .dropdown-menu>.active>a, .navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus, .navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover{
                    background-color: #cc33ff;
                    color: white !important;
                }
                #track-package{
                    margin-top: 20px;
                }
            }

            @media screen and (max-width: 1200px) {
                #track-package{
                    margin-bottom: 130px;
                }
                
            }

            .table-striped tbody tr:nth-child(odd)
            {
                color: black;
                background-color: #f1f1f1;
            }
            .table-striped tbody tr:nth-child(even)
            {
                color: black;
                background-color: white;
            }


/*            @media screen and (max-height: 575px){ 
                #rc-imageselect, .g-recaptcha {
                    transform:scale(0.77);
                    -webkit-transform:scale(0.77);
                    transform-origin:0 0;
                    -webkit-transform-origin:0 0;
                }

            }*/



            @media screen and (max-width: 1200px) {
                .g-recaptcha > div{
/*                    margin-left:  auto !important;
                    margin-right: auto !important;*/
                    margin-top: 10px !important;
/*                    text-align: center;
                    width: auto !important;
                    height: auto !important;*/
                }

            }
            .g-recaptcha > div{
                    margin-left:  auto !important;
                    margin-right: auto !important;
                    /*margin-top: 10px !important;*/
                    text-align: center;
                    width: auto !important;
                    height: auto !important;
                }

        </style>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="150">


        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <div class="brand-logo">
                            <img src="res/img/logo.png" alt="Brand Logo" width="85" height="91">
                        </div>
                    </a>
                </div>
                <div class="navbar-collapse collapse navbar-right" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#section1">Track</a></li>
                        <li class="dropdown" id="question-block">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">FAQ<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="question"><a href="#q1">How to register?</a></li>
                                <li class="question"><a href="#q2">Where to register?</a></li>
                                <li class="question"><a href="#q3">Receive a package?</a></li>
                                <li class="question"><a href="#q4">Consignment number?</a></li>
                                <li class="question"><a href="#q5">Payment details?</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>











        <img src="res/img/back.jpg" alt="" style="width:100vw;height:100vh;position:fixed;z-index:-1;opacity:0.3">

        <!-- Track -->
        <section id='track-package'>
            <div class="container">
                <div class="row">

                    <div class="col-lg-12" style="padding-left: 10px; padding-right: 10px ">
                        <div id="section1" class="text-center">    
                            <div>
                                <h1>Track Your Consignment</h1>
                                <form method="post" name="tracker" id="track-cons-form" >
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <input id="ass-id" class="form-control input-lg" type="text" name="ass-id" placeholder="Consignment ID#" value="<?php
                                            if (isset($_REQUEST['cons_id']))
                                                echo $_REQUEST['cons_id'];
                                            else
                                                echo "";
                                            ?>">
                                        </div>
                                        <div class="col-lg-4" style="/*align-items: center; margin: 0 auto;*/">
                                            <div class="g-recaptcha" data-sitekey="6Ldi8CsUAAAAAAu5d9yH7bXLAtqJaqIBbNizbvn7">

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="btn btn-lg btn-default" type="submit" name="submit" value="Track" style="width: 50%">
                                        </div>
                                    </div>
                                </form>
                            </div>



                            <div class="table-responsive" style="display: none;" id="track-info">          
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ship Status</th>
                                            <th>Ship Date</th>
                                            <th>Ship Time</th>
                                            <th>Ship Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>




                        </div>
                        <div id="section2"> 
                            <h1>FAQ</h1>
                            <hr>
                            <ol>
                                <li id="q1">
                                    <h2>How to register your parcel?</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut augue fermentum, volutpat enim nec, dignissim ligula. Mauris viverra nunc porta nunc facilisis, vel volutpat ex pretium. Nunc sodales arcu id odio venenatis pellentesque. Donec a nisi nulla. Maecenas nec massa efficitur, lobortis nisl id, malesuada mauris. Morbi in velit vitae nisl faucibus blandit. Sed sit amet rutrum ante. Nam nunc dolor, tristique facilisis enim a, sodales rhoncus nisi. Suspendisse potenti. Pellentesque congue tortor in eleifend bibendum. Quisque commodo arcu vel sodales tincidunt. Curabitur ultrices dapibus nibh, tempus dapibus metus gravida nec. Suspendisse nisi mauris, vulputate nec vestibulum in, dignissim posuere sapien. Etiam in rhoncus dolor.</p>
                                </li>
                                <li id="q2">
                                    <h2>Where to register your parcel?</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut augue fermentum, volutpat enim nec, dignissim ligula. Mauris viverra nunc porta nunc facilisis, vel volutpat ex pretium. Nunc sodales arcu id odio venenatis pellentesque. Donec a nisi nulla. Maecenas nec massa efficitur, lobortis nisl id, malesuada mauris. Morbi in velit vitae nisl faucibus blandit. Sed sit amet rutrum ante. Nam nunc dolor, tristique facilisis enim a, sodales rhoncus nisi. Suspendisse potenti. Pellentesque congue tortor in eleifend bibendum. Quisque commodo arcu vel sodales tincidunt.</p>
                                </li>
                                <li id="q3">
                                    <h2>How to receive a package?</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut augue fermentum, volutpat enim nec, dignissim ligula. Mauris viverra nunc porta nunc facilisis, vel volutpat ex pretium. Nunc sodales arcu id odio venenatis pellentesque. Donec a nisi nulla. Maecenas nec massa efficitur, lobortis nisl id, malesuada mauris. Morbi in velit vitae nisl faucibus blandit. Sed sit amet rutrum ante. Nam nunc dolor, tristique facilisis enim a, sodales rhoncus nisi. Suspendisse potenti. Pellentesque congue tortor in eleifend bibendum. Quisque commodo arcu vel sodales tincidunt.</p>
                                </li>
                                <li id="q4">
                                    <h2>How do I get the consignment number?</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut augue fermentum, volutpat enim nec, dignissim ligula. Mauris viverra nunc porta nunc facilisis, vel volutpat ex pretium. Nunc sodales arcu id odio venenatis pellentesque. Donec a nisi nulla. Maecenas nec massa efficitur, lobortis nisl id, malesuada mauris. Morbi in velit vitae nisl faucibus blandit. Sed sit amet rutrum ante. Nam nunc dolor, tristique facilisis enim a, sodales rhoncus nisi. Suspendisse potenti. Pellentesque congue tortor in eleifend bibendum. Quisque commodo arcu vel sodales tincidunt.</p>
                                </li>
                                <li id="q5">
                                    <h2>How to get the payment details?</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut augue fermentum, volutpat enim nec, dignissim ligula. Mauris viverra nunc porta nunc facilisis, vel volutpat ex pretium. Nunc sodales arcu id odio venenatis pellentesque. Donec a nisi nulla. Maecenas nec massa efficitur, lobortis nisl id, malesuada mauris. Morbi in velit vitae nisl faucibus blandit. Sed sit amet rutrum ante. Nam nunc dolor, tristique facilisis enim a, sodales rhoncus nisi. Suspendisse potenti. Pellentesque congue tortor in eleifend bibendum. Quisque commodo arcu vel sodales tincidunt.</p>
                                </li>
                            </ol>

                        </div>        
                    </div>
                </div>
            </div>
        </section>




        <!-- Footer -->
        <section id="footer" class="navbar-default navbar-fixed-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 text-center" style="padding-top: 5px;">
                        <p>Copyright © 2017 <a href="#">FastCourier</a></p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <ul class="list-inline social-buttons">
                            <li>
                                <a class="" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 text-center" style="padding-top: 5px;">
                        <a id="admin-red" href="admin.php" style="color: white">Admin LogIn</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- JQuery 3.2.1 -->
        <script type="text/javascript" src="res/js/jquery-3.2.1.js"></script>
        <!-- Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <!-- reCaptcha v2-->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <script>
            $(document).ready(function () {
                $('.question').hide();
                $('#section2').hide();



                $("#track-cons-form").on('submit', function (event) {
                    event.preventDefault();

                    $('#track-info').slideUp();
                    $('#track-info').find('tbody').remove();
                    //AJAX

                    $.post('res/php/g-recaptcha-verify.php', {captcha: grecaptcha.getResponse()}, function (data, status) {
                        if (status === "success")
                        {
                            console.log(data);
                            if (data === 'verified')
                            {





                                //track    





                                $.post('res/php/findAckId.php', {id: $('#ass-id').val(), parent_page: 'track'}, function (data, status) {
                                    if (status === 'success')
                                    {
                                        if (data !== 'none')
                                        {
                                            var rs = JSON.parse(data);
                                            //                                console.log(rs);
                                            var $tbody = $('<tbody>');
                                            for (var i = 0; i < rs.length; i++)
                                            {
                                                var $tr = $('<tr>');
                                                $tr.append($('<td>').html(i + 1));
                                                $tr.append($('<td>').html(rs[i].ship_status));
                                                $tr.append($('<td>').html(rs[i].ship_date));
                                                $tr.append($('<td>').html(rs[i].ship_time));
                                                $tr.append($('<td>').html(rs[i].ship_office));
                                                $tr.appendTo($tbody);
                                            }
                                            $tbody.insertAfter('#track-info thead');

                                            $('#track-info').slideDown();
                                        }
                                    }

                                });




                            } else {
                                grecaptcha.reset();
                            }
                        }
                    });


                });
                $('#question-block').on('click', function () {
                    $('.question').slideDown(400);
                    $('#section2').slideDown(600);
                });
                
                
                
                
                $('a[href^="#"]').on('click', function (event) {
                event.preventDefault();
                var s = $(this).attr('href');

                if (s.length > 1)
                {
                    $(document.documentElement).animate({
                        scrollTop: $(s).position().top - 100
                    }, 400);
                }

            });


                //                if ($('#ass-id').val() !== "")
                //                    $("#track-cons-form").submit();

            });
        </script>
    </body>
</html>
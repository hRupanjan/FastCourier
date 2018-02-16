<?php
session_start();
error_reporting(0);
if(isset($_SESSION['login_user'])){
header("location: panel.php");
}
else{
?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fast Courier</title>
        <!--<link rel="stylesheet" href="res/css/bootstrap.css">--> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="res/css/Gtext.css"/>
        <link type="text/css" rel="stylesheet" href="res/css/progress.css"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        
        <link rel="shortcut icon" href="res/img/favicon.png" />
        <style>
            input{
                border-bottom: 1px solid #000000;
                border-radius: 5px 5px 0px 0px;
            }
            
            input, span, a, p, button, label {
                font-family: 'Lato', sans-serif !important;
            }
        </style>
    </head>
    <body>

        <img src="res/img/back.jpg" alt="" style="width:100vw;height:100vh;position:fixed;z-index:-1;opacity:0.3">

        <div class="container" id="content">
            
                <div class="col-lg-4 col-lg-offset-4" style="background-color: white;box-shadow: 0px 0px 10px;padding-left: 5vh; padding-right:5vh;padding-bottom:5vh; margin-top:8vh; margin-bottom: 2vh; border-radius: 5px;">
                    <div id="loder" style="display:none;margin-bottom:-20px;margin-left:-2vw;margin-right:-2vw">
                    <div class="progress auto-progress" style="height: 5px;">
                        <div class="progress-bar progress-bar-striped active bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height :5px;background-color:#cc33ff">
      
                        </div>
                    </div>  
                    </div>
                    <div style="padding-top:5vh">
                    <div style="background-color: #330066;height: 70px; padding: 1px 2px 1px 10px; border-radius: 5px;">
                        <img src="res/img/logo.png" alt="Brand Logo" width="63" height="68">
                        <p style="float: right; font-size: 20px;padding: 18px;color: white">FastCourier</p>
                    </div>
                    <br><br>
                    <P style="font-size: 30px">Hi Admin,</P>
                    <br>
                    <center><p id="ack" style="color:red"></p></center>
                    <br>
                    <form id="login-form" name="frm_login" action="panel.php" method="post">
                        <div class="group">      
                            <input id="in1" type="text" style="width: 100%" name="userid">
                            <span class="highlight" style="width: 100%"></span>
                            <span class="bar" style="width: 100%"></span>
                            <label id='lbl1' class="">Enter your User ID</label>
                        </div>
                        <div class="group">      
                            <input id="in2" type="password" style="width: 100%" name="pass">
                            <span class="highlight" style="width: 100%"></span>
                            <span class="bar" style="width: 100%"></span>
                            <label id='lbl2' class="">Enter your Password</label>
                        </div>
                        <br>
                        <div class="row" style="margin-top: 2vh;margin-bottom: 20px">
                            <div class="col-md-8" style="padding-top:1vh">
                                <!--<a href="">Forgot Password?</a>-->
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-warning" style="width:100%;background-color:#cc33ff; color:white " id="login">Log In</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
           </div>
    
        <!-- JQuery 3.2.1 -->
        <script type="text/javascript" src="res/js/jquery-3.2.1.js"></script>
        <!-- Bootstrap -->
        <script type="text/javascript" src="res/js/bootstrap.js"></script>
        <!-- Main -->
        <script type="text/javascript" src="res/js/main.js"></script>
        <script>
            $(document).ready(function () {
                
                if ($('#in1').val()!=='')
                    $('#in1').click();
                if ($('#in2').val()!=='')
                    $('#in2').click();
                
                $('#login-form').on('submit',function (e) {
                e.preventDefault();
                $('#ack').html("");
               // console.log($('#ptime').val());
                $.ajax({
                    url: "res/php/login.php",
                    type: "POST",
                    data: {
                        userid: $('#in1').val(),
                        pass: $('#in2').val(),
                    },

                    success: function (data) {
                        if (data.includes('true'))
                            window.location.href = 'panel.php';
//                        $('#login-form').submit();
                    else
                        $('#ack').html(data);

                    }
                });
            });
                
                $(document).ajaxStart(function () {
                $("#loder").css("display", "block");
                    });
                    $(document).ajaxComplete(function () {

                    $("#loder").css("display", "none");
                   clearInput();
                    });
            });
            function clearInput() {      /*this jQuery function used to clear all fields after submission*/
    
        $('#in2').val('');
   
            }
        </script>
    </body>

</html>
<?php
}
?>
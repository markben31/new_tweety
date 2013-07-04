<?php

    session_start();

    if(isset($_SESSION['emailadd']) && isset($_SESSION['password']))
        header('Location: pages/home.php');

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="images/t_logos.jpg"/>
    <link rel="stylesheet" href="css/ui-darkness/jquery-ui.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <!-- <script language="javascript" src="js/clock.js" />-->
    <script type="text/javascript" src="js/user.js"></script>
    <link rel="stylesheet"href="css/footer.css" type="text/css"/>
    <link rel="stylesheet"href="css/style.css" type="text/css"/>
    <link rel="stylesheet"href="css/login.css" type="text/css"/>
    <link href="css/loginBootstrap.css" rel="stylesheet" >
    <title>Tweety | Login or Sign-Up</title>
</head>
<body onloadstart="preloader" >

<div class="preloader" >
    <div id="status"><br/><br/><span class="loader">Loading...</span> </div>
</div>

<?php include 'layout/login_header.php'; ?>

<div class="outer" align="center">
    <div class="body" >
        <div class="error_login">
            <span><?php if (isset($errMsg)) echo $errMsg;?></span>
        </div>
        <div class="inner_body" align="left" >

            <!--Logging in-->
            <form method="post" action="controller/check_user.php" class="login" id="LiveClockIE">
                <p>
                    <label for="emailadd" style="padding-top: 10px;">Email:</label>
                    <input type="text" name="emailadd" class="emailadd" >
                </p>

                <p>
                    <label for="password" style="padding-top: 10px;">Password:</label>
                    <input type="password" name="password" class="password">
                </p>

                <p class="login-submit">
                    <button type="submit" onclick="preloader()" id="loginBtn" class="login-button">Login</button>
                </p>

                <p class="forgot-password"><a href="">Forgot your password?</a></p>
            </form>

            <!--Sign-up-->

        </div>
    </div>
</div>
</body>
</html>

<?php

    session_start();

    include '../process/UserDAO.php';

    $action = new UserDAO();

    if(isset($_SESSION['emailadd']) && isset($_SESSION['password']))
        header('Location: pages/home.php');

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../images/t_logos.jpg"/>
    <link rel="stylesheet" href="../css/ui-darkness/jquery-ui.css" type="text/css"/>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <!-- <script language="javascript" src="js/clock.js" />-->
    <script type="text/javascript" src="../js/user.js"></script>
    <link rel="stylesheet"href="../css/footer.css" type="text/css"/>
    <link rel="stylesheet"href="../css/style.css" type="text/css"/>
    <link rel="stylesheet"href="../css/login.css" type="text/css"/>
    <link href="../css/loginBootstrap.css" rel="stylesheet" >
    <title>Tweety | Sign-Up</title>
</head>
<body onloadstart="preloader" >

<div class="preloader" >
    <div id="status"><br/><br/><span class="loader">Loading...</span> </div>
</div>

<?php include '../layout/sign-up_header.php'; ?>

<div class="outer" align="center">
    <div class="body" >
        <div class="error_login">
            <span><?php if (isset($errMsg)) echo $errMsg; ?></span>
        </div>
        <div class="inner_body" align="left"  >

            <!--Sign-up-->

            <div class="div_sign_up" >
                <div style="border: solid 1px rgba(200,200,200,.30); border-radius: 2px; width: 312px; padding-top: 10px; padding-bottom: 0px; padding-left: 20px; padding-right: 20px; " class="">
                    <form action="../php_func/add_user.php" method="post" id="users_info" >
                        <div class="div_sign_up_lab" style="padding-left: 1px; padding-top: 10px; padding-bottom: 10px; border-bottom: solid 1px rgba(200,200,200,.40);"><span class="label_span_sign" style="color: white; font ">Sign up for Free!</span></div><br/>
                        <table border="1" id="tbl_sign_up">
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="lname" id="lname" placeholder="Last Name" /><br/>
                                    <span id="error_lname" style="color: red; display: none;">Lastname is empty!</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="fname" id="fname" placeholder="First Name" /><br/>
                                    <span id="error_fname" style="color: red; display: none;">Firstname is empty!</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="address" id="address" placeholder="Home Address" /><br/>
                                    <span id="error_address" style="color: red; display: none;">Address is empty!</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="contactNum" id="contactNum" placeholder="Contact #" /><br/>
                                    <span id="error_contact" style="color: red; display: none;">Contact No is empty!</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="gender" id="gender" placeholder="Gender" /><br/>
                                    <span id="error_gender" style="color: red; display: none;">Gender is empty!</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="age" id="age" placeholder="Age" /><br/>
                                    <span id="error_age" style="color: red; display: none;">Age is empty!</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="email" id="email" placeholder="Email Address" /><br/>
                                    <span id="error_email" style="color: red; display: none;">Email address is empty!</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" name="pass" id="password" placeholder="Password" /><br/>
                                    <span id="error_pass" style="color: red; display: none;">Password is empty!</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" name="re-pass" id="re-pass" placeholder="Re-type Password" /><br/>
                                    <span id="error_re_pass" style="color: red; display: none;">Password did not match!</span>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td align="right"><br/>
                                    <div style=" border-top: solid 1px rgba(200,200,200,.40); ">
                                        <div style="padding-top:10px;">
                                            <button type="submit" class="btn-primary" id="sign_upSUbBtn">Sign up</button>
                                            <button class="btn-navbar" type="reset">Clear</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>

















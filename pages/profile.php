<?php
    session_start();
    include '../process/UserDAO.php';
    include '../process/MicropostDAO.php';
    include '../process/CommentDAO.php';

    if( !isset($_SESSION['emailadd']) && !isset($_SESSION['password'])){
        header('Location: login.php');
    }
    else{
        //UserDAO blocks
        $email = $_SESSION['emailadd'];

        $info = new UserDAO();
        $user = $info->viewUserInfo($email);
        $lname = $user->getLastName();
        $fname = $user->getFirstName();
        $address = $user->getAddress();
        $contact = $user->getContactNum();
        $gender = $user->getGender();
        $age = $user->getGender();
        $username = $user->getUsername();
        $profile_pic = $user->getImage();
    }
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" href="../images/t_logos.jpg"/>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/user.js"></script>
    <link rel="stylesheet"href="../css/header.css" type="text/css"/>
    <link rel="stylesheet"href="../css/footer.css" type="text/css"/>
    <link rel="stylesheet"href="../css/profile.css" type="text/css"/>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.shorten.1.0.js"></script>

    <title><?php echo $fname . ' ' . $lname; ?></title>
</head>
<body>

<?php include '../layout/header.php'; ?>

<div class="outer" align="center">
    <div class="body">
        <div class="inner-body">

            <div class="wrapper-menus"> <!-- Menus -->
                <div class="topmenus">
                    <ul>
                        <li>
                            <div class="div_find_friend">
                                <a id="link_find_friend" href="account_setting.php"><img src="../images/settings.png" style="height: 14px;"/> Account Setting</a>
                            </div>
                        </li>
                        <li><div><a id="link_prof" href=""><img class='' src='../php_func/<?php echo $profile_pic; ?>' style='width:15px; height:13px;' /> <?php echo $fname; ?></a></div></li>
                        <li><div><a id="link_home" href="../pages/home.php"><i class="icon-home icon-white" ></i> Home</a></div></li>
                    </ul>
                </div>
            </div>

            <div class="div_leftSide" >
                <div class="user_info">
                    <table id="tbl_user_info">
                        <tbody >
                        <tr class="tr_img">
                            <td align="right" class="td_user_prof_pic" id="" >
                               <img class="img-polaroid" src="../php_func/<?php echo $profile_pic; ?>" style="width: 50px; height: 50px;"/>
                            </td>
                            <td align="left" >
                                <a href="" disabled="disabled" name="user_name" id="user_name" style="margin-left: 10px;" /><?php echo $fname . ' ' . $lname;?></a><br/>
                                <a name="username" id="username" style="margin-left: 10px;"><span style='color: rgba(200,200,200,.50); font-size: 12px;'>@</span><?php echo $username; ?></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <table id="tbl_info" border="1" >
                        <tbody>
                            <tr>
                                <td><span class="label label-info">3</span> <br/>Tweets</td>
                                <td><span class="label label-info">4</span> <br/>Following</td>
                                <td><span class="label label-info">2</span> <br/>Followers</td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="border-collapse: collapse; margin-top: 10px; width: 100%;">
                        <tr>
                            <td align="center">
                                <!--<textarea rows="10" style="background-color:;" placeholder="Compose New Tweets"></textarea>-->
                                <div class="input" contenteditable="true" spellcheck="true" role="textbox" placeholder="Compose New Tweets" style="background-color: #ffffff; text-align: left; padding: 5px; max-width: 230px;">

                                </div>
                            </td>
                        </tr>
                    </table>

                    <table id="tbl_footer">
                        <tbody>
                        <tr>
                            <td>
                                <div><span class="copy_name" >Copyright</span> <span class="copy">&copy;</span><span class="copy_name"> All Right Reserved 2012 by: MAL Inc. Powered by: <a href="" class='founder' >E2Ps Property</a></span></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="div_rightSide">
                <div class="">

                </div>
            </div>


        </div>
    </div>
</div>

</body>
</html>

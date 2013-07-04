<?php
    include_once '../process/UserDAO.php';
    $email = $_SESSION['emailadd'];

    $info = new UserDAO();
    $user = $info->viewUserInfo($email);
    $fname = $user->getFirstName();
?>
<div class="web_header" align="center">
    <div class="web_content" >

        <div class="header" >
            <div class="inner-header">

                <div class="div_webTitle">
                    <div class="WebTitle">
                        <a href="">Tweety</a>
                    </div>

                    <div class="div-greet">
                        <span class="welNote" style="font-weight: bold;">Hello, </span><span class="user_name" style="font-weight: bold;"><?php echo $fname; ?></span><span class="span_out"><span class="liner">[</span><a href="../pages/logout.php" ><!--<img src="images/logout.jpg" width="20">-->Log out</a><span class="liner">]</span></span>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
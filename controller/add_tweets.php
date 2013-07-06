<?php

    include '../pages/home.php';

    $action = new MicropostDAO();

    $contents = $_POST['txt_content'];
    $email = $_SESSION['emailadd'];

    $action->addtweets($contents, $email);
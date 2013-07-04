<?php
    session_start();
    include '../process/MicropostDAO.php';

    $action = new MicropostDAO();
    $email = $_SESSION['emailadd'];

    $result = $action->viewtweets($email);

    print_r($result);
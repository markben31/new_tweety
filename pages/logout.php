<?php
    session_start();

    include '../process/UserDAO.php';

    $action = new UserDAO();

    $email = $_SESSION['emailadd'];

    $action->user_logout($email);
?>
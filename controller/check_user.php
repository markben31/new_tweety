<?php
    include '../process/UserDAO.php';
    session_start();

    $action = new UserDAO();

    if(isset($_POST['emailadd']) && isset($_POST['password'])){
        $email = $_POST['emailadd'];
        $password = $_POST['password'];
        $val_account = $action->user_login($email,md5($password));

        if($val_account){

            $_SESSION['emailadd'] = $_POST['emailadd'];
            $_SESSION['password'] = $_POST['password'];
            header('Location: ../pages/home.php');
        }else{
            $errMsg = "Unknown User!";
        }

    }
?>
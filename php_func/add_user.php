<?php

    include '../process/UserDAO.php';
    include_once '../modules/User.php';

    $action = new UserDAO();

    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $address = $_POST['address'];
    $contact = $_POST['contactNum'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $u_uname = "";
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);

    $info = new User();
    $info->setLastName($lname);
    $info->setFirstName($fname);
    $info->setAddress($address);
    $info->setContactNum($contact);
    $info->setGender($gender);
    $info->setAge($age);
    $info->setUsername($u_uname);
    $info->setEmailaddress($email);
    $info->setPassword($pass);

    $action->newAccount($info);
    header("Location: ../index.php");

?>
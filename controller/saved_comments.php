<?php

    session_start();

    include '../process/UserDAO.php';

    $action = new UserDAO();
    $m_id = $_POST['id'];
    $user_in_post = $_POST['post'];
    $emailadd = $_SESSION['emailadd'];

    $action->user_tweets_rep($m_id, $user_in_post, $emailadd);

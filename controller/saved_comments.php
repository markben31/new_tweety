<?php

    session_start();
    include '../pages/home.php';
    include '../process/CommentDAO.php';

    $action = new CommentDAO();
    $m_id = $_POST['post_id'];
    $user_in_post = $_POST['post_contents'];
    $emailadd = $_SESSION['emailadd'];

    $action->addNewComments($m_id, $user_in_post, $emailadd);

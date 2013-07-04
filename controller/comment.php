<?php
    include_once '../process/CommentDAO.php';

    $action = new CommentDAO();

    $result = $action->getNewComments();

    $action->updateComment();

    echo $result;
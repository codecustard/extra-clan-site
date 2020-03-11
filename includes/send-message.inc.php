<?php


//Disallow direct URL access (must use form) and spam
if (!isset($_POST['send-message-button']) || empty($_POST['spam-check'])) {
    header("Location: ../about.php");
    exit();
}

else {
    require "dbh.inc.php";

    $first = htmlspecialchars($_POST['input-firstname']);
    $last = htmlspecialchars($_POST['input-lastname']);
    $email = htmlspecialchars($_POST['input-email']);
    $subject = htmlspecialchars($_POST['input-subject']);
    $message = htmlspecialchars($_POST['input-message']);
    $ip = $_SERVER['REMOTE_ADDR'];
    $timestamp = time();


    //Exit on empty fields
    if (empty($first)) {
        header("Location: ../index.php?error=emptyfirst");
        exit();
    }
    elseif (empty($last)) {
        header("Location: ../index.php?error=emptylast");
        exit();
    }
    elseif (empty($email)) {
        header("Location: ../index.php?error=emptyemail");
        exit();
        
    }
    elseif (empty($subject)) {
        header("Location: ../index.php?error=emptysubject");
        exit();
    }
    elseif (empty($message)) {
        header("Location: ../index.php?error=emptymessage");
        exit();
    }
    else {
        $sql = "INSERT INTO messages (messagesFirst, messagesLast, messagesEmail, messagesSubject, messagesContent, messagesIp) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ssssss", $first, $last, $email, $subject, $message, $ip);
            mysqli_stmt_execute($stmt);
            header("Location: ../about.php?sent=success");
            exit();
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>
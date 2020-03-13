<?php


//Disallow direct URL access (must use form)
if (!isset($_POST['create-post-button'])) {
    header("Location: ../index.php");
    exit();
}

else {
    require "dbh.inc.php";

    session_start();

    $username = $_SESSION['username'];
    $currentPassword = $_POST['current-password'];
    $postTitle = htmlspecialchars($_POST['title']);
    $postDescription = htmlspecialchars($_POST['description']);
    $postContent = $_POST['content'];

    $ip = $_SERVER['REMOTE_ADDR'];
    $timestamp = time();


    //Exit on empty fields
    if (empty($postTitle)) {
        header("Location: ../index.php?error=emptytitle");
        exit();
    }
    elseif (empty($postDescription)) {
        header("Location: ../index.php?error=emptydescription");
        exit();
    }
    elseif (empty($postContent)) {
        header("Location: ../index.php?error=emptycontent");
        exit();
        
    }
    else {
        $sql = "SELECT * FROM users WHERE usersUser=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                mysqli_stmt_close($stmt);
                $passCheck = password_verify($currentPassword, $row['usersPass']);
                if ($passCheck == false) {
                    header("Location: ../post.php?error=wrongpassword&title=".$postTitle."&description=".$postDescription);
                    exit();
                }
                else if ($passCheck == true) {
                    $sql = "INSERT INTO news (newsTitle, newsDescription, newsContent, newsAuthor) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
        
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../post.php?error=sqlerror");
                        exit();
                    }
                    else {
                        mysqli_stmt_bind_param($stmt, "ssss", $postTitle, $postDescription, $postContent, $username);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../post.php?sent=success");
                        exit();
                    }
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>
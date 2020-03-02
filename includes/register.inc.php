<?php

if (isset($_POST['register-button'])) {
    require "dbh.inc.php";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($username) || empty($email) || empty($password) || empty($password2)) {
        header("Location: ../index.php");
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../index.php?error=invalidemailusername");
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidemail&username=".$username);
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../index.php?error=invalidusername&email=".$email);
        exit();
    }
    elseif($password !== $password2) {
        header("Location: ../index.php?error=passwordcheck&email=".$email."&username=".$username);
        exit();
    }
    else {
        $sql = "SELECT usersUser FROM users WHERE usersUser=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $results = mysqli_stmt_num_rows($stmt);
            if ($results > 0) {
                header("Location: ../index.php?error=usertaken&email=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users (usersUser, usersEmail, usersPass) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else {
    header("Location: ../index.php");
    exit();
}

?>
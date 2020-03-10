<?php

if (isset($_POST['save-button'])) {
    require "dbh.inc.php";

    session_start();

    $username = $_SESSION['username'];
    $currentPassword = $_POST['current-password'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $twitchChannel = htmlspecialchars($_POST['twitch-channel']);
    $youtubeChannel = htmlspecialchars($_POST['youtube-channel']);
    $bio = htmlspecialchars($_POST['bio']);

    if (empty($currentPassword)) {
        header("Location: ../index.php?error=emptypassword");
        exit();
    }

    elseif($password !== $password2) {
        header("Location: ../index.php?error=passwordcheck&twitch=".$twitchChannel."&youtube=".$youtubeChannel."&bio=".$bio);
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
                $passCheck = password_verify($currentPassword, $row['usersPass']);
                if ($passCheck == false) {
                    header("Location: ../profile.php?error=wrongpassword&twitch=".$twitchChannel."&youtube=".$youtubeChannel."&bio=");
                    exit();
                }
                else if ($passCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['usersId'];
                    $_SESSION['username'] = $row['usersUser'];

                    //Update password
                    if (!empty($password) && !empty($password2) && $password == $password2) {
                        $sql = "UPDATE users SET usersPass=? WHERE usersId=?";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../index.php?error=sqlerror");
                            exit();
                        }

                        else {
                            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $_SESSION['userId']);
                            mysqli_stmt_execute($stmt);
                        }
                    }

                    // //Update Twitch
                    // if (!empty($twitchChannel)) {
                    //     $sql = "UPDATE users SET usersTwitch=? WHERE usersId=?";
                    //     $stmt = mysqli_stmt_init($conn);

                    //     if (!mysqli_stmt_prepare($stmt, $sql)) {
                    //         header("Location: ../index.php?error=sqlerror");
                    //         exit();
                    //     }

                    //     else {
                    //         mysqli_stmt_bind_param($stmt, "si", $twitchChannel, $_SESSION['userId']);
                    //         mysqli_stmt_execute($stmt);
    
                    //         $_SESSION['twitchChannel'] = $twitchChannel;
                    //     }
                    // }

                    // //Update Youtube
                    // if (!empty($youtubeChannel)) {
                    //     $sql = "UPDATE users SET usersYoutube=? WHERE usersId=?";
                    //     $stmt = mysqli_stmt_init($conn);

                    //     if (!mysqli_stmt_prepare($stmt, $sql)) {
                    //         header("Location: ../index.php?error=sqlerror");
                    //         exit();
                    //     }

                    //     else {
                    //         mysqli_stmt_bind_param($stmt, "si", $youtubeChannel, $_SESSION['userId']);
                    //         mysqli_stmt_execute($stmt);
    
                    //         $_SESSION['youtubeChannel'] = $youtubeChannel;
                    //     }
                    // }

                    // //Update Bio
                    // if (!empty($bio)) {
                    //     $sql = "UPDATE users SET usersBio=? WHERE usersId=?";
                    //     $stmt = mysqli_stmt_init($conn);

                    //     if (!mysqli_stmt_prepare($stmt, $sql)) {
                    //         header("Location: ../index.php?error=sqlerror");
                    //         exit();
                    //     }

                    //     else {
                    //         mysqli_stmt_bind_param($stmt, "si", $bio, $_SESSION['userId']);
                    //         mysqli_stmt_execute($stmt);
    
                    //         $_SESSION['userBio'] = $bio;
                    //     }
                    // }

                    $sql = "UPDATE users SET usersTwitch=?, usersYoutube=?, usersBio=? WHERE usersId=?";
                    $stmt = mysqli_stmt_init($conn);
    
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../index.php?error=sqlerror");
                        exit();
                    }
                    else {
                        mysqli_stmt_bind_param($stmt, "sssi", $twitchChannel, $youtubeChannel, $bio, $_SESSION['userId']);
                        mysqli_stmt_execute($stmt);

                        $_SESSION['twitchChannel'] = $twitchChannel;
                        $_SESSION['youtubeChannel'] = $youtubeChannel;
                        $_SESSION['userBio'] = $bio;

                        header("Location: ../profile.php?update=success");
                        exit();
                    }
                }
                else {
                    header("Location: ../profile.php?error=wrongpassword");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();
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
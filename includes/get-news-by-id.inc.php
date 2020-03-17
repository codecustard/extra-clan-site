<?php 
require "dbh.inc.php";

$newsId = $_GET['newsId'];
$newsTitle = "";
$newsDescription = "";

$sql = "SELECT * FROM news WHERE newsId=?;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../news.php?error=sqlerror");
    exit();
}
else {
    mysqli_stmt_bind_param($stmt, "i", $newsId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $newsId = $row['newsId'];
        $newsTitle = $row['newsTitle'];
        $newsDescription = $row['newsDescription'];
        $newsContent = $row['newsContent'];
        $newsAuthor = $row['newsAuthor'];
    }
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
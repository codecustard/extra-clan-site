<?php 
require "dbh.inc.php";

$sql = "SELECT * FROM news ORDER BY newsId DESC";
$newsId = 0;
$newsTitle = "";
$newsDescription = "";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $newsId = $row['newsId'];
    $newsTitle = $row['newsTitle'];
    $newsDescription = $row['newsDescription'];

    echo "
    <div class='row'>
        <div class='col'>
            <h1 class='display-4'>".$newsTitle."</h1>
            <h2>".$newsDescription."</h2>
            <p class='lead'><a href='news.php?newsId=".$newsId."'>Learn more</a></p>
        </div>
    </div>
    <br /><br /><br />
    ";
}

mysqli_close($conn);

?>
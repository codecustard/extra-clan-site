<?php 
require "dbh.inc.php";

$sql = "SELECT * FROM news";
$newsId = 0;
$newsTitle = "";
$newsDescription = "";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    if ($row['newsId'] > $newsId) {
        $newsId = $row['newsId'];
        $newsTitle = $row['newsTitle'];
        $newsDescription = $row['newsDescription'];
    }
}
if (!empty($newsTitle)) {
    echo "
    <h1 class='display-4'>".$newsTitle."</h1>
    <h2>".$newsDescription."</h2>
    <p class='lead'><a href='news.php?newsId=".$newsId."'>Learn more</a></p><br /><br /><br />";
}
else {
    echo "<h1 class='display-4'>ESPORTS AND EVENTS</h1>";
}


mysqli_close($conn);

?>
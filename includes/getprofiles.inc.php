<?php 

require "dbh.inc.php";

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);
echo '<script src="https://embed.twitch.tv/embed/v1.js"></script>';
while ($row = mysqli_fetch_array($result)) {
    echo "
    <div class='container'>
        <h1 class='fade-in'>". $row['usersUser']."</h1> <br />
        <div class='row'>
            <div class='col'>"
                .$row['usersBio'].
            "</div>
        </div>
        <br /><br /><br />
        <div class='row'>
            <div class='col fade-in' id='twitch-embed-".$row['usersTwitch']."'></div>
        </div>
    </div>
    <script type='text/javascript'>
        new Twitch.Embed('twitch-embed-".$row['usersTwitch']."', {
            width: 480,
            height: 480,
            channel: '".$row['usersTwitch']."'
        });
    </script>
    ";
}

mysqli_close($conn);

?>
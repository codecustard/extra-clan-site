<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/df703ab03d.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <title>Extra Gaming - Post</title>
</head>
<body>


    <div class="jumbotron jumbotron-fluid" id="main-hero">
    <?php 
    require 'header.php';

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }

    $postTitle = isset($_SESSION['postTitle']) ? $_SESSION['postTitle'] : '';
    $postDescription = isset($_SESSION['postDescription']) ? $_SESSION['postDescription'] : '';
    $postContent = isset($_SESSION['postContent']) ? $_SESSION['postContent'] : '';

    ?>

        <div class="container">
            <h1 class="display-4">CREATE NEW POST</h1>
            
            <div class="container-form">
                <form action="includes/create-post.inc.php" method="POST">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
        
                            <input type="text" class="form-control" name="title" placeholder="title" value="<?php echo $postTitle?>">
                        </div>
        
                        <div class="form-group col-md-6">
                            <label for="youtube-channel">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="description" value="<?php echo $postDescription?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" rows="12"><?php echo $postContent?></textarea>
                    </div>
    
                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input type="password" class="form-control" name="current-password" placeholder="Current Password" required>
                    </div>
    
                    <button type="submit" class="btn btn-primary" name="create-post-button">Create Post</button>
                </form>
            </div>

        </div>
    </div>

    

    <section id="section-games">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php echo "
                    <h1 class='display-4' id='post-title'>".$postTitle."</h1>
                    <h2 id='post-description'>".$postDescription."</h2>
                    <p class='lead' id='post-content'>".$postContent."</p><br /><br /><br />";
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section id="section-sponsors">
        <!-- <div class="container">
            <h1 class="fade-in">Media</h1> <br /><br /><br />
            <div class="row">
                <div class="col" id="twitch-embed"></div>
            </div>
        </div> -->
    </section>


    <?php
    require 'footer.php';
    ?>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://embed.twitch.tv/embed/v1.js"></script>
    <script type="text/javascript">
        new Twitch.Embed("twitch-embed", {
            width: 480,
            height: 480,
            channel: "<?php echo $_SESSION['twitchChannel']?>"
        });
    </script>

    <script>
        const faders = document.querySelectorAll('.fade-in');
    const sliders = document.querySelectorAll('.slide-in');

    const appearOptions = {
        threshold: 1,
        rootMargin: "0px 0px -20px  0px"
    };

    const appearOnScroll = new IntersectionObserver( function(entries, appearOnScroll) {
        entries.forEach( entry => {
            if (!entry.isIntersecting) {
                return;
            }
            else {
                entry.target.classList.add('appear');
                appearOnScroll.unobserve(entry.target);
            }
        })
    }, appearOptions);

    faders.forEach(fader => {
        appearOnScroll.observe(fader);
    });

    sliders.forEach(slider => {
        appearOnScroll.observe(slider);
    });



        document.getElementsByTagName("body")[0].onscroll = function parallaxScroll() {  
            var scrolltotop = document.scrollingElement.scrollTop;
            var target = document.getElementById("main-hero");
            var xvalue = "center";
            var factor = 0.5;
            var yvalue = scrolltotop * factor;
            target.style.backgroundPosition = xvalue + " " + yvalue + "px";
        }
    </script>


    <script type="text/javascript">
        $(window).on('load', function() {

            <?php 
            if (isset($_GET['signup'])) {
                if ($_GET['signup'] == "success") {
                    echo "$('#register-success-modal').modal('show')";
                }
            }
            ?>
        });
    </script>
    
</body>
</html>
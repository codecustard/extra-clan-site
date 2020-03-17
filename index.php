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

    <title>Extra Gaming</title>
</head>
<body>


    <div class="jumbotron jumbotron-fluid" id="main-hero">
    <?php
    require 'header.php';
    ?>

        <div class="container fade-in">
            <?php require 'includes/get-latest-news.inc.php' ?>
        </div>
    </div>

    

    <section id="section-games">
        <div class="container">
            <h1 class="fade-in">Games</h1> <br />
            <img class="fade-in drop-shadow" src="https://media.giphy.com/media/l0MYtTmeB2KYB8bQI/giphy.gif" alt="">
            <?php /*require 'includes/get-live-streams.inc.php'*/ ?>
            <div class='row'>
                <div class='col fade-in' id='twitch-meek'></div>
            </div>
            <div class='row'>
                <div class='col fade-in' id='twitch-bipolarbear24'></div>
            </div>
        </div>
    </section>

    <section id="section-sponsors">
        <div class="container">
            <h1 class="fade-in">Sponsors</h1>
        </div>
    </section>

    <?php 
    require 'footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://embed.twitch.tv/embed/v1.js"></script>
    <script type="text/javascript">
        new Twitch.Embed("twitch-meek", {
            width: 480,
            height: 480,
            channel: "meekstarcraft"
        });
        new Twitch.Embed("twitch-bipolarbear24", {
            width: 480,
            height: 480,
            channel: "bipolarbear24"
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
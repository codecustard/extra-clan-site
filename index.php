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


        <nav class="navbar navbar-expand-lg navbar-dark navbar-transparent">
            <!-- <a class="navbar-brand" href="#">Extra</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto navbar-center">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Games
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Starcraft 2</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Watch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sponsors</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#login-modal" href="#">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#register-modal" href="#">Register</a>
                </li>
                </ul>
            </div>
        </nav>

        <div class="container fade-in">
            <h1 class="display-4">ESPORTS AND EVENTS</h1>
            <p class="lead"><a href="#">Learn more</a></p>
        </div>
    </div>

    

    <section id="section-games">
        <div class="container">
            <h1 class="fade-in">Games</h1> <br />
            <img class="fade-in drop-shadow" src="https://media.giphy.com/media/l0MYtTmeB2KYB8bQI/giphy.gif" alt="">
            <div class="row">
                <div class="col fade-in" id="twitch-meek">
                </div>
                <div class="col fade-in" id="twitch-bipolarbear"></div>

            </div>
        </div>
    </section>

    <section id="section-sponsors">
        <div class="container">
            <h1 class="fade-in">Sponsors</h1>
        </div>
    </section>


    <footer>
        &copy; 2020 Extra Gaming. All Rights Reserved. <br /> <br />
        <i class="fab fa-facebook-f"></i> <i class="fab fa-twitter"></i> <i class="fab fa-youtube"></i> <i class="fab fa-twitch"></i>
    </footer>


<!-- MODALS -->

    <!-- REGISTER MODAL -->
    <div class="modal" id="register-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Register</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="includes/register.inc.php" method="POST">
                  <input type="text" class="form-control" name="username" placeholder="Enter your username" required> </input><br/>
                  <input type="email" class="form-control" name="email" placeholder="Enter your email" required> </input><br/>
                  <input type="password" class="form-control" name="password" placeholder="Enter your password" required> </input><br/>
                  <input type="password" class="form-control" name="password2" placeholder="Enter your password" required> </input><br/>
                  <button type="submit" class="btn btn-dark" name="register-button">Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>


    <!-- SUCCESSFUL REGISTRATION MODAL -->
      <div class="modal" id="register-success-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Registration Complete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p>Registration successful!</p>
            </div>
          </div>
        </div>
      </div>

    <!-- LOGIN MODAL -->
    <div class="modal" id="login-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="includes/login.inc.php" method="POST">
                  <input type="text" class="form-control" name="username" placeholder="Enter your username" required> </input><br/>
                  <input type="password" class="form-control" name="password" placeholder="Enter your password" required> </input><br/>
                  <button type="submit" class="btn btn-dark" name="login-button">Login</button>
              </form>
            </div>
          </div>
        </div>
    </div>


<!-- END OF MODALS -->

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
        new Twitch.Embed("twitch-bipolarbear", {
            width: 480,
            height: 480,
            channel: "bipolarbear"
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
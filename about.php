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

    <title>Extra Gaming - About</title>
</head>
<body>


    <div class="jumbotron jumbotron-fluid" id="main-hero">


        <?php require 'header.php'; ?>

        <div class="container fade-in">
            <h1 class="display-4">Who We Are?</h1>
            <p>
                A group of gaming enthusiasts bringing entertainment doing what we love.
            </p>
        </div>
    </div>

    

    <section id="section-about">
        <div class="container">
            <div class="row">
                <div class="col"><h2>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </h2></div>
            </div>
        </div>
    </section>

    <section id="section-social">
        <div class="container">
            <h1 class="fade-in">Follow Us!</h1> <br />

            <i class="fade-in fab fa-facebook-f fa-7x fa-fw"></i> <a href="https://twitter.com/eXtragamingsc2"><i class="fade-in fab fa-twitter fa-7x fa-fw"></i></a> <a href="https://www.youtube.com/channel/UC36QxOS3VpMSmW3K3qhgvtQ/featured"><i class="fade-in fab fa-youtube fa-7x fa-fw"></i></a> <a href="https://discord.gg/c3yHUB"><i class="fade-in fab fa-twitch fa-7x fa-fw"></i></a>
        </div>
        <div class="container">
            <h1>Contact Us!</h1> <br />

            <div class="container-form">
            <form action="includes/send-message.inc.php" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="input-firstname">First Name</label>
                    <input type="text" class="form-control" name="input-firstname" placeholder="First Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="input-lastname">Last Name</label>
                    <input type="text" class="form-control" name="input-lastname" placeholder="Last Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-email">Email Address</label>
                  <input type="email" class="form-control" name="input-email" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                  <label for="input-subject">Subject</label>
                  <input type="text" class="form-control" name="input-subject" placeholder="Subject" required>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="input-message">Message</label>
                    <textarea class="form-control" name="input-message" rows="3" required></textarea>
                  </div>
                </div>

                <button type="submit" class="btn btn-dark" name="send-message-button">Submit</button><br /><br />
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="spam-check" required>
                  <label class="form-check-label" for="spam-check">I am not a robot</label>
                </div>
              </form>
            </div>
        </div>
    </section>


    <?php require 'footer.php' ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
    
</body>
</html>
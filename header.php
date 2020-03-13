<?php session_start() ?>

<nav class="navbar navbar-expand-lg navbar-dark navbar-transparent">
            <!-- <a class="navbar-brand" href="#">Extra</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto navbar-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news.php">News</a>
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
                    <a class="nav-link" href="watch.php">Watch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <!-- Currently no sponsors -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Sponsors</a>
                </li> -->

                <?php 
                
                if (isset($_SESSION['username'])) {
                    echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION['username'].
                    '</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="post.php">Post</a>
                    <a class="dropdown-item" href="includes/logout.inc.php">Logout</a>
                    </div>
                </li>';
                }
                else {
                    echo '<li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#login-modal" href="#">Login</a>
                </li><li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#register-modal" href="#">Register</a>
            </li>';
                }

                ?>

                
                </ul>
            </div>
        </nav>



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
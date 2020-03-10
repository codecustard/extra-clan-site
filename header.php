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

                <?php 
                
                if (isset($_SESSION['username'])) {
                    echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION['username'].
                    '</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profile.php">Profile</a>
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
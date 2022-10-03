<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <a class="navbar-brand" href="index.html">
        <img src="img/logo.png" alt="" width="100px">
    </a>
    <div class="order-lg-last">
        <p class="mb-0 d-flex">
            <?php
            if (!isset($_SESSION["userID"])) {
            ?>
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Book Now
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-center" href="login-user.php">Login</a>
                <a class="dropdown-item text-center" href="signup-user.php">Register</a>
            </div>
        </div>

    <?php } else { ?>
        <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Account
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-center" href="myaccount.php">My Booking</a>
                <a class="dropdown-item text-center" href="logout_user.php">Logout</a>
            </div>
        </div>
    <?php } ?>

    </p>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto mr-md-3">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="Packages.php" class="nav-link">Packages</a></li>
            
        <li class="nav-item dropdown">
        <div class="dropdown">
             <a href="Accomodation.php" class="nav-link" > Accomodation</a>
        <div class="dropdown-content">
            <a href="more.php"> Rooms</a> <br>
            <a href="Tent.php"> Tents</a> <br>
            <a href="Meals.php"> Meals</a>
        </div>
            </li>
        
            <li class="nav-item"><a href="Activities.php" class="nav-link">Activities</a></li>
            <li class="nav-item"><a href="Covid-19.php" class="nav-link">Covid-19</a></li>
            <li class="nav-item"><a href="Feedback.php" class="nav-link">Feedback</a></li>
        </ul>
    </div>
</nav>
<!-- END nav -->
<script>
    //check for navigation bar
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>

<?php 
$path = $_SERVER['REQUEST_URI']
?>
<?php require_once('includes/functions.php'); ?>
<header>
    <div class="topnav" id="myTopnav">
        <a href = "index.php"><img src = "assets/images/logo.png" class = "logo" alt = "logo of the website, three leaves and a growing flower"></a>
            <nav>
              <ul>
              <li><a href="index.php" <?php if ($path == '/~s3885529/wp/a2/index.php') echo 'class = "active"'?>>Home</a></li>
                <li><a href="service.php" <?php if ($path == '/~s3885529/wp/a2/service.php') echo 'class = "active"'?>>Features</a></li>
                <li><a href="myServices.php" <?php if ($path == '/~s3885529/wp/a2/myServices.php') echo 'class = "active"'?>>myServices</a></li>
                <li><a href="contact.php" <?php if ($path == '/~s3885529/wp/a2/contact.php') echo 'class = "active"'?>>Contact Us</a></li>
                
                <?php if(isUserLoggedIn()) { ?>
                    <li><a href="logout.php"><button class = "nav-button">Logout</button></a></li>
                <?php } else { ?>
                    <li><a href="login.php"><button class = "nav-button">Login</button></a></li>
                <?php } ?>
                
                
            </ul>
        </nav>

        <a href="javascript:void(0);" class="icon" onclick="openNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content"><?php if(isUserLoggedIn()) { ?>
                    <a href="logout.php">Logout</a>
                <?php } else { ?>
                    <a href="login.php">Login</a>
                <?php } ?>
            <a href="registration.php" <?php if ($path == '/~s3885529/wp/a2/registration.php') echo 'class = "active"'?>>Register</a>
            <a href="index.php" <?php if ($path == '/~s3885529/wp/a2/index.php') echo 'class = "active"'?>>Home</a>
            <a href="service.php" <?php if ($path == '/~s3885529/wp/a2/service.php') echo 'class = "active"'?>>Features</a>
            <a href="myServices.php" <?php if ($path == '/~s3885529/wp/a2/myServices.php') echo 'class = "active"'?>>myServices</a>
            <a href="contact.php" <?php if ($path == '/~s3885529/wp/a2/contact.php') echo 'class = "active"'?>>Contact Us</a>
        </div>
    </div>
</header>


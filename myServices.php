<?php require_once('includes/authorise.php'); ?>
<?php $services = getServices(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>myServices | LIFE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styles/myServices.css">
        <link rel="stylesheet" type="text/css" href="styles/service.css">
        <link rel="stylesheet" type="text/css" href="styles/registration.css">
        
        <link rel="stylesheet" href="styles/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.cdnfonts.com/css/gt-walsheim" rel="stylesheet">
    </head>

    <body>
        <div class = containernav>
            <!-- call navbar code fragment here  -->
            <?php require_once("includes/navbar.php"); ?>
        </div>
        

        <!-- checking if the used is logged in or not-->
        <?php if(!isUserLoggedIn()) { ?>
            <!-- if not -  present them with login form -->
            <?php require_once("includes/login_form.php"); ?>
            <?php } else { ?>
                <!--greeting with the user name -->
                <div class = "welcome">
                    Hey, <?= getLoggedInUser()['firstname'];?>
                    <div class="p1"><p>We missed you!</p></div>
                    <div class="p2">
                    <p >How would you like to make your life better today?</p></div>
                </div>
            <?php } ?>
        
            <!-- different service choices from the database -->
            <div class="services">
                <?php foreach($services as $service) { ?>
                    <div class="col-3 text-center">
                        <a href="activity.php?id=<?php echo $service['service_id']; ?>">
                            <img src="<?php echo $service['image_path']; ?>" class="service" />
                            <h3 class= "text"><?php echo $service['name']; ?></h3>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        
        <!-- call footer here  -->
	    <?php require_once("includes/footer.php"); ?>

    </body>
</html>
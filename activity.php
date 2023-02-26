<?php require_once('includes/authorise.php'); ?>
<?php
    $id = (int) $_GET['id'];
    $service = getService($id);

    $errors = [];
    if(isset($_POST['activity'])) {
        $email = getLoggedInUser()['email'];

        $errors = recordActivity($email, $id, $_POST);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Services | LIFE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="styles/index.css">
        <link rel="stylesheet" type="text/css" href="styles/service.css">
        <link rel="stylesheet" type="text/css" href="styles/activity.css">
        <link rel="stylesheet" href="styles/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.cdnfonts.com/css/gt-walsheim" rel="stylesheet">
        
        <style>
            /* for nested radio buttons */
            .sub1, .sub2{ display: none; }

            :checked ~ .sub1, :checked ~ .sub2  {
                display: block;
                margin-left: 40px;
            }
        </style>
    </head>

    <body>
        <div class = containernav>
            <!-- call navbar fragment here  -->
            <?php require_once("includes/navbar.php"); ?>
        </div>

        <div class="container">
            <div class="content">
            <!-- displaying the contents for a particular service selected -->
                <div class="service-heading">
                    <img src="<?php echo $service['image_path']; ?>" class="service-image" />
                        <h1 class="service-display">
                        <?php echo $service['name']; ?>
                        </h1>
                </div>

            <!-- if yoga is selected -->
            <?php if($id === 1) { ?>
            <p class = "service-headline">Select any of our yoga classes below and start stiling your mind!</p>

            <?php if(!isset($_POST['type'])) { ?>
                <?php $serviceInstructions = getServiceInstructions($id); ?>

                <form method="post"  class = "form">
                    <div class="form-group">
                        <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                            <?php $t = $serviceInstruction['service_type']; ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>" />
                                <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                            </div>
                        <?php } ?>
                        <?php if(isset($_POST['service'])) { ?>
                            <div class='text-danger'>*Must select a yoga type.</div>
                        <?php } ?>
                    </div>

                    <div class="options">
                        <button type="submit" class="button_submit" name="service">Go</button></div>
                    <p class = "back"><a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a></p>
                    
                </form>

            <!-- display of relevant media -->
            <?php } else { ?>
                <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

                <h3 class = "service-subheading"><?php echo $serviceInstruction['service_type']; ?></h3>
                <video class="service-video" height="400" controls>
                    <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                </video>

                <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                    <form method="post">
                        <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

                        <div class="subform">
                            <div class="col">
                                <p class = "duration-text">Save your progress to review later!</p>
                                <div class="duration-label"><label for="duration">Duration (minutes)</label></br></div>
                                <input type="text" id="duration" name="duration"
                                    <?php displayValue($_POST, 'duration'); ?> />
                                <?php displayError($errors, 'duration'); ?>
                            </div>
                        </div>

                        <div class="record-activity">
                        <button type="submit" class="button_submit2" name="activity">Record Activity</button></div>
                        <p class = "back"><a href="">Cancel</a></p>
                    </form>
                <?php } else { ?>
                    <div class="alert-success">
                        You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                        <strong><?php echo $_POST['type']; ?> Yoga</strong>.
                    </div>
                    <div class= "options3">
                        <a href="" class="btn btn-outline-dark mr-5">More <?php echo $service['name'] ?> |</a>
                        <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
                    </div>
                <?php } ?>
            <?php } ?>
        
        <!-- if meditation is selected -->
        <?php } else if ($id === 2) { ?>
            <p class = "service-headline">Select from our meditation audio/video below and start stiling your mind!</p>
            <?php if(!isset($_POST['type'])) { ?>
                <?php $serviceInstructions = getServiceInstructions($id); ?>

                <form method="post">
                    <div class="form-group">
                        <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                            <?php $t = $serviceInstruction['service_type']; ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>" />
                                <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                            </div>
                        <?php } ?>
                        <?php if(isset($_POST['service'])) { ?>
                            <div class='text-danger'>*Must select the media type.</div>
                        <?php } ?>
                    </div>

                    <div class="options">
                        <button type="submit" class="button_submit" name="service">Go</button></div>
                        <p class = "back"><a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a></p>
                    
                </form>
            <?php } else { ?>
                <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

                <h3 class = "service-subheading"><?php echo $serviceInstruction['service_type']; ?></h3>
                <?php if (strcmp($serviceInstruction['path'], 'assets/videos/meditation.mp3')){ ?>
                    <video class="service-video" height="400" controls>
                            <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                        </video>
                    <?php } else { ?>
                        <video class="service-audio" height="50" width = "300" controls>
                            <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                        </video>
                        <?php } ?>
                <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                    <form method="post">
                        <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

                        <div class="subform">
                            <div class="col">
                                <p class = "duration-text">Save your progress to review later!</p>
                                <div class="duration-label"><label for="duration">Duration (minutes)</label></div>
                                <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                                    <?php displayValue($_POST, 'duration'); ?> />
                                <?php displayError($errors, 'duration'); ?>
                            </div>
                        </div>

                        <div class="record-activity">
                        <button type="submit" class="button_submit2" name="activity">Record Activity</button></div>
                        <p class = "back"><a href="">Cancel</a></p>
                    </form>
                <?php } else { ?>
                    <div class="alert-success">
                        You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                        <strong><?php echo $_POST['type']; ?> Meditation</strong>.
                    </div>
                    <div class= "options3">
                        <a href="" class="btn btn-outline-dark mr-5">More <?php echo $service['name']; ?> | </a>
                        <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
                    </div>
                <?php } ?>
            <?php } ?>

        <!-- if stretching is selected -->
        <?php } else if ($id === 3) { ?>
            <p class = "service-headline">Select from our stretching follow along videos below and start flexing today :)</p>
            <?php if(!isset($_POST['type'])) { ?>

                <!-- unique services available instead of printing same service multiple times -->
                <?php $serviceInstructions = getServiceInstructions($id); ?>
                <?php $unique_types = array_unique(array_map(function($elem){return $elem['service_type'];}, $serviceInstructions)); ?>

                <form method="post">
                    <div class="form-group">
                    <?php foreach($unique_types as $unique_type) { ?>
                            <?php $d1 = $serviceInstructions[0]['video_duration']; ?>
                            <?php $d2 = $serviceInstructions[1]['video_duration']; ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    id="<?php echo $unique_type; ?>" name="type" value="<?php echo $unique_type; ?>" />
                                <label class="form-check-label" for="<?php echo $unique_type; ?>"><?php echo $unique_type; ?></label>
                                
                                <div class = "sub1">
                                    <div>
                                    <input class="form-check-input" type="radio" 
                                        id="<?php echo $d1 ; ?>" name="video_duration" value="<?php echo $d1; ?>" checked="checked"/>
                                    <label class="form-check-label" for="<?php echo $d1; ?>"><?php echo $d1; ?></label>
                                    </div>
                                </div>
                                <div class = "sub2">
                                    <div>
                                    <input class="form-check-input" type="radio"
                                        id="<?php echo $d2; ?>" name="video_duration" value="<?php echo $d2; ?>" />
                                    <label class="form-check-label" for="<?php echo $d2; ?>"><?php echo $d2; ?></label>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        
                        <?php if(isset($_POST['service'])) { ?>
                            <div class='text-danger'>*Must select a stretching type.</div>
                        <?php } ?>
                    </div>

                    <div class="options">
                        <button type="submit" class="button_submit" name="service">Go</button>
                    </div>
                    <p class = "back"><a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a></p>
                </form>
            <?php } else { ?>
                <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

                <h3 class = "service-subheading"><?php echo $serviceInstruction['service_type']; ?></h3>
                <video class="service-video" height="400" controls>
                    <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                </video>

                <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                    <form method="post">
                        <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

                        <div class="subform">
                            <div class="col">
                                <p class = "duration-text">Save your progress to review later!</p>
                                <div class="duration-label"><label for="duration">Duration (minutes)</label></div>
                                <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                                    <?php displayValue($_POST, 'duration'); ?> />
                                <?php displayError($errors, 'duration'); ?>
                            </div>
                        </div>
                        <div class="record-activity">
                        <button type="submit" class="button_submit2" name="activity">Record Activity</button></div>
                        <p class = "back"><a href="">Cancel</a></p>
                    </form>
                <?php } else { ?>
                    <div class="alert-success">
                        You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                        <strong><?php echo $_POST['type']; ?></strong>.
                    </div>
                    <div class= "options3">
                        <a href="" class="btn btn-outline-dark mr-5">More <?php echo $service['name']; ?> | </a>
                        <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
                    </div>
                <?php } ?>
            <?php } ?>

        <!-- if healthy habits is selected, user taken to new meal planner -->
        <?php } else if ($id === 4) {?>
            <?php require_once('meal_planner.php'); ?>
        <?php } ?>
        </div>
    </div>

    <!-- calling footer fragment here -->
    <?php require_once('includes/footer.php'); ?>
</body>
</html>

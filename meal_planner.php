<?php require_once('includes/database-functions.php'); ?>
<?php require_once('includes/authorise.php'); ?>
<?php
    $id = (int) $_GET['id'];
    $service = getService($id);

    $errors = [];
    if(isset($_POST['activity'])) {
        $email = getLoggedInUser()['email'];

        $errors = recordActivity($email, $id, $_POST);
    } ?>

<p class = "service-headline">Choose a preferred diet and get a customised meal plan addressing your input requirements!</p>
<h2 class = "calorie-ques">How many calories do you want to intake?</h2>

<!-- checking if the type is not empty -->
<?php if(!isset($_POST['type'])) { ?>
    <?php $mealInstructions = getMealInstructions($id); ?>
    
    <!--input form for the user -->
    <form method="post">
        <div class="form-group">
            <input id="calorie" name = "calorie" type="number" min="200" max="2000" required placeholder="Between 200 - 2000 cal"/>
            <br><br>
        <?php //print_r($mealInstructions); ?>
        <?php $unique_types = array_unique(array_map(function($elem){return $elem['diet_type'];}, $mealInstructions)); ?>
        <?php// print_r($unique_types); ?>
        <h3 class = "diet-options">Select a diet type:</h3>
            <?php foreach($unique_types as $unique_type) { ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio"
                        id="<?php echo $unique_type; ?>" name="type" value="<?php echo $unique_type; ?>" />
                    <label class="form-check-label" for="<?php echo $unique_type; ?>"><?php echo $unique_type; ?></label>
                </div>
            <?php } ?>
            <?php if(isset($_POST['service'])) { ?>
                <div class='text-danger'>You must select a yoga type.</div>
            <?php } ?>
        </div>

        <!-- submit button and other options-->
        <div class="options">
        <button type="submit" class="button_submit" name="service">Go</button></div>
        <p class = "back"><a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a></p>
    </form>
    
<!-- meal planner logic -- presenting meals in randomise fashion addressing
the total calorie count and the diet type they are after -->

<?php } else { ?>
    <?php $email = getLoggedInUser()['email']; ?>
    <?php $meals_array = [] ?>
    <?php for ($x = 1; $x <= 30; $x++){ ?>
    <?php $mealInstruction = getMealInstruction($id, $_POST['type'], $x); ?>
    <?php array_push($meals_array, $mealInstruction); ?>
    <?php } ?>

    <?php $value = $_POST['calorie'] ?>
    <p class = "calorie-ans"><?php echo $value ?> calories </p>
    <h2 class = "diet-type">Diet Type: <?php echo $_POST['type'] ?></h2>
    <?php $count = 0 ?>
    <?php $display_meal = [] ?>

    <?php if(strcmp($_POST['type'], 'Vegan') == 0){ ?>

        <div class="mealplan">
        <h2 class = "plan-heading">Meal plan 1</h2>
        <?php for ($i = 0; $i <10; $i++){ ?>
            <?php if ($value - $count >= 50){ ?>
                <?php $random = rand(0, 9); ?>
            
                <?php if ($meals_array[$random]['calories'] - ($value - $count) <=50){ ?>
                    <?php array_push($display_meal, $meals_array[$random]); ?>
                    <?php $count = $count + $meals_array[$random]['calories'] ?>

                    <!-- presenting the name, image and calories of a meal --->
                    <h3 class = "meal-name"><?php echo $meals_array[$random]['name'] ?><br></h3>
                    <img src = "<?php echo $meals_array[$random]['image_path'] ?>" height = "100px" width = "100px">
                    <span class = "calories-count">Calories: <?php echo $meals_array[$random]['calories'] ?></span><br>
                    <hr class="rounded">
                    
                    <?php $mealID =  $meals_array[$random]['meal_id'] ?>
                    <?php $diet_type =  $meals_array[$random]['diet_type'] ?>
                    <?php recordMeal($email, $mealID, $diet_type) ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <h2 class = "sum-calories">That's <?php echo $count ?> calories for this meal plan!</h2>
        </div>
        
        <?php $value = $_POST['calorie'] ?>
        <?php $count = 0 ?>
        <?php $display_meal = [] ?>
        <div class="mealplan">
        <h2 class = "plan-heading">Meal plan 2</h2>
        <?php for ($i = 0; $i <10; $i++){ ?>
            <?php if ($value - $count >= 50){ ?>
                <?php $random = rand(0, 9); ?>
            
                <?php if ($meals_array[$random]['calories'] - ($value - $count) <=50){ ?>
                    <?php array_push($display_meal, $meals_array[$random]); ?>
                    <?php $count = $count + $meals_array[$random]['calories'] ?>
                    <h3 class = "meal-name"><?php echo $meals_array[$random]['name'] ?><br></h3>
                    <img src = "<?php echo $meals_array[$random]['image_path'] ?>" height = "100px" width = "100px">
                    <span class = "calories-count">Calories: <?php echo $meals_array[$random]['calories'] ?></span><br>
                    <hr class="rounded">
                    
                    <?php $mealID =  $meals_array[$random]['meal_id'] ?>
                    <?php $diet_type =  $meals_array[$random]['diet_type'] ?>
                    <?php recordMeal($email, $mealID, $diet_type) ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <h2 class = "sum-calories">That's <?php echo $count ?> calories for this meal plan!</h2>
        </div>

    <?php } else if (strcmp($_POST['type'], 'Vegetarian') == 0){ ?>

        <div class="mealplan">
        <h2 class = "plan-heading">Meal plan 1</h2>
        <?php for ($i = 10; $i <20; $i++){ ?>
            <?php if ($value - $count >= 50){ ?>
                <?php $random = rand(10, 19); ?>
                <?php if ($meals_array[$random]['calories'] - ($value - $count) <=50){ ?>
                    <?php array_push($display_meal, $meals_array[$random]); ?>
                    <?php $count = $count + $meals_array[$random]['calories'] ?>
                    <h3 class = "meal-name"><?php echo $meals_array[$random]['name'] ?><br></h3>
                    <img src = "<?php echo $meals_array[$random]['image_path'] ?>" height = "100px" width = "100px">
                    <span class = "calories-count">Calories: <?php echo $meals_array[$random]['calories'] ?></span><br>
                    <hr class="rounded">
                    
                    <?php $mealID =  $meals_array[$random]['meal_id'] ?>
                    <?php $diet_type =  $meals_array[$random]['diet_type'] ?>
                    <?php recordMeal($email, $mealID, $diet_type) ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <h2 class = "sum-calories">That's <?php echo $count ?> calories for this meal plan!</h2>
        </div>

        <?php $value = $_POST['calorie'] ?>
        <?php $count = 0 ?>
        <?php $display_meal = [] ?>

        <div class="mealplan">
        <h2 class = "plan-heading">Meal plan 2</h2>
        <?php for ($i = 10; $i <20; $i++){ ?>
            <?php if ($value - $count >= 50){ ?>
                <?php $random = rand(10, 19); ?>
                <?php if ($meals_array[$random]['calories'] - ($value - $count) <=50){ ?>
                    <?php array_push($display_meal, $meals_array[$random]); ?>
                    <?php $count = $count + $meals_array[$random]['calories'] ?>
                    <h3 class = "meal-name"><?php echo $meals_array[$random]['name'] ?><br></h3>
                    <img src = "<?php echo $meals_array[$random]['image_path'] ?>" height = "100px" width = "100px">
                    <span class = "calories-count">Calories: <?php echo $meals_array[$random]['calories'] ?></span><br>
                    <hr class="rounded">
                    
                    <?php $mealID =  $meals_array[$random]['meal_id'] ?>
                    <?php $diet_type =  $meals_array[$random]['diet_type'] ?>
                    <?php recordMeal($email, $mealID, $diet_type) ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <h2 class = "sum-calories">That's <?php echo $count ?> calories for this meal plan!</h2>
        </div>

    <?php } else if (strcmp($_POST['type'], 'Non-Vegetarian') == 0) {?>
        <div class="mealplan">
        <h2 class = "plan-heading">Meal plan 1</h2>
        <?php for ($i = 20; $i <30; $i++){ ?>
            <?php if ($value - $count >= 50){ ?>
                <?php $random = rand(20, 29); ?>
            
                <?php if ($meals_array[$random]['calories'] - ($value - $count) <=50){ ?>
                    <?php array_push($display_meal, $meals_array[$random]); ?>
                    <?php $count = $count + $meals_array[$random]['calories'] ?>
                    <h3 class = "meal-name"><?php echo $meals_array[$random]['name'] ?><br></h3>
                    <img src = "<?php echo $meals_array[$random]['image_path'] ?>" height = "100px" width = "100px">
                    <span class = "calories-count">Calories: <?php echo $meals_array[$random]['calories'] ?></span><br>
                    <hr class="rounded">
                    
                    <?php $mealID =  $meals_array[$random]['meal_id'] ?>
                    <?php $diet_type =  $meals_array[$random]['diet_type'] ?>
                    <?php recordMeal($email, $mealID, $diet_type) ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <h2 class = "sum-calories">That's <?php echo $count ?> calories for this meal plan!</h2>
        </div>

        <?php $value = $_POST['calorie'] ?>
        <?php $count = 0 ?>
        <?php $display_meal = [] ?>

        <div class="mealplan">
        <h2 class = "plan-heading">Meal plan 2</h2>
        <?php for ($i = 20; $i <30; $i++){ ?>
            <?php if ($value - $count >= 50){ ?>
                <?php $random = rand(20, 29); ?>
            
                <?php if ($meals_array[$random]['calories'] - ($value - $count) <=50){ ?>
                    <?php array_push($display_meal, $meals_array[$random]); ?>
                    <?php $count = $count + $meals_array[$random]['calories'] ?>
                    <h3 class = "meal-name"><?php echo $meals_array[$random]['name'] ?><br></h3>
                    <img src = "<?php echo $meals_array[$random]['image_path'] ?>" height = "100px" width = "100px">
                    <span class = "calories-count">Calories: <?php echo $meals_array[$random]['calories'] ?></span><br>
                    <hr class="rounded">
                    
                    <?php $mealID =  $meals_array[$random]['meal_id'] ?>
                    <?php $diet_type =  $meals_array[$random]['diet_type'] ?>
                    <?php recordMeal($email, $mealID, $diet_type) ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <h2 class = "sum-calories">That's <?php echo $count ?> calories for this meal plan!</h2>
        </div>
        <?php } ?>
    
        <!--back options -->
        <div class= "back">
            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
        </div>
    
<?php } ?>
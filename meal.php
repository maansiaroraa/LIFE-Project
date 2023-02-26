<!DOCTYPE html>
<html>
    <head>
      <title>Meal Planner | LIFE</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="styles/meal.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.cdnfonts.com/css/gt-walsheim" rel="stylesheet">
    </head>

    <body>
      <!-- OLD MEAL PLANNER - ASSIGNMENT 1 -->
        <div class = container>
          <!-- calling navbar fragment here  -->
	        <?php require_once("includes/navbar.php"); ?>
        </div>


        <!-------------------------------------
          input field and item display section
        -------------------------------------->
        <div class="calorie-form">
            <form onsubmit="return calcCal();">

                <h2>How many calories do you want to intake?</h2>
                <input id="calorie" type="number" min="100" max="2000" required placeholder="Input value between 100 - 2000 calories"/>
                <p>*The total calorie count may vary by a margin of 100 calories (surplus or deficient).</p>
                <br><br>
        
                <input type="submit" value="Show Meals" id = "submit"/>
                <div id="calorie-results"></div>
            </form>
        </div>

        <!-- call footer here  -->
	      <?php require_once("includes/footer.php"); ?>

        <script src="js/meal.js"></script>
    </body>
</html>
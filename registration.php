<?php require_once('includes/functions.php'); ?>
<?php
    $errors = [];
    if(isset($_POST['submit'])) {
        $errors = registerUser($_POST);

        if(count($errors) === 0)
            redirect('service.php');
    }
?>

<!DOCTYPE html>  
<html>  
<head>
     <title>Registration | LIFE</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     
     <link rel="stylesheet" type="text/css" href="styles/registration.css">
     <link rel="stylesheet" type="text/css" href="styles/index.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://fonts.cdnfonts.com/css/gt-walsheim" rel="stylesheet">
</head>
<body>  
     <div class = containernav>
          <!-- call navbar fragment here  -->
          <?php require_once("includes/navbar.php"); ?>
          
          <!-- new registration form with jquery validation -->
          <div class="container">  
               <form method="post" autocomplete="off" id = "registration_form"> 
               <h4>Register With Us</h4> 

                    <div class="form-group">  
                    <label>First Name <span class="required-color">*</span></label>
                    <input 
                    type="text"
                    name="firstname" 
                    class="form-control"
                    placeholder="Enter first name with first letter to be capital"
                    
                    <?php displayValue($_POST, 'firstname'); ?> />
                    <?php displayError($errors, 'firstname'); ?>
                    </div>
                    
                    <div class="form-group">  
                    <label>Last Name <span class="required-color">*</span></label>
                    <input 
                    type="text"
                    name="lastname" 
                    class="form-control"
                    placeholder="Enter last name with first letter to be capital"
                     
                    <?php displayValue($_POST, 'lastname'); ?> />
                    <?php displayError($errors, 'lastname'); ?>
                    </div> 

                    <div class="form-group">  
                    <label>Email<span class="required-color">*</span></label>  
                    <input
                    type="text"
                    name="email" 
                    class="form-control" 
                    placeholder="Enter Email" 
                    <?php displayValue($_POST, 'email'); ?> />
                    <?php displayError($errors, 'email'); ?>
                    </div>  

                    <div class="form-group">  
                    <label>Confirm Email<span class="required-color">*</span></label>  
                    <input
                    type="text"
                    name="confirmemail" 
                    class="form-control" 
                    placeholder="Enter Email again"
                    <?php displayValue($_POST, 'confirmemail'); ?> />
                    <?php displayError($errors, 'confirmemail'); ?>
                    </div>  

                    <div class="form-group"> 
                    <label>Phone <span class="required-color">*</span></label>  
                    <span class = "ext">+61</span>
                    <input
                    type="text"
                    name="phone"
                    id = "phone" 
                    placeholder="Enter Phone Number starting with 4" 
                    <?php displayValue($_POST, 'phone'); ?> />
                    <?php displayError($errors, 'phone'); ?>
                    </div>
                    
                    <div class="form-group">
                    <label>Birth Year <span class="required-color">*</span></label>
                    <select
                    name="birthyear" >
                    <option name = "birthyear">Choose Year</option>
                    <?php for($i = date("Y"); $i >=date("Y")-110; $i--){
                                   echo '<option name = "birthyear" value="' . $i . '">' . $i . '</option>' . PHP_EOL;} ?>
                    </select>
                    <?php displayError($errors, 'birthyear'); ?>
                    </div>

                    <div class="form-group">  
                    <label>Student Status <span class="required-color">*</span></label>
                    <div class="radio">  
                              <input type="radio" id ="studying" name="studentStatus" value="true" 
                              <?php displayChecked($_POST, 'studentStatus', 'true'); ?> />
                              <label for="studying" class = "options">Studying</label>  
                         </div>  
                         <div class="radio">  
                              <input type="radio" id ="notStudying" name="studentStatus" value="false" 
                              <?php displayChecked($_POST, 'studentStatus', 'false'); ?>/>
                              <label for="notstudying"  class = "options">Not Studying</label>
                         </div>
                         <?php displayError($errors, 'studentStatus'); ?>
                    </div>  

                    <div class="form-group">  
                    <label>Employment Status <span class="required-color">*</span></label>
                    <div class="radio">  
                              <input type="radio" id ="employed" name="employmentStatus" value="employed" 
                              <?php displayChecked($_POST, 'employmentStatus', 'employed'); ?> />
                              <label for="employed"  class = "options">Employed</label>  
                         </div>  
                         <div class="radio">  
                              <input type="radio" id ="seeking" name="employmentStatus" value="seeking" 
                              <?php displayChecked($_POST, 'employmentStatus', 'seeking'); ?>
                              />
                              <label for="seeking"  class = "options">Seeking</label>
                         </div>
                         <div class="radio">  
                              <input type="radio" id ="other" name="employmentStatus" value="other" 
                              <?php displayChecked($_POST, 'employmentStatus', 'other'); ?>
                              />
                              <label for="other"  class = "options">Other</label>
                         </div>
                         <?php displayError($errors, 'employmentStatus'); ?>
                    </div>  
                    
                    <div class="form-group">  
                    <label>Password <span class="required-color">*</span></label>
                    <input 
                    type="password"
                    name="password" 
                    class="form-control"
                    placeholder="Enter a valid password." />
                    <?php displayError($errors, 'password'); ?>
                    </div> 

                    <!-- form submit -->

                    <div class="form-group" >  
                         <input type="submit" name="submit" value="Submit" id = "submit_button" class="btn btn-info" />  
                    </div>  
               </form>    
          </div>  
     </div> 
     <!-- calling the footer fragment here -->
     <?php require_once("includes/footer.php"); ?>
     </body>  
</html>  
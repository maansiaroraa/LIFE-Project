<?php require_once('functions.php'); 
require_once('database-functions.php');
?>
<?php
    $errors = [];
    if(isset($_POST['login'])) {
        $errors = loginUser($_POST);

        if(count($errors) === 0)
            redirect('myServices.php');
    }
?>
<!-- fragment for login form to be added to different pages -->
<div class="container" style = "margin-bottom: 50px">  
    <form method="post"> 
    <h4>Login</h4> 
        <div class="form-group">  
            <label>Email <span class="required-color">*</span></label>
            <input 
            type="text"
            name="email" 
            id = "email"
            class="form-control"
            placeholder="Registered Email Id"
            
            <?php displayValue($_POST, 'email'); ?> />
            <?php displayError($errors, 'email'); ?>
        </div>

        <div class="form-group">
            <label for="password">Password<span class="required-color">*</span></label>
            <input 
            type="password" 
            class="form-control" 
            id="password"
            name="password"
            placeholder="Registered password" />
            <?php displayError($errors, 'password'); ?>
        </div>

        <div class="form-group" >  
            <input type="submit" name="login" value="Login" id = "login_button"/>  
        </div> 
    </form>

    <p>Not a user? <a href = "registration.php">Register Now</a></p>
 
    </div>
<?php

require_once('database-functions.php');

// Constants.
const USER_SESSION_KEY = 'user';

// Always call session_start.
session_start();

// --- Utils ----------------------------------------------------------------------------------
function displayError($errors, $name) {
    if(isset($errors[$name]))
        echo "<div class='text-danger'>{$errors[$name]}</div>";
}

function displayValue($form, $name) {
    if(isset($form[$name]))
        echo 'value="' . htmlspecialchars($form[$name]) . '"';
}

function displayChecked($form, $name, $value) {
    if(isset($form[$name]) && $form[$name] === $value)
        echo 'checked';
}

function redirect($location) {
    header("Location: $location");
    exit();
}

function isUserLoggedIn() {
    return isset($_SESSION[USER_SESSION_KEY]);
}

function getLoggedInUser() {
    return isUserLoggedIn() ? $_SESSION[USER_SESSION_KEY] : null;
}

function loginUser($form) {
    $errors = [];

    
    $key = 'email';
    if(empty($form[$key]))  {  
        $errors[$key] = "<p>Please Enter Email</p>";  
    }  
    else  {  
        if(!filter_var(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $form[$key])))  {  
            $errors[$key] = "<p>Invalid Email formate</p>";  
        }  
    } 

    $key = 'password';
    if(empty($form[$key]))  {  
        $errors[$key] = "<p>Please enter your password.</p>";  }  
    else  {  
        if(!preg_match("/^[A-Z]\w*([-_]+)\w*[0-9]$/", $form[$key]))  {  
            $errors[$key] = "<p>Please enter a valid password which starts with a capital letter, ends with a number and has at least one _ or -</p>";  
        }
        if(strlen($form[$key]) <8)  {  
            $errors[$key] = "<p>Minimum length of password should be 8. </p>";  
        }  
    }
    if(count($errors) === 0) {
        $user = getUser($form['email']);

        if($user !== false && $form['password'] === $user['password'])
            // Set session variable to login user.
            $_SESSION[USER_SESSION_KEY] = $user;
        else
            $errors[$key] = 'Login failed, email and / or password incorrect. Please try again.';
    }
    return $errors;
}

function logoutUser() {
    // Unset all session variables.
    session_unset();
}

function registerUser($form) {
    $errors = [];


 //server-side validation code follows----------------------------------------------------------

    $key = 'firstname';
    if(empty($form[$key]))  {  
        $errors[$key] = "<p>Please enter your First Name.</p>";  }  
    else  {  
        if(!preg_match("/^[A-Z][a-z]*$/", $form[$key]))  {  
            $errors[$key] = "<p>Only letters allowed with capital first letter.</p>";  
                
               if(strlen($form[$key]) > 30)  {  
                $errors[$key] = "<p>Maximum length of first name <=30. </p>";  
               }  
            }  
        }  

    $key = 'lastname';
    if(empty($form[$key]))  {  
        $errors[$key] = "<p>Please enter your Last Name.</p>";  }  
    else  {  
        if(!preg_match("/^[A-Z][a-z]*$/", $form[$key]))  {  
            $errors[$key] = "<p>Only letters allowed with capital first letter.</p>";  
                
                if(strlen($form[$key]) > 30)  {  
                    $errors[$key] = "<p>Maximum length of first name <=30. </p>";  
                }
            }  
        }  

    $key = 'email';
    if(empty($form[$key]))  {  
        $errors[$key] = "<p>Please Enter Email</p>";  
    }  
    else  {  
        if(getUser($form[$key]) !== false)
        $errors[$key] = '<p>Email is already registered.</p>';
        
        if(!filter_var(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $form[$key])))  {  
            $errors[$key] = "<p>Invalid Email format.</p>";  
        }  
    } 

    $key = 'confirmemail';
    if(empty($form[$key]))  {  
        $errors[$key] = "<p>Please Enter Email again</p>";  
    }  
    else  {  
        if(strcmp($form[$key], $form['email']))  {  
            $errors[$key] = "<p>Email doesn't match the above field.</p>";  
        }  
    }

    $key = 'phone';
    if(empty($form[$key]))  {  
        $errors[$key] = "<p>Please enter your Phone Number.</p>";  }  
    else  {  
        if(!preg_match("/^4[0-9]{8}$/", $form[$key]))  {  
            $errors[$key] = "<p>Phone Number should start with 4 and have 9 digits</p>";   
        }  
    }  

    $key = 'birthyear';
    if(empty(strcmp($form[$key], "Choose Year")))  {  
        $errors[$key] = "<p>Please choose your birthyear.</p>";  }  
    else{
        if ($form[$key] >= 2007){
            $errors[$key] = "<p>Must be 16 years or old.</p>"; 
        }
    }

    $key = 'studentStatus';
    if(empty($form[$key]))  {  
        $errors[$key] = "<p>Please choose your preference</p>";  }  

    $key = 'employmentStatus';
    if(empty($form[$key]))  {  
        $errors[$key] = "<p>Please choose your preference</p>";  }  

    $key = 'password';
    if(empty($form[$key]))  {  
        $errors[$key] = "<p>Please enter your password.</p>";  }  
    else  {  
        if(!preg_match("/^[A-Z]\w*([-_]+)\w*[0-9]$/", $form[$key]))  {  
            $errors[$key] = "<p>Please enter a valid password which starts with a capital letter, ends with a number and has at least one _ or -</p>";  
        }
        if(strlen($form[$key]) <8)  {  
            $errors[$key] = "<p>Minimum length of password should be 8. </p>";  
        }  
    }
        
    if(count($errors) === 0) {
        // Add user.
        $user = [
            'firstname' => htmlspecialchars(trim($form['firstname'])),
            'lastname' => htmlspecialchars(trim($form['lastname'])),
            'email' => trim($form['email']),
            'confirmemail' => trim($form['confirmemail']),
            'phone' => htmlspecialchars(trim($form['phone'])),
            'birthyear' => $form['birthyear'],
            'studentStatus' => (int) filter_var($form['studentStatus'], FILTER_VALIDATE_BOOLEAN),
            'employmentStatus' => $form['employmentStatus'],
            'password' => $form['password']
        ];
        insertUser($user);

        // Auto-login the registered user.
        loginUser([
            'email' => $user['email'],
            'password' => $form['password']
        ]);
    }
    return $errors;
}

// --- Services -------------------------------------------------------------------------------
function recordActivity($email, $serviceID, $form) {
    $errors = [];

    $key = 'duration';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1, 'max_range' => 480]]) === false)
        $errors[$key] = 'Duration must be a whole number and not be less than 1 or greater than 480.';
    
    if(count($errors) === 0) {
        // Prepare activity data.
        $activity = [
            'email' => $email,
            'service_id' => $serviceID,
            'service_type' => $form['type'],
            'duration_minutes' => filter_var($form['duration'], FILTER_VALIDATE_INT)
        ];

        // Insert activity into database.
        insertActivity($activity);
    }

    return $errors;
}

function recordMeal($email, $mealID, $diet_type) {
    $errors = [];
    
    if(count($errors) === 0) {
        // Prepare activity data.
        $activity = [
            'email' => $email,
            'meal_id' => $mealID,
            'diet_type' => $diet_type,
        ];

        // Insert activity into database.
        insertMeal($activity);
    }

    return $errors;
}

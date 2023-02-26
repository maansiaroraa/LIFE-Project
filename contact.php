<!DOCTYPE html>
<html>
    <head>
      <title>Contact Us | LIFE</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="styles/contact.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.cdnfonts.com/css/gt-walsheim" rel="stylesheet">
    </head>

    <body>
        <div class = containernav>

          <!-------------------------------------------------------
            navigation panel with logo and other nav bar options
          ---------------------------------------------------------->
          <?php require_once("includes/navbar.php"); ?>

            <!-------------------------------
              conatct details on left side
            --------------------------------->
            <div class="container">
                <div class="content">
                  <div class="left-side">
                    <div class="address details">
                      <i class="fas fa-map-marker-alt"></i>
                      <div class="topic">Address</div>
                      <div class="text-one">Room 80.02.02</div>
                      <div class="text-two">RMIT University</div>
                    </div>
                    <div class="phone details">
                      <i class="fas fa-phone-alt"></i>
                      <div class="topic">Phone</div>
                      <div class="text-one">+61 466 123456</div>
                      <div class="text-two">+61 472 123456</div>
                    </div>
                    <div class="email details">
                      <i class="fas fa-envelope"></i>
                      <div class="topic">Email</div>
                      <div class="text-one">s3885529@student.rmit.edu.au</div>
                      <div class="text-two">s3874546@student.rmit.edu.au</div>
                    </div>
                  </div>
                  <div class="right-side">
                    <div class="topic-text">Send us a message</div>
                    <br>
                    <p>If you have any enquiry regarding our website do contact us via this form or other preferred communication options. It's our pleasure to help you.</p>
                    <br>

                    <!----------------------
                      Main contact us form
                    ------------------------>
                    <form id = "contact_form" onsubmit="return checkForm()" method = "post" action="submitted.php">
                    <div class="input-box">
                        <label for="">Name</label>
                        <input name = "fullname" id="fullname" type="text" placeholder="Enter your full name">
                        
                    </div>

                    <div class="input-box">
                        <label for="">Email</label>
                        <input name = "email" id = "email" type="email" placeholder="Enter your email">
                        
                      </div>

                    <div class="input-box message-box">
                        <label for="">Message</label>
                        <textarea name = "message" id = "message" placeholder="Enter your message"></textarea>
                       
                      </div>
                    <div class="button">
                    <button type = "submit" class = "button">Send</button>
                    </div>
                    
                  </form>
                </div>
                </div>
              </div>
        </div>
        
        <!-------
          Footer
        --------->
	      <?php require_once("includes/footer.php"); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src = "https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
    </body>
</html>
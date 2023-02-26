<!DOCTYPE html>
<html>
    <head>
      <title>Services | LIFE</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <link rel="stylesheet" type="text/css" href="styles/index.css">
      <link rel="stylesheet" type="text/css" href="styles/service.css">
      <link rel="stylesheet" href="styles/swiper-bundle.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.cdnfonts.com/css/gt-walsheim" rel="stylesheet">
    </head>

    <body>
      <!-- OLD SERVICE PAGE - BRIEF OF ALL THE SERVICES - myServices is different now -->
      <div class = containernav>
        <!-- call navbar here  -->
	      <?php require_once("includes/navbar.php"); ?>

        <section>
          <div class="row">
            <div class="main">
              <h3>Be the Fitter you by adding a little Yoga to the routine </h3>
              <p class = "para1">Get Unlimited HD Live streaming Online yoga classes in Melbourne and Victoria with experienced Yoga Teacher giving traditional way instructions on how to do</p>
              <a href="myServices.php"><button>Explore More</button></a>
                
            </div>
              
            <div class="yoga-right">
              <img src = "assets/images/yogastandingpng.png" class = "img" alt="lady performing standing yoga pose">
            </div>
          </div>
          <div class="arrow bounce">
            <a class="fa fa-arrow-down fa-2x" href="#toscroll"></a>
          </div>
        </section>
  
      </div>

        <!---------------------------------------------------
              Yoga service videos example
        ---------------------------------------------------->
        <section>
            <div class="rt-container">
              <div class="col-rt-12">
                <div class="Scriptcontent">
                  
                  <!-- different color background-->
                  <div class="bg" id ="toscroll">
                  <!-- different services on our website text-->
                    <div class="servicesBrief" >
                      <h2>Enjoy a wide range of activities to choose from</h2>
                      <p>For learning to be healthy from the inside out, with our "quality over quantity” approach, we have curated tons of health and wellness programs involving yoga, meditaion, stretching, healthy balanced diet and more. Let LIFE help you train successfully.</p>
                    </div>
                    <div class="yoga-videos">
                      <div class="video1">
                        <video controls width="350" height="300" autoplay muted>
                            <source src="assets/videos/video1.mp4" type="video/mp4" alt="yoga poses video one">
                      </div>
                      <div class="video2">
                        <video controls width="350" height="300" muted>
                            <source src="assets/videos/video2.mp4" type="video/mp4" alt="yoga poses video two">
                      </div>
                      <div class="video3">
                        <video controls width="350" height="300" muted>
                            <source src="assets/videos/video3.mp4" type="video/mp4" alt="yoga poses video three">
                      </div>
                      </div>
                    </div>
                </div>
            </div>
          </section>

          <!----------------------------------------
            Meditation section with image and text
          ------------------------------------------>
        <section>
            <div class="section2" id = "section2">
                <div class="text2">
                    <h3>Breath in, Breath out, Repeat! </h3>
                    <p>Just Sit. Easy enough, right? For a moment, just be still, close your eyes and breathe. Sway with the breeze. Let the distractions of the day fade away.
                    <br> Feel better already?
                    <br> Imagine doing this daily with LIFE  start or end every day with 15-20 minutes meditating with over 300+ audios to choose from. Check out one such audio without signup!
                    <br><br>
                    <audio controls>
                        <source src="assets/videos/meditation.mp3" type="audio/mpeg" alt="meditation audio example">
                        Audio tag is not supported in this browser.
                      </audio>
                </p>
                </div>
                
                <div class="img2">
                    <img src = "assets/images/oldmanmeditating.png" class = "mockupImg" alt="man meditating">
                </div>
            </div>   
        </section>

        <!---------------------------
          Stretching Service section 
        ----------------------------->
        <section>
            <div class="bg2" id = "stretching">
            <div class="row2">
                <div class="stretching-right">
                    <div class="yoga-videos">
                        <div class="video1">
                            <video controls width="343" height="608" autoplay muted loop>
                              <source src="assets/videos/stretching.mp4" type="video/mp4" alt="woman stretching">
                        </div>
                    </div>
                  </div>
              <div class="main2">
                <h3>Try out stretching flat on your back... </h3>
                <p class = "para2">Be sure to not stretch a blanket over your body in this act or you might meditate down to sleep. And we don't want that just yet!
                    <br>So let's just increase our flexibility, improve our posture, and get that blood flowing to those muscles for now.
                    <br>Explore more such amazing content on our website.
                </p>
              </div>
            </div>
        </div>
          </section>

        <!-----------------------
          Healthy Eating section
        -------------------------->
          <section>
            <div class="containernav">
            <div class="row3">
              <div class="main3">
                <h3>Being healthy & fit isn't a Fad or a Trend, It's a Lifestyle.</h3>
                <p class = "para3">Hop on to eating healthy by using our healthy meal planner to eat accroding to your calorie requirements, to become a healty you, for A Better YOU!</p>
                <a href="myServices.php"><button>Explore More</button></a>
              </div>
              
              <div class="meal-right">
                <img src = "assets/images/meal.png" class = "img" alt="confused lady with apple and cupcake in both hands">
              </div>
            </div>
            </div>
          </section>
         
        <!-------------------
          Footer
        ----------------------->
	      <?php require_once("includes/footer.php"); ?>
  
        <script src="js/service.js"></script>
    </body>
    </html>
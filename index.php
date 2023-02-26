<!DOCTYPE html>
<html>
    <head>
      <title>LIFE</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css'>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css'><link rel="stylesheet" href="./style.css">

      <link rel="stylesheet" type="text/css" href="styles/index.css">
      <link rel="stylesheet" href="styles/swiper-bundle.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.cdnfonts.com/css/gt-walsheim" rel="stylesheet">
    </head>

    <body>
      <div class = containernav>
        <!-------------------------------------------------------
          calling navbar here -  fragment file
        ---------------------------------------------------------->
	      <?php require_once("includes/navbar.php"); ?>
        
        <!-----------------------------------------------------------------
          main landing screen with welcome text and image, register button
        -------------------------------------------------------------------->
        <section>
          <div class="row">
            <div class="main">
              <h3>A fit body, a calm mind, a sphere full of love!</h3>
              <p class = "para1">Inspiring yoga, stretching, meditaion, and a bunch of health foods to feel connected, grounded and energized day after day with LIFE.</p>
              <P class = "para2">Who? A better YOU!</P>
              <a href = "registration.php"><button>Register Now</button></a>
            </div>
            
            <div class="right">
              <img src = "assets/images/project.png" class="mainImg" alt = "main image two acai bowl with two spoons">
            </div>
          </div>
        </section>
      </div>

        <!----------------------------------------------------------------------------
        slick slider using jquery - had a prime card and when clicked, a card overlay,
        for demo same overlay card is being used
      -------------------------------------------------------------------------------->
        <section>
          <div class="page" data-modal-state="closed">
          
            <div class="cardcontainer">
              <div class="servicesBrief" >
                <h2>Enjoy a wide range of activities to choose from</h2>
                <p>For learning to be healthy from the inside out, with our "quality over quantity” approach, we have curated tons of health and wellness programs involving yoga, meditaion, stretching, healthy balanced diet and more. Let LIFE help you train successfully.</p>
              </div>
              <div class="card-slider">
                <div class="card-wrapper"><article class="card">
                  <picture class="card__background">
                    <img src = "assets/images/yoga.jpg">
                  </picture>
                  <div class="card__category">
                    Yoga
                  </div>
                  <div class="card__duration">
                  Skill in Action
                  </div>
                  </article>
                </div>

                <div class="card-wrapper"><article class="card">
                  <picture class="card__background">
                    <img src="assets/images/meditation.jpg">
                  </picture>
                  <div class="card__category">
                    Meditation
                  </div>
                  <div class="card__duration">
                    Encounter Serenity
                  </div>
                  </article>
                </div>
                <div class="card-wrapper"><article class="card">
                  <picture class="card__background">
                    <img src="assets/images/stretching.jpg">
                  </picture>
                  <div class="card__category">
                    Stretching
                  </div>
                  <div class="card__duration">
                    Finding Stability
                  </div>
                  </article>
                </div>
                <div class="card-wrapper"><article class="card">
                  <picture class="card__background">
                    <img src="assets/images/food.png">
                  </picture>
                  <div class="card__category">
                    Healthy Habits
                  </div>
                  <div class="card__duration">
                    Better Ingredients
                  </div>
                  </article>
                </div>
              </div>
            </div>
            
            <div class="cardoverlay"></div>
              <div class="modal-wrapper">
                <div class="modal">
                  <button class="modal__close-button" type="button">
                    <i class="fa fa-close"><use xlink:href="#icon-cross"></use></i>
                  </button>
                  <div class="modal__scroll-area">
                    <header class="modal__header">
                      <div class="card__background">
                        <img src="assets/images/yoga.jpg">
                      </div>
                
                      <h1 class="card__title">Yoga</h1>
                      <div class="card__duration">
                        Skill in Action
                      </div>
                    </header>
                    <main class="modal__content">
                      <p>It’s time to roll out your yoga mat and discover the combination of physical and mental exercises that for thousands of years
                        have hooked yoga practitioners around the globe. The beauty of yoga is that you don’t have to be a yogi or yogini to reap the benefits.
                          Whether you are young or old, overweight or fit, yoga has the power to calm the mind and strengthen the body.
                          Don’t be intimidated by yoga terminology, fancy yoga studios and complicated poses. Yoga is for everyone.</p>
                    </main>
                  </div>

                <div class="modal">
                  <button class="modal__close-button" type="button">
                  <i class="fa fa-close"><use xlink:href="#icon-cross"></use></i>
                  </button>
                </div>
              </div>

            </div>
          </section>

        <!---------------------------------------------
           prototype section - different devices 
          --------------------------------------------->
        <section>
          <div class="rt-container">
            <div class="col-rt-12">
              <div class="Scriptcontent">
                <div class="hero">  
                  <div class="arrow_container">
                    <a href="#toscroll2">
                      <div class="chevron"></div>
                      <div class="chevron"></div>
                      <div class="chevron"></div></a>
                  </div>
                </div>

                <div class="section2" id ="toscroll2">
                  <div class="text2">
                    <h3>Experience in-person energy from the comfort of your home!</h3>
                    <p>Join our global commnunity for convinient classes that fit your schedule on devices that you like. Sign up for stress-relieving flows, motivating workouts and mindful meditation along with healthy food plans when you need that extra push.</p>
                  </div>
                  
                  <div class="img2">
                    <img src = "assets/images/mockup.png" class = "mockupImg" alt="display of LIFE website on laptop screen and mobile">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      

            <!-------------------------------
              swiper - summary statistic section
            --------------------------------->
        <section>
          <div class="sumContainer">
            <div class="sumBrief">
              <h2>Count the ways you can personalize your practice</h2>
            </div>
            <div class="bgHalf">
              <div class="slide-sum">
                <div class="card-wrapper2 swiper-wrapper">
                  <div class="card2 swiper-slide">
                    <div class="ima">
                      <img src = "assets/images/sample.png" alt = "circle with number 4 written inside">
                    </div>
                    <div class="details">
                      <p class = "headings">Services</p>
                      <p>to keep your mind and body relaxed or deepen your practice.</p>
                    </div>
                  </div>

                  <div class="card2 swiper-slide">
                    <div class="ima">
                      <img src = "assets/images/sample2.png" alt = "circle with number 15 plus written inside">
                    </div>
                    <div class="details">
                      <p class = "headings">Programs</p>
                      <p>created for beginner, intermediate, and advanced practices.</p>
                    </div>
                  </div>

                  <div class="card2 swiper-slide">
                    <div class="ima">
                      <img src = "assets/images/sample3.png" alt = "circle with number 2 to 30 written inside">
                    </div>
                    <div class="details">
                      <p class = "headings">Minute Sessions</p>
                      <p>to get you on your mat with whatever time you have.</p>
                    </div>
                  </div>

                  <div class="card2 swiper-slide">
                    <div class="ima">
                      <img src = "assets/images/sample4.png" alt = "circle with number 3 plus written inside">
                    </div>
                    <div class="details">
                      <p class = "headings">Device Flexibility</p>
                      <p>to help you practice through mobile, laptop or tablet.</p>
                    </div>
                  </div>

                  <div class="card2 swiper-slide">
                    <div class="ima">
                      <img src = "assets/images/sample5.png" alt = "circle with number 4 plus written inside">
                    </div>
                    <div class="details">
                      <p class = "headings">Meal Planner Options</p>
                      <p>to satisfy the cravings and and not sacrifice the health.</p>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </section>

        <!----------------------------
         calling footer fragment here
        ------------------------------>
	      <?php require_once("includes/footer.php"); ?>

    <script src="plugins/js/swiper-bundle.min.js"></script>
    <script src="plugins/js/web-animations.min.js"></script>
    <script src="plugins/js/smooth-scrollbar.js"></script>
    <script src="plugins/js/jquery.min.js"></script>
    <script src="plugins/js/slick.min.js"></script>
    <script src="js/index.js"></script>

  </body>
</html>


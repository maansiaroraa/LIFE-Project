jQuery('.card-slider').slick({
  slidesToShow:2,
  autoplay: true,
  slidesToScroll:1,
  dots: false,
  responsive:[
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

let cards = document.querySelectorAll('.card');
let card;
let modal = document.querySelector('.modal');
let closeButton = document.querySelector('.modal__close-button');
let page = document.querySelector('.page');
const cardBorderRadius = 20;
const openingDuration = 600; //ms
const closingDuration = 600; //ms
const timingFunction = 'cubic-bezier(.76,.01,.65,1.38)';

var Scrollbar = window.Scrollbar;
Scrollbar.init(document.querySelector('.modal__scroll-area'));


function flipAnimation(first, last, options) {
  let firstRect = first.getBoundingClientRect();
  let lastRect = last.getBoundingClientRect();
  
  let deltas = {
    top: firstRect.top - lastRect.top,
    left: firstRect.left - lastRect.left,
    width: firstRect.width / lastRect.width,
    height: firstRect.height / lastRect.height
  };
  
  return last.animate([{
    transformOrigin: 'top left',
    borderRadius:`
    ${cardBorderRadius/deltas.width}px / ${cardBorderRadius/deltas.height}px`,
    transform: `
      translate(${deltas.left}px, ${deltas.top}px) 
      scale(${deltas.width}, ${deltas.height})
    `
  },{
    transformOrigin: 'top left',
    transform: 'none',
    borderRadius: `${cardBorderRadius}px`
  }],options);
}

cards.forEach((item)=>{
  item.addEventListener('click',(e)=>{
    jQuery('.card-slider').slick('slickPause');
    card = e.currentTarget;
    page.dataset.modalState = 'opening';
    card.classList.add('card--opened');
    card.style.opacity = 0;
    document.querySelector('body').classList.add('no-scroll');

    let animation = flipAnimation(card,modal,{
      duration: openingDuration,
      easing: timingFunction,
      fill:'both'
    });

    animation.onfinish = ()=>{
      page.dataset.modalState = 'open';
      animation.cancel();
    };
  });
});

closeButton.addEventListener('click',(e)=>{
  page.dataset.modalState = 'closing';
  document.querySelector('body').classList.remove('no-scroll');
  
  let animation = flipAnimation(card,modal,{
    duration: closingDuration,
    easing: timingFunction,
    direction: 'reverse',
    fill:'both'
  });

  animation.onfinish = ()=>{
    page.dataset.modalState = 'closed';
    card.style.opacity = 1;
    card.classList.remove('card--opened');
    jQuery('.card-slider').slick('slickPlay');
    animation.cancel();
  };
});


// home page slide show on mobile view - responsive component
var swiper = new Swiper(".slide-container", {
  slidesPerView: 4,
  spaceBetween: 25,
  sliderPerGroup: 4,
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1000: {
      slidesPerView: 4,
    },
  },
});

// slide show for the summary section
var swiper = new Swiper(".slide-sum", {
  slidesPerView: 5,
  spaceBetween: 0,
  sliderPerGroup: 5,
  loopFillGroupWithBlank: true,
  loop: false,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  autoplay: {
    delay: 4000,
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
      
    },
    520: {
      slidesPerView: 2,
    
    },
    768: {
      slidesPerView: 3,
      
    },
    1000: {
      slidesPerView: 5,
    },
  },
});
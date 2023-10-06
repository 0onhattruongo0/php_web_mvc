
var elem = document.querySelectorAll(".em__header-navLink");
elem.forEach(function (t) {
  t.addEventListener("mouseover", function () {
    t.classList.remove("is-outHover"),
      t.classList.add("is-onHover")
  }),
    t.addEventListener("mouseout",
      function () {
        t.classList.remove("is-onHover"), t.classList.add("is-outHover")
      })
});
document.getElementById("emDrawerButton").addEventListener('click', function () {
  document.getElementById("menu-drawer").classList.toggle("open");
  document.getElementById("emDrawerButton").classList.toggle("changeIcon")
})



var scrollAnimationClass = 'mt';
var scrollAnimationShowClass = 'is-show';
var triggerMarginDefault = 300;
var scrollAnimationElm = document.querySelectorAll('.' + scrollAnimationClass);
var scrollAnimationFunc = function () {
  var dataMargin = scrollAnimationClass + '_margin';
  var dataTrigger = scrollAnimationClass + '_trigger';
  var dataDelay = scrollAnimationClass + '_delay';
  for (var i = 0; i < scrollAnimationElm.length; i++) {
    var triggerMargin = triggerMarginDefault;
    var elm = scrollAnimationElm[i];
    var showPos = 0;
    if (elm.dataset[dataMargin] != null) {
      
      triggerMargin = parseInt(elm.dataset[dataMargin]);
    }
    if (elm.dataset[dataTrigger]) {
      showPos = document.querySelector(elm.dataset[dataTrigger]).getBoundingClientRect().top + triggerMargin;
    } else {
      showPos = elm.getBoundingClientRect().top + triggerMargin;
    }
    // showPos = elm.getBoundingClientRect().top + triggerMargin;
    if (window.innerHeight > showPos) {
      var delay = (elm.dataset[dataDelay]) ? elm.dataset[dataDelay] : 0;
      setTimeout(function (index) {
        scrollAnimationElm[index].classList.add(scrollAnimationShowClass);
      }.bind(null, i), delay);
    }
    // if (window.innerHeight > showPos) {
    //   var delay = (elm.dataset[dataDelay]) ? elm.dataset[dataDelay] : 0;
    //   setTimeout(
    //     elm.classList.add(scrollAnimationShowClass)
    //   , delay);
    // }
  }
}
window.addEventListener('load', scrollAnimationFunc);
window.addEventListener('scroll', scrollAnimationFunc);

var image = document.getElementsByClassName('js-imagePatallax');
new simpleParallax(image, {
  delay: .6,
  transition: 'cubic-bezier(0,0,0,1)'
});



var header = document.getElementById('em__header');
function scrollDetect() {
  var lastScroll = 0;

  window.onscroll = function () {
    let currentScroll = document.documentElement.scrollTop || document.body.scrollTop; // Get Current Scroll Value

    if (currentScroll > 0 && lastScroll <= currentScroll) {
      lastScroll = currentScroll;
      hide()
    }
    else if (currentScroll <= 0) {
      lastScroll = currentScroll;
    }
    else {
      lastScroll = currentScroll;
      reveal()
    }
  };
}
function hide() {
  header.classList.add('section-header-hidden', 'section-header-sticky');
}
function reveal() {
  header.classList.add('section-header-sticky', 'animate');
  header.classList.remove('section-header-hidden');
}
function reset() {
  header.classList.remove('section-header-hidden', 'section-header-sticky', 'animate');
}

scrollDetect();




var flag, check;
function switchByWidth(){
var movie_src = document.getElementById('movie_src');
var pc_url = "./video/video01.mp4";
var sp_url = "./video/video01sp.mp4";
if (window.matchMedia('(max-width: 767px)').matches && flag !== 'sp') {
movie_src.setAttribute('src', sp_url);
flag = 'sp';
} else if (window.matchMedia('(min-width:768px)').matches && flag !=='pc') {
movie_src.setAttribute('src', pc_url);
flag = 'pc'
}
if(check !== flag) {
setTimeout(playMovie, 1000);
check = flag;
}
}
function playMovie(){
var movie = document.getElementById('movie');
movie.load();
movie.play();
}
window.onload = switchByWidth;
window.onresize = switchByWidth;



var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);



var player;
function onYouTubeIframeAPIReady() {
    if (window.matchMedia('(max-width: 767px)').matches) {
        var vid = 'lZOcd70jm4w';
    }else {
        var vid = 'LSRQbme_TeI';
    }
    player = new YT.Player('emYoutube', {
        videoId: vid,
        playerVars: {
            rel: 0,
        }
    });
}


let movieContent = document.getElementById('movieModalContent');
function movieStart() {
  movieContent.classList.add("is-open");
  player.playVideo();
}
let movieButton = document.getElementById('movieModalButton');
movieButton.onclick = movieStart;

function movieStop() {
  player.stopVideo();
  player.clearVideo();
  movieContent.classList.remove("is-open");
}
let movieClose = document.getElementById('movieModalClose');
movieClose.onclick = movieStop;






// $(document).ready(function () {
//   $('.em__homeMv').slick({
//     dots: true,
//     infinite: true,
//     speed: 500,
//     fade: true,
//     cssEase: 'linear',
//     autoplay: true,
//     autoplaySpeed: 3000,
//     arrows: false,
//     loop: true
//   });
// });
// $(document).ready(function () {
//   $('.em-homeProduct__visualWrap').slick({
//     dots: false,
//     infinite: true,
//     speed: 15000,
//     autoplay: true,
//     autoplaySpeed: 0,
//     arrows: false,
//     loop: true,
//     touchMove:false,
//     slidesToShow: 1.8,
//     cssEase: 'linear',
//     responsive: [
//       {
//         breakpoint: 1900,
//         settings: {
//           slidesToShow: 1,
//         }
//       },
//     ]
//   });
// });



// Swiper
const mvSwiper = document.querySelectorAll('.js-homeMvSwipe');
for (let i = 0; i < mvSwiper.length; i++) {
    const flowSwiper = new Swiper(mvSwiper[i], {
        loop: true, 
        speed: 2500,
        effect: 'fade', 
        slidesPerView: '1', 
        loopedSlides: 3,
        allowTouchMove: false, 
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.js-homeMvSwipe__dots',
            type: 'bullets',
            clickable: true
        }
    });
}

const flowSwipers = document.querySelectorAll('.js-flowSwiper');
for (let i = 0; i < flowSwipers.length; i++) {
    const flowSwiper = new Swiper(flowSwipers[i], {
        loop: true, // ループ有効
        slidesPerView: 'auto', // 一度に表示する枚数
        loopedSlides: 3,
        speed: 15000, // ループの時間
        allowTouchMove: false, // スワイプ無効
        autoplay: {
            delay: 1000, // 途切れなくループ
            disableOnInteraction: false
        },
    });
}

const flowSwiperGoldChains = document.querySelectorAll('.js-flowSwiperGoldChain');
for (let i = 0; i < flowSwiperGoldChains.length; i++) {
    const flowSwiperGoldChain = new Swiper(flowSwiperGoldChains[i], {
        loop: true, // ループ有効
        slidesPerView: 'auto', // 一度に表示する枚数
        loopedSlides: 3,
        speed: 20000, // ループの時間
        allowTouchMove: false, // スワイプ無効
        autoplay: {
            delay: 0, // 途切れなくループ
            disableOnInteraction: false,
            reverseDirection: false
        },
        breakpoints: {
            768: {
                autoplay: {
                    reverseDirection: true
                },
            },
        },
    });
}
const flowSwiperChains = document.querySelectorAll('.js-flowSwiperChain');
for (let i = 0; i < flowSwiperChains.length; i++) {
    const flowSwiperChain = new Swiper(flowSwiperChains[i], {
        loop: true, // ループ有効
        slidesPerView: 'auto', // 一度に表示する枚数
        loopedSlides: 3,
        speed: 20000, // ループの時間s
        allowTouchMove: false, // スワイプ無効
        autoplay: {
            delay: 0, // 途切れなくループ
            disableOnInteraction: false
        },
    });
}

const flowStylingSwipers = document.querySelectorAll('.js-flowSwiperStyling');
for (let i = 0; i < flowStylingSwipers.length; i++) {
    const flowStylingSwiper = new Swiper(flowStylingSwipers[i], {
        loop: true, // ループ有効
        slidesPerView: 'auto', // 一度に表示する枚数
        loopedSlides: 3,
        speed: 18000, // ループの時間
        allowTouchMove: false, // スワイプ無効
        autoplay: {
            delay: 0, // 途切れなくループ
            disableOnInteraction: false
        },
    });
}


const flowBannerSwipers = document.querySelectorAll('.js-flowBannerSwiper');
for (let i = 0; i < flowBannerSwipers.length; i++) {
    const flowBannerSwiper = new Swiper(flowBannerSwipers[i], {
        loop: true, // ループ有効
        slidesPerView: 'auto', // 一度に表示する枚数
        loopedSlides: 3,
        speed: 13000, // ループの時間
        allowTouchMove: false, // スワイプ無効
        autoplay: {
            delay: 0, // 途切れなくループ
            disableOnInteraction: false
        },
    });
}

const productItemSwipers = document.querySelectorAll('.js-productItemSwiper');
for (let i = 0; i < productItemSwipers.length; i++) {
    const productItemSwiper = new Swiper(productItemSwipers[i], {
        loop: true, // ループ有効
        speed: 1000,
        autoplay: {
            delay: 5000,
            stopOnLastSlide: false,
            disableOnInteraction: false,
            reverseDirection: false
        },
        effect: 'fade',
        pagination: {
            el: '.js-productItemSwiper__dots',
            type: 'bullets',
            clickable: true
        },navigation: {
            nextEl: '.js-productItemSwiper__next',
            prevEl: '.js-productItemSwiper__prev'
        },
        allowTouchMove: false
    });
}


let productButton = document.getElementById('productModalButton');
let productContent = document.getElementById('productModalContent');
let productClose = document.getElementById('productModalClose');
let productScroll = document.getElementById('productModalScroll');
let body_01= document.getElementById('body');
var clientHeight;
var scrollHeight;
const ms = 400;
productButton.addEventListener('click', () => {
    productContent.style.opacity = 0;
    productContent.style.transition = "opacity " + ms + "ms";
    productContent.style.display = "block";
    setTimeout(function(){productContent.style.opacity = 1;}, 1);
    body_01.classList.add('hiden')
    //ScrollNext
    clientHeight = productContent.clientHeight;
    
    scrollHeight = productContent.scrollHeight;
    
});
productClose.addEventListener('click', () => {
    productContent.style.opacity = 1;
    productContent.style.transition = "opacity " + ms + "ms";
    setTimeout(function(){productContent.style.opacity = 0;}, 1);
    setTimeout(function(){productContent.style.display = "none";}, ms + 10);
    body_01.classList.remove('hiden')
});
//Scroll Next

productContent.onscroll = function() {
  // console.log(this.scrollTop)
  // console.log(scrollHeight - (clientHeight + this.scrollTop))
    if (scrollHeight - (clientHeight + this.scrollTop) == 0) {
        productScroll.classList.add('is-hide');
    }else {
        productScroll.classList.remove('is-hide');
    }
};
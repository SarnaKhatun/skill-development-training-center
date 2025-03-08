

// alert("hello")



$('.testimonial-active').slick({
    infinite: true,
    speed: 1000,
    centerMode: true,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll: 4,
    autoplaySpeed: 4000,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
            centerMode: false,
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          centerMode: false,
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 600,
        settings: {
          centerMode: false,
          slidesToShow: 1,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: false,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });



  //fixed navbar function
  let header = document.getElementById("header");

  window.addEventListener("scroll", function(){

    if(document.body.scrollTop > 350 || document.documentElement.scrollTop > 350 ){
      header.classList.add("header-fixed")
    }else{
      header.classList.remove("header-fixed")
    }
  })



// scroll to top button
document.addEventListener("DOMContentLoaded", function() {

    let scrollTOTopBtn = document.querySelector('.scroll-top')

    window.addEventListener("scroll", function() {
      // Show or hide the button based on the scroll position
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollTOTopBtn.classList.add("open");
      } else {
        scrollTOTopBtn.classList.remove("open");
      }
    });

    scrollToTopBtn.addEventListener("click", function() {
      // Scroll to the top with smooth animation
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    });
  });



  // course details page tab

  document.addEventListener("DOMContentLoaded", function () {

    var defaultTabId = "tab1";
    document.getElementById(defaultTabId).style.display = "block";
    document
      .querySelector("[onclick=\"openTab('" + defaultTabId + "')\"]")
      .classList.add("active");
  });

  function openTab(tabId) {

    var tabContents = document.getElementsByClassName("tab-content");
    for (var i = 0; i < tabContents.length; i++) {
      tabContents[i].style.display = "none";
    }


    var tabs = document.getElementsByClassName("tab");
    for (var i = 0; i < tabs.length; i++) {
      tabs[i].classList.remove("active");
    }


    document.getElementById(tabId).style.display = "block";


    document
      .querySelector("[onclick=\"openTab('" + tabId + "')\"]")
      .classList.add("active");
  }


// gallery page slider

// $('.gallery-slider').slick({
//   infinite: true,
//   speed: 1000,
//   centerMode: false,
//   autoplay: true,
//   slidesToShow: 3,
//   slidesToScroll: 4,
//   autoplaySpeed: 4000,
//
//   responsive: [
//     {
//       breakpoint: 1100,
//       settings: {
//           centerMode: false,
//         slidesToShow: 3,
//         slidesToScroll: 3,
//         infinite: true,
//         dots: true,
//         autoplay: true,
//       }
//     },
//     {
//       breakpoint: 768,
//       settings: {
//         centerMode: false,
//         slidesToShow: 2,
//         slidesToScroll: 2,
//         autoplay: true
//       }
//     },
//     {
//       breakpoint: 600,
//       settings: {
//         centerMode: false,
//         slidesToShow: 1,
//         slidesToScroll: 2,
//         autoplay: true
//       }
//     },
//     {
//       breakpoint: 480,
//       settings: {
//         centerMode: false,
//         slidesToShow: 1,
//         slidesToScroll: 1
//       }
//     }
//   ]
// });


// video modal open when click the icon

  // JavaScript code to handle modal opening and closing
  document.getElementById('openVideoBtn').addEventListener('click', function() {
    document.getElementById('videoModal').classList.remove('hidden');
  });

  document.getElementById('closeVideoBtn').addEventListener('click', function() {
    document.getElementById('videoModal').classList.add('hidden');
  });



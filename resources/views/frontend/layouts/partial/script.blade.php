<script
type="text/javascript"
src="//code.jquery.com/jquery-1.11.0.min.js"
></script>
<script src="{{ asset('frontend/js/waypoint.js') }}"></script>
<script
type="text/javascript"
src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
></script>
<script type="text/javascript" src="{{ asset('frontend/js/slick.min.js') }}"></script>

<script src="{{ asset('frontend/js/jquery.rcounter.js') }}"></script>
<script src="{{ asset('frontend/tailwind.config.js') }}"></script>
<!-- main js file -->
<script src="{{ asset('frontend/js/app.js') }}"></script>

<script>
// mobile menu show and hide
document.addEventListener("DOMContentLoaded", function () {
  var mobileMenu = document.getElementById("mobileMenu");
  var toggleMobileMenu = document.getElementById("toggleMobileMenu");
  var menuIcon = document.getElementById("menuIcon");

  toggleMobileMenu.addEventListener("click", function () {
    mobileMenu.classList.toggle("-translate-x-full");

    if (mobileMenu.classList.contains("-translate-x-full")) {
      menuIcon.className = "fas fa-bars";
    } else {
      menuIcon.className = "fas fa-xmark";
    }
  });
});

// login modal open JS
document.addEventListener("DOMContentLoaded", function () {
  const overlay = document.getElementById("login-overlay");
  const overlay2 = document.getElementById("login-overlay");
  const openOverlayBtn = document.getElementById("openOverlayBtn");
  const closeOverlayBtn = document.getElementById("closeOverlayBtn");

  openOverlayBtn.addEventListener("click", function () {
    overlay.style.display = "flex";
    document.body.classList.add("no-scroll");
    console.log("click ne");
  });
  openOverlayBtn2.addEventListener("click", function () {
    overlay.style.display = "flex";
    document.body.classList.add("no-scroll");
    console.log("click ne");
  });

  closeOverlayBtn.addEventListener("click", function () {
    overlay.style.display = "none";
    document.body.classList.remove("no-scroll");
  });
});

//admission overlary
document.addEventListener("DOMContentLoaded", function () {
  const overlay = document.getElementById("admission-overlay");
  const overlayContent = overlay.querySelector('.overlay-content');
  const admissionBtn = document.getElementById("admissionBtn").querySelector("button");
  const admissionCloseOverlayBtn = document.getElementById("admissionCloseOverlayBtn");

  admissionBtn.addEventListener("click", function () {
      overlay.classList.remove("hidden");
      setTimeout(() => {
          overlay.classList.add("opacity-100");
          overlayContent.classList.remove("scale-95");
          overlayContent.classList.add("scale-100");
      }, 10); // Delay to allow the class removal to be noticed
      document.body.classList.add("overflow-hidden");
      console.log("Admission button clicked");
  });

 admissionBtn2.addEventListener("click", function () {
    overlay.style.display = "flex";
    document.body.classList.add("no-scroll");
    console.log("click ne");
  });
  
  admissionCloseOverlayBtn.addEventListener("click", function () {
      overlay.classList.remove("opacity-100");
      overlayContent.classList.remove("scale-100");
      overlayContent.classList.add("scale-95");
      setTimeout(() => {
          overlay.classList.add("hidden");
      }, 300); // Match this with the duration of the transition
      document.body.classList.remove("overflow-hidden");
  });
});

//result overlary
document.addEventListener("DOMContentLoaded", function () {
  const overlay = document.getElementById("result-overlay");
  const overlayContent = overlay.querySelector('.result-content');
  const resultBtn = document.getElementById("resultBtn").querySelector("button");
  const resultOverlayBtn = document.getElementById("resultOverlayBtn");

  resultBtn.addEventListener("click", function () {
      overlay.classList.remove("hidden");
      setTimeout(() => {
          overlay.classList.add("opacity-100");
          overlayContent.classList.remove("scale-95");
          overlayContent.classList.add("scale-100");
      }, 10);
      document.body.classList.add("overflow-hidden");
      console.log("liza");
  });

  resultBtn2.addEventListener("click", function () {
    overlay.style.display = "flex";
    document.body.classList.add("no-scroll");
    console.log("click ne");
  });

  resultOverlayBtn.addEventListener("click", function () {
      overlay.classList.remove("opacity-100");
      overlayContent.classList.remove("scale-100");
      overlayContent.classList.add("scale-95");
      setTimeout(() => {
          overlay.classList.add("hidden");
      }, 300);
      document.body.classList.remove("overflow-hidden");
  });
});

// counter function
$(".count-num").rCounter({
  duration: 30,
});
</script>
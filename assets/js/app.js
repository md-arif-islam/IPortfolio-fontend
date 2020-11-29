// -------------Loader----------------
$(window).on("load", function () {
  $(".loader_container").fadeOut(1000);
});

var typed = new Typed("#typed", {
  strings: ["Web Designer", "Web Developer", "Freelancer", "Photographer"],
  typeSpeed: 50,
  backSpeed: 50,
  loop: true,
  backDelay: 2000,
});

AOS.init({
  duration: 1000,
  easing: "ease-in-out-back",
});

// Owl Carousel
$(document).ready(function () {
  /* ------------------Dinamic Color----------------
  -------------------------------------------------- */
  $("#blue").click(function (e) {
    e.preventDefault();
    $("#style").attr("href", "./assets/css/blue.css");
  });
  $("#pink").click(function (e) {
    e.preventDefault();
    $("#style").attr("href", "./assets/css/pink.css");
  });
  $("#orange").click(function (e) {
    e.preventDefault();
    $("#style").attr("href", "./assets/css/orange.css");
  });

  /* ------------------ Toogle Button ----------------
  -------------------------------------------------- */

  $("#toogle_btn").click(function () {
    $(".header").toggleClass("active-toggle");
    $(".footer").toggleClass("active-toggle");
  });

  var navButton = $(".header .header_nav .nav-menu li a");

  navButton.click(function () {
    navButton.removeClass("active");
    $(this).addClass("active");

    $(".header").removeClass("active-toggle");
    $(".footer").removeClass("active-toggle");
  });

  /* ------------------Window scroll nav active change ----------------
  -------------------------------------------------- */
  $(document).on("scroll", onScroll);
  function onScroll(event) {
    var scrollPos = $(document).scrollTop() + 30;
    $(".header .header_nav .nav-menu li a").each(function () {
      var currLink = $(this);
      var refElement = $(currLink.attr("href"));
      if (
        refElement.position().top <= scrollPos &&
        refElement.position().top + refElement.height() > scrollPos
      ) {
        $(".header .header_nav .nav-menu li a").removeClass("active");
        currLink.addClass("active");
      } else {
        currLink.removeClass("active");
      }
    });
  }
  /* ------------------Icotop ----------------
  -------------------------------------------------- */
  var $btns = $(".portfolio_buttons_group li");

  $btns.click(function (e) {
    $(".portfolio_buttons_group li").removeClass("active");
    e.target.classList.add("active");

    let selector = $(e.target).attr("data-filter");
    $(".grid").isotope({
      filter: selector,
    });

    return false;
  });

  /* ------------------Counter ----------------
  -------------------------------------------------- */
  $(".counter-up").counterUp({
    delay: 10,
    time: 2000,
  });

  $(".testimonial_carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      900: {
        items: 3,
      },
    },
  });

  /* ------------------ Magnific Popup  ----------------
  -------------------------------------------------- */

  $(".test-popup-link").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });

  /* ------------------ Contact Form Message  ----------------
  -------------------------------------------------- */

  $("#sendMsg").on("click", function () {
    var name = $("#name").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }

    if (
      name != "" &&
      subject != "" &&
      message != "" &&
      isEmail(email) === true
    ) {
      $.post(
        "contact_core.php",
        {
          name: name,
          email: email,
          subject: subject,
          message: message,
        },
        function (response) {
          if (response == "Message sent successfully...") {
            $("#contectForm").hide();
          }
          $("#result").html(response);
        }
      );
      return false;
    } else {
      return;
    }
  });
});

/* ------------------ Map  ----------------
  -------------------------------------------------- */
var map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: {
      lat: 25.62527415,
      lng: 88.63735199,
    },
    zoom: 8,
  });
}

// Back To Top
jQuery(".back-to-top").click(function () {
  jQuery("body,html").animate(
    {
      scrollTop: 0,
    },
    600
  );
});
jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() > 150) {
    jQuery(".back-to-top").addClass("visible");
  } else {
    jQuery(".back-to-top").removeClass("visible");
  }
});

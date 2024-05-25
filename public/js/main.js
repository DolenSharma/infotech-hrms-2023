(function ($) {
  "use strict";

  // Sticky Navbar
  $(window).scroll(function () {
      if ($(this).scrollTop() > 40) {
          $('.navbar').addClass('sticky-top');
      } else {
          $('.navbar').removeClass('sticky-top');
      }
  });
  
  // Dropdown on mouse hover
  $(document).ready(function () {
      function toggleNavbarMethod() {
          if ($(window).width() > 992) {
              $('.navbar .dropdown').on('mouseover', function () {
                  $('.dropdown-toggle', this).trigger('click');
              }).on('mouseout', function () {
                  $('.dropdown-toggle', this).trigger('click').blur();
              });
          } else {
              $('.navbar .dropdown').off('mouseover').off('mouseout');
          }
      }
      toggleNavbarMethod();
      $(window).resize(toggleNavbarMethod);
  });
  
  
  // Back to top button
  $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
          $('.back-to-top').fadeIn('slow');
      } else {
          $('.back-to-top').fadeOut('slow');
      }
  });
  $('.back-to-top').click(function () {
      $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
      return false;
  });


  // Testimonials carousel
  $(".testimonial-carousel").owlCarousel({
      autoplay: true,
      smartSpeed: 1000,
      items: 1,
      dots: false,
      loop: true,
      nav : true,
      navText : [
          '<i class="bi bi-arrow-left"></i>',
          '<i class="bi bi-arrow-right"></i>'
      ],
  });
// query for contact form
  $(document).ready(function() {
      $('#myForm').submit(function(event) {
        event.preventDefault(); // prevent default form submission behavior
    
        // send form data using AJAX
        $.ajax({
          url: 'save.php',
          type: 'post',
          data: $('#myForm').serialize(),
          success: function(response) {
            // handle success response
            console.log(response);
          },
          error: function(xhr, status, error) {
            // handle error response
            console.log(xhr.responseText);
          }
        });
      });
    });
})(jQuery);




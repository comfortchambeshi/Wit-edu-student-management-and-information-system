 $(document).ready(function () {

     // script for sticky navigation //
     $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('nav').addClass('fixed-header');
        } else {
            $('nav').removeClass('fixed-header');
        }
    });

    /* scrollTop() >= 100
       Should be equal the the height of the header
     */
     
     //script for smooth scrolling
     jQuery(document).ready(function ($) {
         $(".scroll ").click(function (event) {
             event.preventDefault();

             $('html,body').animate({
                 scrollTop: $(this.hash).offset().top
             }, 1000);
         });
     });
     //script  for  ease
     $(document).ready(function () {
         /*
          var defaults = {
         	 containerID: 'toTop', // fading element id
         	 containerHoverID: 'toTopHover', // fading element hover id
         	 scrollSpeed: 1200,
         	 easingType: 'linear' 
          };
          */

         $().UItoTop({
             easingType: 'easeOutQuart'
         });

     });
 });
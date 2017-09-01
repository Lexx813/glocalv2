$(function() {
 $(document).click(function(event) {
 $(".navbar-collapse").collapse("hide");
    });
 });

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
  $('.navbar-toggle:visible').click();
});

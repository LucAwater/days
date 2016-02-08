jQuery(document).ready(function($) {

  var checkbox = $('.week input[type="checkbox"]');

  checkbox.on( 'click', function() {
    var parent = $(this).parent('.week');

    parent.toggleClass('print-hide');
  });

});
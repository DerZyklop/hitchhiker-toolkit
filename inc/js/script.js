function removeToggleClass(that,className) {
  jQuery(that).parent().find('.'+className).removeClass(className);
  jQuery(that).toggleClass(className);
}

jQuery(document).ready(function(){
  jQuery('.form-elements .form-element').click( function () {
    removeToggleClass(this,'active');
    var identifier = jQuery(this).attr('id');
    jQuery(this).closest('section').find('input').attr( 'value', identifier );
  });
/*
  jQuery('.selection .more').click( function () {
    jQuery(this).parent().parent().toggleClass('showall');
    jQuery(this).parent().parent().find('.hidden-items').slideToggle(500);
  });
*/
/*
  var statusIsActive = false;
  jQuery('.nav').click( function () {
    if (statusIsActive) {
      jQuery(this).find('.other').slideUp();
      statusIsActive = false;
    } else {
      jQuery(this).find('.other').slideDown();
      statusIsActive = true;
    }
    //jQuery(this).parent().parent().find('.hidden-items').slideToggle(500);
  });
*/
  
  var statusIsActive = false;
  var inProgress = false;
  jQuery('.current').click( function () {
    if (inProgress === false) {
      inProgress = true;
      if (statusIsActive) {
        jQuery(this).parent().parent().parent().find('.other').slideUp(function () {
          inProgress = false;
        });
        statusIsActive = false;
      } else {
        jQuery(this).parent().parent().parent().find('.other').slideDown(function () {
          inProgress = false;
        });
        statusIsActive = true;
      }
      jQuery('#bg-overlay').fadeToggle(500);
    }
  });
  jQuery('#bg-overlay').click( function () {
    if (inProgress === false) {
      inProgress = true;
      jQuery(this).parent().parent().parent().find('.other').slideUp();
      jQuery('#bg-overlay').fadeToggle(500, function () {
        inProgress = false;
      });
      statusIsActive = false;
    }
  });
  jQuery('#geo-reload').click( function () {
    jQuery(this).toggleClass('active');
  });
});
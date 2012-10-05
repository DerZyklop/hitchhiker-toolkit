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
  jQuery('.current').click( function () {
    if (statusIsActive) {
      jQuery(this).parent().parent().parent().find('.other').slideUp();
      statusIsActive = false;
    } else {
      jQuery(this).parent().parent().parent().find('.other').slideDown();
      statusIsActive = true;
    }
    jQuery('#bg-overlay').fadeToggle(500);
  });
  jQuery('#geo-reload').click( function () {
    jQuery(this).toggleClass('active');
  });
});
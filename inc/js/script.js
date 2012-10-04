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
  jQuery('.selection .more').click( function () {
    jQuery(this).parent().parent().toggleClass('showall');
    jQuery(this).parent().parent().find('.hidden-items').slideToggle(500);
  });
});

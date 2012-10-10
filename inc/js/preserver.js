jQuery(document).ready(function(){

  var identifier = [];

  jQuery('.form-elements .form-element').click( function () {
    removeToggleClass(this,'active');
    if (jQuery(this).parent('.form-elements').attr('id') === 'color') {
      identifier.color = jQuery(this).attr('id');
      jQuery(this).closest('section').find('input').attr( 'value', identifier.color );
    } else {
      identifier.manufacturer = jQuery(this).attr('id');
      jQuery(this).closest('section').find('input').attr( 'value', identifier.manufacturer );
    }
  });

  jQuery('#preserver_submit').click(function () {
    jQuery.ajax({
        url: 'inc/ajax/preserver-safe.php',
        type: "POST",
        data: ({
          username: readCookie('username'),
          current_location: jQuery('#from_location').val(),
          color: identifier.color,
          manufacturer: identifier.manufacturer
        }),
        fail: function () {
          alert('foo');
        },
        success: function(data){
            jQuery("#preserver_submit").html(data);
        }
    });
  });

});
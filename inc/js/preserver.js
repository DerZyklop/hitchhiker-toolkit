function setPreserverButtonStatus() {
    if (
      readCookie('username') != '' &&
      readCookie('username') != undefined &&
      !(
        ( 
          jQuery('#color').attr('value') === '' || 
          jQuery('#color').attr('value') === undefined 
        )
        &&
        ( 
        jQuery('#manufacturer').attr('value') === '' || 
        jQuery('#manufacturer').attr('value') === undefined
        )
        &&
        ( 
        jQuery('#from_location').attr('value') === '' || 
        jQuery('#from_location').attr('value') === undefined
        )
        &&
        ( 
        jQuery('#additional_notes').val() === '' || 
        jQuery('#additional_notes').val() === undefined
        )
      )
    ) {
      setButtonStatus(true)
    } else {
      setButtonStatus(false);
    }

}

jQuery(document).ready(function(){

  var identifier = [];

  jQuery('.form-elements .form-element').click( function () {
    removeToggleClass(this,'active');
    if (jQuery(this).parent('.form-elements').attr('id') === 'color_selection') {
      identifier.color = jQuery(this).attr('id');
      jQuery(this).closest('section').find('input').attr( 'value', identifier.color );
    } else {
      identifier.manufacturer = jQuery(this).attr('id');
      jQuery(this).closest('section').find('input').attr( 'value', identifier.manufacturer );
    }
    setPreserverButtonStatus();
  });

  jQuery('form').keyup( function () {
    setPreserverButtonStatus();
  });

  jQuery('#preserver_submit').click(function () {
    if ( readCookie('store_to_db') === 'true' ) {
      jQuery.ajax({
          url: 'inc/ajax/preserver-safe.php',
          type: "POST",
          data: ({
            username: readCookie('username'),
            current_location: jQuery('#from_location').val(),
            color: identifier.color,
            manufacturer: identifier.manufacturer,
            additional_notes: jQuery('#additional_notes').html()
          }),
          fail: function () {
            alert('foo');
          },
          success: function(data){
            jQuery("#preserver_submit").html(data+'<div class="right" id="store-data-btn">\
            <a href="#" class="nolink">\
              <img src="inc/img/icon/refresh-arrows.png" alt="" />\
            </a>\
          </div>');
            start_Int('#store-data-btn');
            jQuery('#preserver_submit').attr('disabled', 'disabled');
            setTimeout(function () {
              stop_Int('#store-data-btn');
              if ( readCookie('send_mail') === 'true' ) {
                jQuery('form').submit();
              } else {
                jQuery("#preserver_submit").html('Done!');                
              }
            }, 3000)
        }
      });
    }
  });
});
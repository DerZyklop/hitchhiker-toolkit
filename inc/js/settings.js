

jQuery(document).ready(function(){

	var identifier = [];

  function safeSettings() {
  	identifier.username = jQuery('#username').val();
	  createCookie('username',identifier.username,14);
  	//eraseCookie('username');
  	//readCookie('username');
  
  	identifier.from_location = jQuery('#from_location').val();
  	createCookie('from_location',identifier.from_location,14);
  
  	identifier.to_location = jQuery('#to_location').val();
  	createCookie('to_location',identifier.to_location,14);


  	if ( jQuery('#send_mail').attr("checked") == "checked" ) {
  		identifier.send_mail = true;
  	} else {
  		identifier.send_mail = false;
  	}
  	createCookie('send_mail',identifier.send_mail,14);
  
  	identifier.contact_person = jQuery('#contact_person').val();
  	createCookie('contact_person',identifier.contact_person,14);
  
  	if ( jQuery('#store_to_db').attr("checked") == "checked" ) {
  		identifier.store_to_db = true;
  	} else {
  		identifier.store_to_db = false;
  	}
  	createCookie('store_to_db',identifier.store_to_db,14);
  
    jQuery.ajax({
        url: 'inc/ajax/settings-safe.php',
        type: "POST",
        data: ({
			username: jQuery('#username').val(),
			from_location: jQuery('#from_location').val(),
			to_location: jQuery('#to_location').val(),
			send_mail: identifier.send_mail,
			contact_person: jQuery('#contact_person').val(),
			store_to_db: identifier.store_to_db
        }),
        fail: function () {
          alert('foo');
        },
        success: function(data){
            jQuery("#settings_safe_submit").attr('value',data);
        }
    });
  }

  jQuery('#settings_safe_submit').click(function(){
    safeSettings();
  });
  jQuery('#settings-btn').click(function(){
    safeSettings();
  });


});
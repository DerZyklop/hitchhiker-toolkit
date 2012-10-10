function createCookie(name,value,days) {
	if ( readCookie(name) === value ) {
		//alert('"'+name+' is allready set to: "'+readCookie(name)+'"')
	} else {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
		//alert('Created '+name+': "'+readCookie(name)+'"')
	}
}
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}


var intval="";
function start_Int(selector){
    if(intval===""){
        var angle = 0;
        intval=window.setInterval(function(){
            angle+=10;
            jQuery(selector).find('img').rotate(angle);
        },25);
    }else{
      stop_Int();
    }
}
function stop_Int(selector){
    var el = jQuery(selector).find('img');
    var tr = el.css("-webkit-transform") ||
             el.css("-moz-transform") ||
             el.css("-ms-transform") ||
             el.css("-o-transform") ||
             el.css("transform") ||
             "FAIL";

    var values = tr.split('(')[1].split(')')[0].split(',');
    var a = values[0];
    var b = values[1];
    var c = values[2];
    var d = values[3];

    var scale = Math.sqrt(a*a + b*b);
    
    // arc sin, convert from radians to degrees, round
    var sin = b/scale;
    // next line works for 30deg but not 130deg (returns 50);
    // var angle = Math.round(Math.asin(sin) * (180/Math.PI));
    var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
    
    jQuery(selector).find('img').rotate({ angle: angle, animateTo:180 });

    if(intval!==""){
        window.clearInterval(intval);
        intval="";
        /*
        jQuery('#geo-reload').find('img').rotate({ animateTo:720 });
        */
    }
}


function removeToggleClass(that,className) {
  jQuery(that).parent().find('.'+className).removeClass(className);
  jQuery(that).toggleClass(className);
}

jQuery(document).ready(function(){
  jQuery('.nolink').click(function(event){
    event.preventDefault();
  });


	function llCallbackFunktion(position) {
	    var latitude = position.coords.latitude;
	    var longitude = position.coords.longitude;
	    var lat = parseFloat(latitude);
	    var lon = parseFloat(longitude);
	    //jQuery("#geo-load").html('Wait a second...');
	    jQuery('#location-load-btn').parent().find(':input').val('Wait a second...');
	    jQuery('#location-load-btn').parent().find(':input').css('color','#999');
	
	    jQuery.ajax({
	        url: 'inc/ajax/location-load.php',
	        type: "POST",
	        data: ({lat: lat, lon: lon}),
	        success: function(data){
	            jQuery("#from_location").attr('value',data);
		        jQuery('#location-load-btn').parent().find(':input').css('color','');
	            stop_Int('#location-load-btn');
	            jQuery('.results .essentials').click( function () {
	                /*
	                var mapId = jQuery(this).parent().find('.map_canvas').attr('id');
	                var lat = jQuery(this).parent().find('.map_canvas').attr('lat');
	                var lon = jQuery(this).parent().find('.map_canvas').attr('lon');
	                initializeMap(lon,lat,mapId);
	                */
	                jQuery(this).parent().find('.details').slideToggle(200);
	                jQuery(this).parent('.result').toggleClass('active');
	            });
	        }
	    });
	}

    jQuery('#location-load-btn').click(function(){
        start_Int('#location-load-btn');
        navigator.geolocation.getCurrentPosition(llCallbackFunktion);
    });


  /* Nav [BEGIN] */
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
  /* Nav [END] */

});
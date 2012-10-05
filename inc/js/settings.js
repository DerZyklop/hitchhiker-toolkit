jQuery(document).ready(function(){
    function callbackFunktion(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var lat = parseFloat(latitude);
        var lon = parseFloat(longitude);
        //jQuery("#geo-load").html('Wait a second...');

        jQuery.ajax({
            url: 'inc/php/location-load.php',
            type: "POST",
            data: ({lat: lat, lon: lon}),
            success: function(data){
                jQuery("#from-location").attr('value',data);
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

    jQuery('#location-load-btn').click(function(){
        start_Int('#location-load-btn');
        navigator.geolocation.getCurrentPosition(callbackFunktion);
    });

});
jQuery(document).ready(function(){
    function initializeMap(lon,lat,map_id) {
        var myLatlon = new google.maps.LatLng(lat, lon);
        var myOptions = {
          center: myLatlon,
          zoom: 8,
          streetViewControl: 0,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById(map_id),myOptions);
        var marker = new google.maps.Marker({
          position: myLatlon,
          map: map,
          title:"Hello World!"
        });
    }

    jQuery("#geo-reload").click(function(){
      start_Int('#geo-reload');
      navigator.geolocation.getCurrentPosition(function (position) {
        callbackFunktion(position);
        ajaxGeo('spotload.php', '#ajax_output', '#geo-reload')
      });
    });

});
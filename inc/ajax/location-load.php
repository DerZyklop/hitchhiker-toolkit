<?php
require_once('geo.php');
?>

<?php 
    $count = 10;
    $viewed_spots = 0;
    for ($i = $viewed_spots; $i < $count; $i++) {
        foreach ($suggested_ids as $item) {
            if ($item['id']==$all_suggested_places[$i]['id']) {
                $all_suggested_places[$i]['distance'] = round($item['distance'], 0).'KM';
            }
        }
    }
    if ($all_suggested_places[0]['location']['locality'] == NULL) {
      echo($all_suggested_places[1]['location']['locality']);
    } else {
      echo($all_suggested_places[0]['location']['locality']);
    }
?>

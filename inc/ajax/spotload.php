<?php
require_once('geo.php');
?>

<div class="results">
<?php 
    $count = 10;
    $viewed_spots = 0;
    for ($i = $viewed_spots; $i < $count; $i++) {
        foreach ($suggested_ids as $item) {
            if ($item['id']==$all_suggested_places[$i]['id']) {
                $all_suggested_places[$i]['distance'] = round($item['distance'], 0).'KM';
            }
        }
        echo template::georesult( $all_suggested_places[$i] );

    }
?>
</div>
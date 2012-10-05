<?php
$all_german_places = json_decode( file_get_contents('http://hitchwiki.org/devmaps/api/?continent=EU'), true );

// Calculate the distance between two spots on earth
function distance($lat1, $lng1, $lat2, $lng2, $miles = false)
{
    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lng1 *= $pi80;
    $lat2 *= $pi80;
    $lng2 *= $pi80;

    $r = 6372.797; // mean radius of Earth in km
    $dlat = $lat2 - $lat1;
    $dlng = $lng2 - $lng1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;

    return ($miles ? ($km * 0.621371192) : $km);
}

// Add the distance to the array of spot-id's
$i = 0;
foreach ($all_german_places as $item) {
    $suggested_ids[$i]['id'] = $item['id'];
    $suggested_ids[$i]['distance'] = distance($_POST['lat'], $_POST['lon'], $item['lat'], $item['lon']);

    $i++;
}


// Compare the distance
function compare($a, $b)
{
    if ($a['distance'] == $b['distance']) {
        return 0;
    }
    return ($a['distance'] < $b['distance']) ? -1 : 1;
}

// Sort the suggested IDs
usort($suggested_ids, 'compare');

// Limit the suggested IDs
array_splice($suggested_ids,10);

foreach ($suggested_ids as $key => $value) {
    if ($value['distance']!=0) {
        $request='http://hitchwiki.org/devmaps/api/?place='.$value['id'].'';
        $jsondata = file_get_contents($request);
        $suggested_place = json_decode($jsondata, true);
        $all_suggested_places[] = $suggested_place;
    }
}
require_once('class.template.php');
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

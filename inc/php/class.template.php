<?php 

/*
.---------------------------------------------------------------------------.
|     Admin: Nils Neumann (mail@der-zyklop.de)                              |
'---------------------------------------------------------------------------'
*/

class template {
	function template_load($template_filename){
		return file_get_contents('inc/templates/'.$template_filename.'.html');
	}
	function marker_replace($marker, $template_filename){
		if ( !empty($marker) && !empty($template_filename) ) {
			$template_path = '../templates/'.$template_filename.'.html';
			$template = file_get_contents($template_path);
			return str_replace(array_keys($marker),$marker,$template);
		}
	}


	function georesult($item){
	    if( $item['waiting_stats']['avg'] != NULL ){ 
	        $item['waiting_stats']['avg'] = 'Wait-Ø: '.$item['waiting_stats']['avg'].'min';
	    };
        if ($item['comments']==NULL) {
            $item['comments'] = 'No comment jet';
        };
        if ($item['location']['locality']==NULL) {
            $item['location']['locality'] = 'No-Name-Spot<br /><span style="color: #777; font-size:20px; line-height: 1em !important;">(sry! We\'re working on that)</span>';
        };
        switch ($item['rating']) {
            case 0:
                $item['rating_stars'] = '
                    <img class="left" src="inc/img/star.png" alt="" />
                    <img class="left" src="inc/img/star.png" alt="" />
                    <img class="left" src="inc/img/star.png" alt="" />
                    <img class="left" src="inc/img/star.png" alt="" />
                    <img class="left" src="inc/img/star.png" alt="" />
                ';
                break;
            case 5:
                $item['rating_stars'] = '
                    <span class="left active">
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <div class="clearit"></div>
                    </span>
                    <img class="left" src="inc/img/star.png" alt="" />
                    <img class="left" src="inc/img/star.png" alt="" />
                    <img class="left" src="inc/img/star.png" alt="" />
                    <img class="left" src="inc/img/star.png" alt="" />
                ';
                break;
            case 4:
                $item['rating_stars'] = '
                    <span class="left active">
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <div class="clearit"></div>
                    </span>
                    <img class="left" src="inc/img/star.png" alt="" />
                    <img class="left" src="inc/img/star.png" alt="" />
                    <img class="left" src="inc/img/star.png" alt="" />
                ';
                break;
            case 3:
                $item['rating_stars'] = '
                    <span class="left active">
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <div class="clearit"></div>
                    </span>
                    <img class="left" src="inc/img/star.png" alt="" />
                    <img class="left" src="inc/img/star.png" alt="" />
                ';
                break;
            case 2:
                $item['rating_stars'] = '
                    <span class="left active">
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <div class="clearit"></div>
                    </span>
                    <img class="left" src="inc/img/star.png" alt="" />
                ';
                break;
            case 1:
                $item['rating_stars'] = '
                    <span class="left active">
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <img class="left" src="inc/img/star_active.png" alt="" />
                        <div class="clearit"></div>
                    </span>
                ';
                break;
        };
		$marker = array(
		    '###LOCATION_LOCALITY###'=>$item['location']['locality'],
		    '###RATING_STARS###'=>$item['rating_stars'],
		    '###RATING###'=>$item['rating'],
		    '###DISTANCE###'=>$item['distance'],
		    '###ELEVATION###'=>$item['elevation'],
		    '###RATING_COUNT###'=>$item['rating_stats']['rating_count'],
		    '###WAITING_STATS_AVG###'=>$item['waiting_stats']['avg'],
		    '###WAITING_STATS_AVG_TEXTUAL###'=>$item['waiting_stats']['avg_textual'],
		    '###WAITING_STATS_COUNT###'=>$item['waiting_stats']['count'],
		    '###DESCRIPTION_EN_UK_DESCRIPTION###'=>$item['description']['en_UK']['description'],
		    '###COMMENTS###'=>$item['comments'],
		    '###LAT###'=>$item['lat'],
		    '###LON###'=>$item['lon'],
		    '###LINK###'=>$item['link']
		);
		return self::marker_replace($marker,'georesult');
	}
};
?>
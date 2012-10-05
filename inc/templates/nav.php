<div class="top-bar">
    <div class="nav width-wrap">
        <div class="nav-items" <?php if ($reload_btn == true) { echo('style="width: 83%; float: left;"'); }else { echo('width="100%"'); } ?>>
            <div class="current">
                <div class="nav-item">
                    <?php 
                        switch ( $site_name ) {
                            case 'spotsearch':
                                echo('<span class="icon-map-marker"></span>SpotSearch');
                                break;
                            case 'imfine':
                                echo('<span class="icon-ok"></span>I\'m fine');
                                break;
                            case 'more':
                                echo('<span class="icon-info-sign"></span>About');
                                break;
                            case 'imprint':
                                echo('<span class="icon-info-sign"></span>Imprint');
                                break;
                            default:
                                echo('<span class="icon-daumen-highlight"></span>HitchhikerToolkit');
                        }
                     ?>
                     <span class="icon-list right"></span>
                </div>
            </div>
        </div>
        <?php if ($reload_btn == true): ?>
        <div id="geo-reload" class="right">
            <a class="load img-wrap"><img src="inc/img/icon/refresh-arrows.png" alt="load" /></a>
        </div>
        <?php endif; ?>
        <div class="clearit"></div>
        <div class="other">
            <div class="nav-item">
                <a href="spotsearch.php"><span class="icon-map-marker"></span>SpotSearch</a>
            </div>
            <div class="nav-item">
                <a href="fine.php"><span class="icon-ok"></span>I'm fine</a>
            </div>
            <div class="nav-item">
                <a href="more.php"><span class="icon-info-sign"></span>About</a>
            </div>
        </div>
    </div>
</div>
<div id="bg-overlay"></div>
<!--
<div class="header nav">
  <div class="left"><</div>
  <h1 class="center">
    <?php 
      switch ($site_name) {
        case 'index';
          echo('Hitchhiker Tool');
      }
     ?>
  </h1>
  <div class="right">></div>
</div>
-->
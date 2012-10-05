<?php 
$site_name = 'spotsearch'; 
$reload_btn = true;
include('inc/templates/head.phtml');
?>
<script type="text/javascript" src="inc/js/jQueryRotateCompressed.js"></script>
<script type="text/javascript" src="inc/js/spotsearch-ck.js"></script>
<div id="ajax_output">
  <div class="page-wrap-inner">
    <h3>Load Spots</h3>
    <p>Don't know where to start your hitchhiker-tour? Try the blue Button on top, it'll search the best nearby-hitchhiker-spots for you.</p>
  </div>
</div>

<?php include('inc/templates/footer.html'); ?>
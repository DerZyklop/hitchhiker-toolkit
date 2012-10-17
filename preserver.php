<?php 
$site_name = 'preserver';
include('inc/templates/head.phtml');

?>

<script type="text/javascript" src="inc/js/jQueryRotateCompressed.js"></script>
<script type="text/javascript" src="inc/js/preserver.js"></script>

<div class="page-wrap-inner">
  <form action="mail.php" method="post">
    <section>
      <h3>Color</h3>
      <div class="form-elements elements-4" id="color_selection">
        <div class="form-element" id="color-1">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="color-2">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="color-3">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="color-4">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="color-5">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="color-6">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="color-7">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="color-8">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="color-9">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="color-10">
        </div>
        <div class="form-element" id="color-11">
        </div>
        <div class="form-element" id="color-12">
        </div>
  <!--        <div class="form-element more-btn">+</div>-->
        <div class="clearit"></div>
        <input type="hidden" value="" name="color" id="color" />
      </div>
    </section>
  
    <section>
      <h3>Manufacturer</h3>
      <div class="form-elements elements-4" id="manufacturer_selection">
        <div class="form-element" id="manufacturer-1">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-2">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-3">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-4">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-5">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-6">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-7">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-8">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-9">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-10">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-11">
          <div class="form-element-inner"></div>
        </div>
        <div class="form-element" id="manufacturer-12">
        </div>
  <!--        <div class="form-element more-btn">+</div>-->
        <div class="clearit"></div>
        <input type="hidden" value="" name="manufacturer" id="manufacturer" />
      </div>
    </section>
    <section>
      <div class="input-with-btn">
        <label for="from_location">I am here:</label>
        <div class="clearfix">
          <input type="text" name="from_location" id="from_location" value="<?php echo $_COOKIE['from_location'] ?>" />
          <div class="btn" id="location-load-btn">
            <a href="#" class="nolink">
              <img src="inc/img/icon/refresh-arrows.png" alt="" />
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="inner">
      <label for="additional_notes">Additional Notes:</label>
      <textarea name="additional_notes" id="additional_notes"></textarea>
    </section>
    <section>
      <p>
        <label>Ready?</label>
        <button type="submit" class="nolink" id="preserver_submit" disabled>
        <?php 
          if ($_COOKIE['send_mail']!='true' && $_COOKIE['store_to_db']!='true') {
            echo('Please check your Settings');
          } elseif ( $_COOKIE['send_mail']=='true' && $_COOKIE['store_to_db']!='true' ) { 
              echo('Send mail'); 
          } elseif ( $_COOKIE['send_mail']=='true' && $_COOKIE['store_to_db']=='true' ) {
            echo('Send mail'); 
            echo(' and ');
            echo('store data');
          } elseif ( $_COOKIE['send_mail']!='true' && $_COOKIE['store_to_db']=='true' ) {
            echo('Store data');
          }
        ?>
        </button>
<!--
        <input type="reset" class="btn">Clear</button>
-->
      </p>
    </section>
  </form>
</div>
<?php include('inc/templates/footer.phtml') ?>
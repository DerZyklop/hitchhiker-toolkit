<?php $site = 'imprint'; ?>

<?php include('inc/templates/head.phtml'); ?>
<script type="text/javascript" src="inc/js/jQueryRotateCompressed.js"></script>
<script type="text/javascript" src="inc/js/settings-ck.js"></script>
<section class="page-wrap-inner">
    <h2>Settings</h2>
    <section>
      <div class="input-with-btn">
        <label for="from-location">I am here:</label>
        <div class="clearfix">
          <input type="text" name="from-location" id="from-location" />
          <div class="btn" id="location-load-btn">
            <a href="#" class="no-link">
              <img src="inc/img/icon/refresh-arrows.png" alt="" />
            </a>
          </div>
        </div>
      </div>
    </section>
    <section>
      <p>
        <label for="to-location">I want to get there:</label>
        <input type="text" name="to" id="to-location" />
      </p>
    </section>
</section>
<?php include('inc/templates/footer.html'); ?>
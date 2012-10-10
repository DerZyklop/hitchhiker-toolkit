<?php $site = 'imprint'; ?>

<?php include('inc/templates/head.phtml'); ?>
<script type="text/javascript" src="inc/js/jQueryRotateCompressed.js"></script>
<script type="text/javascript" src="inc/js/settings.js"></script>
<section class="page-wrap-inner">
    <h2>Settings</h2>
    <section>
      <p>
        <label for="username">Username (no whitespace, special-chars etc.):</label>
        <input type="text" name="username" id="username" value="<?php echo $_COOKIE['username'] ?>" />
      </p>
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
      <p>
        <label for="to_location">I want to get there:</label>
        <input type="text" name="to_location" id="to_location" value="<?php echo $_COOKIE['to_location'] ?>" />
      </p>
      <p>
        <input type="checkbox" name="send_mail" id="send_mail" <?php if ( $_COOKIE['send_mail'] == 'true' ) {
        	echo('checked');
        } ?> />
        <label for="send_mail">Send Mail</label>
      </p>
      <p>
        <label for="contact_person">Contact-Person (Email-Adress)</label>
        <input type="text" name="contact_person" id="contact_person" value="<?php echo $_COOKIE['contact_person'] ?>" />
      </p>
      <p>
        <input type="checkbox" name="store_to_db" id="store_to_db" <?php if ( $_COOKIE['store_to_db'] == 'true' ) {
        	echo('checked');
        } ?> />
        <label for="store_to_db">Store Tour-Data to Database</label>
      </p>
    </section>
    <section>
      <p>
        <input class="btn nolink" type="submit" id="settings_safe_submit" value="Safe to database" />
      </p>
    </section>
</section>
<?php include('inc/templates/footer.phtml'); ?>
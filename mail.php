<?php 
require_once('inc/php/config.php');
$recipent_adress = 'inyo@gmx.de';
$site_name = 'preserver';
include('inc/templates/head.phtml');
?>
<section class="page-wrap-inner">
<?php
if ($_POST['send'] != true) {
?>
  <form action="mail.php" method="post">
    <div class="box">
      <h3>Email </h3>
      <p><?php if ($_POST['color']==false && $_POST['manufacturer']==false) {
        echo( 'Hm... not that much information, but i\'m happy to hear, that you\'re sitting in a');
      } else {
        echo('Ok, great!<br />You\'re sitting in a ');
        echo( getSpeakingName($_POST['color']) );
      } 
      echo(' ');
      if ($_POST['manufacturer']==false) {
          echo( 'car' );
      } else {
          echo( getSpeakingName($_POST['manufacturer']) );
        } ?>.
      </p>
      <p>Should i send this message?</p>
      <blockquote>
        <p>
          Hi there!
        </p>
        <p>
          i'm <?php 
          if ( isset( $_POST['from_location'] ) && $_POST['from_location']!=false ) {
              echo( 'at ' ); 
              echo( $_POST['from_location'].' ' ); 
          } ?>sitting in a <?php 
          if ( isset( $_POST['color'] ) && $_POST['color']!=false ) {
              echo( getSpeakingName($_POST['color']) ); 
          } ?> <?php 
          if ( isset($_POST['manufacturer']) && $_POST['manufacturer']!=false ) {
              echo(getSpeakingName($_POST['manufacturer'])); 
          } else {
              echo('car'); 
          }
          ?> now.
        </p>
        <p>
          <?php 
          if ( isset($_POST['additional_notes']) && $_POST['additional_notes']!=false ) {
              echo('Additional Notes: '); 
              echo($_POST['additional_notes']); 
          }
          ?>
        </p>
        <p>
          I just wanted to let you know so you are not worried about me.
        </p>
        <p>
        This is a generated mail from the Hitchtool (zyklop.pisces.uberspace.de/dev/hitchhiker/) -> A awsome mobile toolkit for hitchhikers.
        </p>
      </blockquote>
    </div>
    <div class="box">
      <p>
        <input type="hidden" name="color" value="<?php echo($_POST['color']) ?>" />
        <input type="hidden" name="manufacturer" value="<?php echo($_POST['manufacturer']) ?>" />
        <input type="hidden" name="send" value="true" />
        <input class="btn nolink" type="submit" id="preserver_mail_submit" <?php 
            if ($_COOKIE['contact_person']) {
              echo('value="Send to '.$_COOKIE['contact_person'].'"');
            } else {
              echo('value="Set email address in Settings" disabled');
            }
        ?> />
        <script type="text/javascript">

          var messageSend = false;
          jQuery('#preserver_mail_submit').click(function () {
            if (messageSend != true) {
              jQuery.ajax({
                url: 'inc/ajax/preserver-mail.php',
                type: "POST",
                data: ({
                  recipent_adress: '<?php echo($recipent_adress) ?>', 
                  color: '<?php echo(getSpeakingName($_POST['color'])) ?>',
                  manufacturer: '<?php echo(getSpeakingName($_POST['manufacturer'])) ?>'
                }),
                fail: function () {
                  alert('foo');
                },
                success: function(data){
                    messageSend = true;
                    //jQuery('.top-bar').after('<div id="screen_overlay">Message Send!<p><input class="btn nolink" type="submit" id="preserver_mail_submit" value="Back to the Preserver" /></p></div>');
                    jQuery('#preserver_mail_submit').attr('value',data);
                    //jQuery('#screen_overlay').fadeIn();
                }
              });
            }
          });
        </script>
      </p>
    </div>
  </form>
<?php 
} else {
?>
<p>
  <a href="preserver.php" class="btn" >Back to the Preserver</a>
</p>
<?php 
}
?>
</section>
<?php include('inc/templates/footer.phtml') ?>
<?php 
require_once('inc/php/config.php');
$recipent_adress = 'inyo@gmx.de';
$site_name = 'index';

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
          i'm sitting in a <?php 
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
        <input class="btn nolink" type="submit" id="preserver_mail_submit" value="Send to <?php echo($recipent_adress) ?>" />
        <script type="text/javascript">
          jQuery('#preserver_mail_submit').click(function () {
            var messageSend = false;

/*
            setInterval(function () {
              if (messageSend === true) {
                jQuery('#screen_overlay').fadeOut();
              }
            }, 1000)
*/

            jQuery.ajax({
                url: 'inc/ajax/sendmail.php',
                type: "POST",
                data: ({
                  recipent_adress: '<?php echo($recipent_adress) ?>', 
                  color: '<?php echo(getSpeakingName($_POST['color'])) ?>',
                  manufakturer: '<?php echo(getSpeakingName($_POST['manufakturer'])) ?>'
                }),
                fail: function () {
                  alert('foo');
                },
                success: function(data){
                    //messageSend = true;
                    //jQuery('.top-bar').after('<div id="screen_overlay">Message Send!<p><input class="btn nolink" type="submit" id="preserver_mail_submit" value="Back to the Preserver" /></p></div>');
                    jQuery('#preserver_mail_submit').attr('value',data);
                    //jQuery('#screen_overlay').fadeIn();
                }
            });
          });
        </script>
      </p>
    </div>
  </form>
<?php 
} else {
?>


  <?php 
/*
  //Empfängeradresse setzen
  $mailer->ClearAddresses();
  $mailer->AddAddress($recipent_adress);

  //Betreff der Email setzen
  $mailer->Subject = 'I\'m hitchhiking';

  //Text der EMail setzen
  $mailer->Body = 'Hi there!
  i\'m sitting in a ';
  if ( isset( $_POST['color'] ) && $_POST['color']!=false ) {
    $mailer->Body .= getSpeakingName($_POST['color']);
  }
  $mailer->Body .= ' '; 
  if ( isset($_POST['manufacturer']) && $_POST['manufacturer']!=false ) {
    $mailer->Body .= getSpeakingName($_POST['manufacturer']);
  } else {
    $mailer->Body .= 'car'; 
  }
  $mailer->Body .= ' now.

  I just wanted to let you know so you are not worried about me.
  
  This is a generated mail from http://zyklop.pisces.uberspace.de/hitchhiker/ -> A awsome mobile toolkit for hitchhikers.';

  if(!$mailer->Send()) {
    echo "<p>Mailer Error: ".$mailer->ErrorInfo.'</p>';
  } else {
    echo "<p>Message send!</p>";
  }

  //echo(sentMail($mailer));

  //require_once('inc/php/config.php');
  
  //mysql_select_db($mysql->db_name, $mysql->db_connect());
*/

  /* Creating the table if not exist [BEGIN] */
  /*
  $create_table_res = $mysql->db_table_install($mysql->con,$mysql->db_table,'id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  	username TEXT NULL,
  	start_location INT(11) NULL,
  	target_location TEXT NULL,
  	user_email_adress TEXT NULL,
  	kontact_person_email_adress TEXT NULL,
  	date TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
  echo( $create_table_res );
  */
  /* Creating the table if not exist [END] */
  ?>

<p>
  <a href="preserver.php" class="btn" >Back to the Preserver</a>
</p>
<?php 
}
?>
</section>
<?php include('inc/templates/footer.html') ?>
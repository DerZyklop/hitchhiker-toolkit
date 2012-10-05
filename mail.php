<?php 
$site_name = 'index';
include('inc/templates/head.php');
?>
  <section>
    
    <form action="mail.html"></form>
    
    <div class="box">
      <h3>Email </h3>
      <p>Ok, great!<br />You're sitting in a <?php if ($_POST['color']==false) {
        echo( 'undefined-colored' );
    } else {
        switch ($_POST['color']) {
          case 'color-1':
            $color_name = 'gray/silver';
            break;
          case 'color-2':
            $color_name = 'black';
            break;
          case 'color-3':
            $color_name = 'blue';
            break;
          case 'color-4':
            $color_name = 'white';
            break;
          case 'color-5':
            $color_name = 'red';
            break;
          case 'color-6':
            $color_name = 'yellow';
            break;
          case 'color-7':
            $color_name = 'brown';
            break;
          case 'color-8':
            $color_name = 'green';
            break;
          case 'color-9':
            $color_name = 'orange';
            break;
        }
        echo( $color_name.'-colored' );
    } ?>&nbsp;<?php 
    if ($_POST['manufacturer']==false) {
        echo( 'car' );
    } else {
        switch ($_POST['manufacturer']) {
          case 'manufacturer-1':
            $manufacturer_name = 'Audi';
            break;
          case 'manufacturer-2':
            $manufacturer_name = 'BMW';
            break;
          case 'manufacturer-3':
            $manufacturer_name = 'Ford';
            break;
          case 'manufacturer-4':
            $manufacturer_name = 'Mercedes';
            break;
          case 'manufacturer-5':
            $manufacturer_name = 'Opel';
            break;
          case 'manufacturer-6':
            $manufacturer_name = 'Volkswagen';
            break;
          case 'manufacturer-7':
            $manufacturer_name = 'Volvo';
            break;
          case 'manufacturer-8':
            $manufacturer_name = 'Toyota';
            break;
          case 'manufacturer-9':
            $manufacturer_name = 'Smart';
            break;
          case 'manufacturer-10':
            $manufacturer_name = 'Porsche';
            break;
          case 'manufacturer-11':
            $manufacturer_name = 'John Deere tractor';
            break;
        }
        echo( $manufacturer_name );
    } ?>.</p>
      <p>Should i send this message?</p>
      <blockquote>
        <p>
        Hi there!
        </p>
        <p>
        i'm sitting in a <?php 
        if ( isset( $color_name ) && $color_name!=false ) {
            echo( $color_name.'-colored' ); 
        } ?> <?php 
        if ( isset($manufacturer_name) && $manufacturer_name!=false ) {
            echo($manufacturer_name); 
        } else {
            echo('car'); 
        }
        ?> now.
</p>
<p>I just wanted to let you know so you are not worried about me
</p>
<p>
This is a generated mail from http://zyklop.pisces.uberspace.de/hitchhiker/ -> A awsome mobile toolkit for hitchhikers.
</p>
      </blockquote>
    </div>

    <div class="box">
      <p>
        <a class="btn" href="mailto:mail@der-zyklop.de?subject=I'm%20hitchhiking&body=Hi there!%0D%0A%0D%0Ai'm%20sitting%20in%20a%20<?php 
        if ( isset( $color_name ) && $color_name!=false ) {
            echo( $color_name.'-colored' ); 
        } ?>%20<?php 
        if ( isset($manufacturer_name) && $manufacturer_name!=false ) {
            echo($manufacturer_name); 
        } else {
            echo('car'); 
        }
        ?>%20now.%0D%0AI%20just%20wanted%20to%20let%20you%20know%20so%20you%20are%20not%20worried%20about%20me%0D%0A%0D%0AThis%20is%20a%20generated%20mail%20from%20http://zyklop.pisces.uberspace.de/hitchhiker/%20->%20A%20awsome%20mobile%20toolkit%20for%20hitchhikers."><span class="icon-share-alt icon-white"></span>Send a "I'm fine"-mail</a>
      </p>
    </div>
  </section>

<?php include('inc/templates/footer.html') ?>
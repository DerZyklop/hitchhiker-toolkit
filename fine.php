<?php 
$site_name = 'imfine';
$reload_btn == true;
include('inc/templates/head.php');
?>
  <form action="mail.php" method="post">
    <section>
      <h3>Color</h3>
      <div class="form-elements elements-4">
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
      <div class="form-elements elements-4">
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
      <h3>Fertig?</h3>
      <p>
        <button type="submit">GO!!</button>
      </p>
    </section>
  </form>
<?php include('inc/templates/footer.html') ?>
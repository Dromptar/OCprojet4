<?php $title = 'Home'; ?>

<?php ob_start(); ?>


<section id="section-slider">

  <div class="wrap">

    <div id="arrow-left" class="arrow"></div>

    <div id="slider">

      <div class="slide slide1">
        <div class="slide-content">
          <span>Img one</span>
        </div>
      </div>

      <div class="slide slide2">
        <div class="slide-content">
          <span>Img two</span>
        </div>
      </div>
      
      <div class="slide slide3">
        <div class="slide-content">
          <span>Img three</span>
        </div>
      </div>

    </div>

    <div id="arrow-right" class="arrow"></div>

  </div>

  </section>

  <script src="public/js/Slider.js"></script>

<section id="articles">



<?php  var_dump($posts);?>



</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
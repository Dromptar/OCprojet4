<?php $title = 'Home - Le site officiel de Jean Forteroche'; ?> 

<?php ob_start(); ?>


<section id="section-slider">

  <div class="wrap">

    <div id="arrow-left" class="arrow"></div>

    <div id="slider">

      <div class="slide slide1">
        <div class="slide-content">
          <span>Jean Forteroche : "Billet simple pour l'Alaska"</span>
        </div>
      </div>

      <div class="slide slide2">
        <div class="slide-content">
          <span>Jean Forteroche : "Billet simple pour l'Alaska"</span>
        </div>
      </div>

      <div class="slide slide3">
        <div class="slide-content">
          <span>Jean Forteroche : "Billet simple pour l'Alaska"</span>
        </div>
      </div>
      
      <div class="slide slide4">
        <div class="slide-content">
          <span>Jean Forteroche : "Billet simple pour l'Alaska"</span>
        </div>
      </div>

    </div>

    <div id="arrow-right" class="arrow"></div>

  </div>

</section>



<script src="public/js/Slider.js"></script>

<a href="#author-bio"><i class='fa fa-angle-double-down' id='scroll-icon'></i></a>

<section id="author-bio">
  <div id="picture">
    <img src="public/images/writer.jpg" alt="writer">
  </div>
  
  <div id="bio">
    <h2>Un petit mot sur l'auteur ...</h2>
    <p>
      Jean Forteroche est un écrivain, poète, philologue, essayiste et professeur d’université britannique, 
      né le 3 janvier 1892 à Bloemfontein et mort le 2 septembre 1973 à Bournemouth. Après 
      des études à Birmingham et à Oxford et l’expérience traumatisante de la Première Guerre mondiale. 
      Durant sa carrière universitaire, il défend l’apprentissage des langues, surtout germaniques,
      et bouleverse l’étude du poème anglo-saxon Beowulf avec sa conférence Beowulf : Les Monstres et les Critiques (1936).
      Son essai Du conte de fées (1939) est également considéré comme un texte crucial dans l’étude de ce genre littéraire.
    </p>
  </div>

</section>


<section id="articles">

<?php

while ($data = $lastPosts->fetch())
{
?>
    <div class="newPost">
        
        <h3>
          <!--<?= htmlspecialchars($data['author']) ?>!-->
          <?= nl2br($data['title']) ?>
          <br/>
          <!--<i class="fas fa-book-open"></i>!-->
        </h3>
        
        <p>
          <?= nl2br($data['quote']) ?>
          <br/>
        </p>
        <a href="<?=$GLOBALS['nomDeDomaine']?>?url=post&amp;id=<?= $data['id'] ?>"><i class="fas fa-sign-in-alt"></i></a>
        <p class="date"><em>Le <?= $data['date_post_fr'] ?></em></p>
        
    </div>
<?php
}

$lastPosts->closeCursor();

?>

</section>

<script src="public/js/menu.js"></script>


<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
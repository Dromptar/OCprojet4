<?php $title = 'Home'; ?>

<?php ob_start(); ?>


<section id="section-slider">

  <div class="wrap">

    <div id="arrow-left" class="arrow"></div>

    <div id="slider">

      <div class="slide slide1">
        <div class="slide-content">
          <span>Billet simple pour l'Alaska</span>
        </div>
      </div>

      <div class="slide slide2">
        <div class="slide-content">
          <span><i>"Quand tu regardes l'Alaska, l'Alaska regarde aussi en toi."</i></span>
        </div>
      </div>
      
      <div class="slide slide3">
        <div class="slide-content">
          <span><i>"Ce que j'ai fais le jure, aucune autre bete au monde ne l'aurait fait..."</i></span>
        </div>
      </div>

    </div>

    <div id="arrow-right" class="arrow"></div>

  </div>

  </section>

  <script src="public/js/Slider.js"></script>

<section id="articles">

<?php
while ($data = $posts->fetch())
{
?>
    <div class="newPost">
        <h3>
            <?= htmlspecialchars($data['author']) ?>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['date_post_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>


</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
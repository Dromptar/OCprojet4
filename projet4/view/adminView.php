<?php 

if(!isset($_SESSION)){

    session_start();
}


 $title = 'Espace Admin'; ?>



<?php ob_start(); ?>

<p id="session"><?= $_SESSION['connected']?></p>

<p><a href="index.php?url=logout">Déconnexion</a></p>


<section id="edition">

<textarea id="texteditor">Hello, World!</textarea>


</section>

<script src="public/js/textEditor.js"></script>

<?php $content = ob_get_clean(); ?>



<?php require('template.php'); ?>



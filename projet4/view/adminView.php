
<?php $title = 'Espace Admin'; ?>

<?php ob_start(); ?>

<p><?= $bonjour ?></p>

<section id="editon">

<textarea id="texteditor">Hello, World!</textarea>


</section>

<script src="public/js/textEditor.js"></script>

<?php $content = ob_get_clean(); ?>



<?php require('template.php'); ?>




<?php $title = 'Espace Admin'; ?>

<?php ob_start(); ?>




      <textarea id="mytextarea">Hello, World!</textarea>






<script src="public/js/textEditor.js"></script>

<?php $content = ob_get_clean(); ?>



<?php require('template.php'); ?>



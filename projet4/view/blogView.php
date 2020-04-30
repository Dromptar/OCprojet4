<?php $title = 'Blog'; ?>



<?php ob_start(); ?>

<?php while ($data = $allPosts->fetch())
{
?>

<p>
    <?php nl2br(substr($data['content'], 0, 300)) ?>
</p>

<?php
}
$allPosts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
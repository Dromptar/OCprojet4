<?php $title = 'Admin'; ?>

<?php ob_start(); ?>


<form action="" method="POST">
    <p><label>Pseudonyme : <input type="text" name="pseudo" /> </label></p>
    <p><label>Mot de passe : <input type="password" name="pass" /> </label></p>
    <p><label>Connexion automatique <input type="checkbox"  name="connexion" checked> </label></p>
    <p><input type="submit" name="connexion" value="Je me connecte" /></p>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
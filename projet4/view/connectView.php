<?php 
require_once("controller/logs.php");

session_start();

if (isset($_SESSION['id']) && !empty($_SESSION['id'])
    && isset($_SESSION['pseudo']) && !empty($_SESSION['id']))
{
    require_once("adminView.php");
}

$title = 'Connexion';
?>


<?php ob_start(); ?>

<section id="connect">

    <div id="connect_formulaire">

        <form action="" method="POST">

            <input type="text" name="pseudo" placeholder="Identifiant" required/>
            <input type="password" name="pass" placeholder="Mot de Passe" required/>
            <!--<label>Connexion automatique <input type="checkbox"  name="connexion" checked> </label> !-->
            <input type="submit" name="connexion" value="Se connecter" />

        </form>

        <p>Pas encore de compte ?<br/><a href="index.php?url=register">Inscrivez-Vous !</a></p>

    </div>

</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
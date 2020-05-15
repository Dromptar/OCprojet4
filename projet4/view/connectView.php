<?php $title = 'Connexion'; ?>

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
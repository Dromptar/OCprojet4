<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

<section id="register">

    <div id="register_formulaire">

        <form class="logs" action="" method="POST">

            <input type="text" name="pseudo" placeholder="Identifiant" />
            <input type="password" name="pass1" placeholder="Mot de passe" />
            <input type="password" name="pass2" placeholder="Retapez le mot de passe" />
            <input type="text" name="email" placeholder="Email" />
            <!--<label>Connexion automatique <input type="checkbox"  name="connexion" checked> </label> !-->
            <input class="logInput" type="submit" name="inscription" value="Je m'inscris" />

        </form>

    </div>

</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

<section id="register">

    <div id="formulaire">

        <form action="" method="POST">

            <input type="text" name="pseudo" placeholder="Identifiant" required/>
            <input type="password" name="pass1" placeholder="Mot de passe" required/>
            <input type="password" name="pass2" placeholder="Retapez le mot de passe" required/>
            <input type="text" name="email" placeholder="Email" required/>
            <!--<label>Connexion automatique <input type="checkbox"  name="connexion" checked> </label> !-->
            <input type="submit" name="inscription" value="Je m'inscris" />

        </form>

    </div>

</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
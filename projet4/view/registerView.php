<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

<section id="register">

    <div id="register_formulaire">

        <form class="logs" action="<?=$GLOBALS['nomDeDomaine']?>?url=register" method="POST">

            <input class="logsInput" type="text" name="pseudo" placeholder="Identifiant" />
            <input class="logsInput" type="password" name="pass1" placeholder="Mot de passe" />
            <input class="logsInput" type="password" name="pass2" placeholder="Retapez le mot de passe" />
            <input class="logsInput" type="text" name="email" placeholder="Email" />
            <!--<label>Connexion automatique <input type="checkbox"  name="connexion" checked> </label> !-->
            <input class="validateInput" type="submit" name="inscription" value="Je m'inscris" />

        </form>

    </div>

</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
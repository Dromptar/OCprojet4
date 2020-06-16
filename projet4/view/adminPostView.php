<?php 

if(!isset($_SESSION)){

    session_start();
}


 $title = 'Espace Admin (gestion Post)'; ?>



<?php ob_start(); ?>

<p id="session"><?= $_SESSION['connected']?><br/>
<a href="index.php?url=logout">Déconnexion</a></p>




<section id="edition">

    <form action="http://localhost/projet4/index.php?url=blog" method="post">
            <div id="editor_inputs">
                <label>Auteur: <input type="text" id="author" name="author" value="<?= htmlspecialchars($post['author']) ?>"/></label>
                <label>Titre: <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>"/></label>
                <label>Citation: <input type="text" id="quote" name="quote" value="<?= htmlspecialchars($post['quote']) ?>"/></label>
            </div>
            <div>
                <textarea id="texteditor" name="texteditor" value=<?= nl2br($post['content']) ?>></textarea>
            </div>
            <div>
            <a href ="http://localhost/projet4/index.php?url=blog&id&update">Actualiser</a>
            </div>
    </form>




</section>

<script src="public/js/textEditor.js"></script>

<?php $content = ob_get_clean(); ?>



<?php require('template.php'); ?>

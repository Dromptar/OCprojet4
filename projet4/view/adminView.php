<?php 

if(!isset($_SESSION)){

    session_start();
}

require_once("controller/blogPosts.php");
require_once("controller/blogComments.php");

$title = 'Espace Admin'; ?>


<?php ob_start(); ?>

<p id="session"><?= $_SESSION['connected']?><br/>
<a href="<?=$GLOBALS['nomDeDomaine']?>?url=logout">Déconnexion</a></p>


<section id="edition">

    <form action="<?=$GLOBALS['nomDeDomaine']?>?url=blog" method="post">
            <div id="editor_inputs">
                <input type="text" id="author" name="author" placeholder="Auteur"/>
                <input type="text" id="title" name="title" placeholder="Titre"/>
                <input type="text" id="quote" name="quote" placeholder="Citation"/>
            </div>
            <div>
                <textarea id="texteditor" name="texteditor">Bonjour Jean !</textarea>
            </div>
            <div>
                <input class="publish" type="submit" name="publish" value="Publier" />
            </div>
    </form>

</section>


<p id="commentsManager"><button class="flagsManager">Gestion des commentaires</button></p>

<section id="flagsManagerSpace">

        <?php
        while ($allCom = $allComments->fetch()) 
        {
        ?>
        <div class="new-comment">
            <p><strong><?= htmlspecialchars($allCom['author']) ?></strong> le <?= $allCom['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($allCom['comment'])) ?></p>
            <p><?= nl2br(htmlspecialchars($allCom['flag'])) ?></p>
            <a href ="<?=$GLOBALS['nomDeDomaine']?>?url=connection&deleteComment=<?= $allCom['id'] ?>">Supprimer</a>
        </div>  
        <?php
        }
        ?>

</section>

<script src="public/js/textEditor.js"></script>
<script src="public/js/comments.js"></script>

<?php $content = ob_get_clean(); ?>



<?php require('template.php'); ?>



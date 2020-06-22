<?php $title = 'Post'; ?>

<?php ob_start(); ?>

<header id="post-banner">

    <div class="banner-text">
        <?= htmlspecialchars($post['title']) ?>
    </div>

</header>

<section id="posts">

<div class="solo-post"> 
    <p>
        <?= nl2br($post['content']) ?>
    </p>
    <p class="post-date">
        <em>Le <?= $post['date_post_fr'] ?></em>
    </p>
</div>

<p id="posts_list"><a href="index.php?url=blog">Retour à la liste des billets</a></p>

</section>

<section id="comments">

    <aside id="post_comment">

    <h2>Commentaires</h2>

        <form action="index.php?url=addComment&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" name="validate" value="Commenter" />
            </div>
        </form>

    </aside>
    
    <aside id="comment_display">
    
        <?php
        while ($comment = $comments->fetch())
        {
        ?>
        <div class="new-comment">
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <a href ="http://localhost/projet4/index.php?url=post&action=flag&id=<?= $comment['id'] ?>
                    &post_id=<?= $comment['post_id'] ?>">Signaler</a>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </div>
            
        <?php
        }
        ?>

    </aside>

</section>


<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
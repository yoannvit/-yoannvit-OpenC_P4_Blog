<?php $title = 'Modifier un commentaire' ?>
 
<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour au billet</a></p>
 
 
 
<h2>Modifier un commentaire</h2>
 
<form action="index.php?action=editComment&amp;id=<?= $comment['id'] ?>" method="post">
    <div>
        <p>Auteur : <?= $comment['author'] ?></p>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
    </div>
    <div>
        <input type="submit" value="Modifier" />
    </div>
</form
 
 
<?php $content = ob_get_clean(); ?>
 
<?php require('template.php'); ?>
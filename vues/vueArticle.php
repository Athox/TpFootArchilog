<?php $this->titre = "Mon Blog - " . $article['Titre']; ?>

    <article>
        <header>
            <h1 class="titreBillet"><?= $article['Titre'] ?></h1>
            <time><?= $article['DatePublication'] ?></time>
        </header>
        <p><?= $article['Contenu'] ?></p>
    </article>
    <hr />
    <header>
        <h1 id="titreReponses">Réponses à <?= $article['Titre'] ?></h1>
    </header>

<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['Auteur'] ?> dit :</p>
    <p><?= $commentaire['Contenu'] ?></p>
<?php endforeach; ?>
    
<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
           required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4" 
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $article['Id'] ?>" />
    <input type="submit" value="Commenter" />
</form>

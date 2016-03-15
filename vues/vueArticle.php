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


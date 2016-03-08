<?php

require_once 'modeles/Article.php';
require_once 'modeles/Commentaire.php';
require_once 'vues/Vue.php';

class ControllerArticle {

  private $article;
  private $commentaire;

  public function __construct() {
    $this->article = new Article();
    $this->commentaire = new Commentaire();
  }

  // Affiche les détails sur un article
  public function article($idArticle) {
    $article = $this->article->getArticle($idArticle);
    $commentaires = $this->commentaire->getCommentaires($idArticle);
    $vue = new Vue("article");
    $vue->generer(array('article' => $article, 'commentaires' => $commentaires));
  }
  
  // Ajoute un commentaire à un article
  public function commenter($auteur, $contenu, $idArticle) {
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idArticle); 
    // Actualisation de l'affichage de l'article
    $this->article($idArticle);  }  
}

?>
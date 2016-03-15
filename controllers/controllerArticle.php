<?php

require_once 'modeles/Article.php';
require_once 'vues/Vue.php';

class ControllerArticle {

  private $article;

  public function __construct() {
    $this->article = new Article();
  }

  // Affiche les d�tails sur un article
  public function article($idArticle) {
    $article = $this->article->getArticle($idArticle);
    $vue = new Vue("article");
    $vue->generer(array('article' => $article));
  }
}

?>
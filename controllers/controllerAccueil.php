<?php

require_once 'modeles/championnat.php';
require_once 'vues/vue.php';

class ControllerAccueil {

  private $article;

  public function __construct() {
    $this->article = new Article();
  }

  // Affiche la liste de tous les articles du blog
  public function accueil() {
    $articles = $this->article->getArticles();
    $vue = new Vue("Accueil");
    $vue->generer(array('articles' => $articles));   
  }
  
}

?>
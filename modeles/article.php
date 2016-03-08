<?php

require_once 'modeles/modele.php';

class Article extends Modele {

    // Renvoie la liste des articles du blog
    public function getArticles() {
        $sql = 'select Id, Titre, Contenu, DatePublication FROM Article'
              . ' order by Id desc';
        $articles = $this->executerRequete($sql);
            
        return $articles;
    }
    
    // Renvoie les informations sur un article
    public function getArticle($idArticle) {
        $sql = 'select Id, Titre, Contenu, DatePublication from Article'
          . ' where Id=?';
        $article = $this->executerRequete($sql, array($idArticle));
        if ($article->rowCount() == 1)
          return $article->fetch();  // Acc�s � la premi�re ligne de r�sultat
        else
          throw new Exception("Aucun article ne correspond � l'identifiant '$idArticle'");
      }        
}

?>
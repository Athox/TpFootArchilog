<?php

require_once 'modeles/modele.php';

class Commentaire extends Modele {

    // Renvoie la liste des commentaires associés à un article
    public function getCommentaires($idArticle) {
        $sql = 'select Id, IdArticle, Auteur, Contenu, DatePublication from commentaire'
          . ' where IdArticle=?';
        $commentaires = $this->executerRequete($sql, array($idArticle));
        return $commentaires;
    }
    
    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idArticle) {
        $sql = 'insert into commentaire(IdArticle, Auteur, Contenu, DatePublication)'
          . ' values(?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");  // Récupère la date courante
        $this->executerRequete($sql, array($idArticle, $auteur, $contenu, $date));
    }
    
}

?>
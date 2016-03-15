<?php

require_once 'modeles/modele.php';

class Championnat extends Modele {

    // Renvoie la liste des pays
    public function getPays() {
        $sql = 'SELECT pays_championnat FROM Championnat'
              . ' order by pays_championnat ASC';
        $pays = $this->executerRequete($sql);   
        return $pays;
    }
    
    // Renvoie les championnats d'un pays
    public function gatChampionnat($pays_championnat) {
        $sql = 'SELECT id_championnat, nom_championnat from Championnat'
          . ' where pays_championnat=?';
        $championnat = $this->executerRequete($sql, $pays_championnat);
        if ($championnat->rowCount() == 1)
          return $championnat->fetch();  // Accès à la première ligne de résultat
        else
          throw new Exception("Aucun championnat ne correspond au pays '$pays_championnat'");
      }        
}

?>
<?php

require_once 'framework/configuration.php';

abstract class Modele {

    /** Objet PDO d'acc�s � la BD 
        Statique donc partag� par toutes les instances des classes d�riv�es */
    private static $bdd;

    // Ex�cute une requ�te SQL �ventuellement param�tr�e
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql);    // ex�cution directe
        }
        else {
            $resultat = $this->getBdd()->prepare($sql);  // requ�te pr�par�e
            $resultat->execute($params);
        }
        return $resultat;
    }

    // Renvoie un objet de connexion � la BD en initialisant la connexion au besoin
    private function getBdd() {
        if (self::$bdd === null) {
            // R�cup�ration des param�tres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");
            // Cr�ation de la connexion
            self::$bdd = new PDO($dsn, $login, $mdp, 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }
    
    protected function getConnexion() {
    	$login = Configuration::get("loginAdm");
    	$password = Configuration::get("mdpAdm");
    	$connexion = array($login, $password);
    	return $connexion;
    }
}

?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="css/style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreSite">Football</h1></a>
                <div id="menu">
			        <ul>
			            <li><a href="index.php">Accueil</a></li>
			            <?php 
			            if (isset($_SESSION['Admin'])){
			            	echo '<li><a href="index.php?action=connexion">Tableau de bord</a></li>';
			            }
			            else {
			            	echo '<li><a href="index.php?action=connexion">Connexion</a></li>';
			            }
			            ?>
			            
			        </ul>
			    </div>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
        </div> <!-- #global -->
    </body>
</html>
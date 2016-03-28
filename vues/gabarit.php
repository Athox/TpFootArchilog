<!doctype html>
<html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.css" />
        <title><?= $titre ?></title>
    </head>
    
    <body>
        <div class="container">
            <header class="page-header">
                <div class="jumbotron">
                	<h1>Football</h1>
                	<p>Anthony CHAN-OU-TEUNG</br>
                	Vincent CUCHET</p>
                </div>
                <div class="navbar navbar-default">
			        <ul class="nav navbar-nav">
			            <li class="active"><a href="index.php">Accueil</a></li>
			            <?php 
			            if (isset($_SESSION['Admin'])){
			            	echo '<li><a href="index.php?action=connexion">Tableau de bord</a></li>';
			            	echo '<li><a href="index.php?action=deconnexion">Deconnexion</a></li>';
			            }
			            else {
			            	echo '<li><a href="index.php?action=connexion">Connexion</a></li>';
			            }
			            ?>
			            
			        </ul>
			    </div>
            </header>
            <div>
                <?= $contenu ?>
            </div> <!-- #contenu -->
        </div> <!-- #global -->
    </body>
</html>
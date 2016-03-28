<?php $this->titre = "Mon Blog"; ?>

<h1>Modification: <?= $championnat['nom_championnat']?></h1>

<form method="post" action="index.php?action=admin&type=modifC&etat=ok">
							<p>
								<input type="hidden" name="id" value="<?= $championnat['id_championnat']?>">
								Nom du championnat: <input type="text" name="nom" value="<?= $championnat['nom_championnat']?>"/></br>
								Pays: <input type="text" name="pays" value="<?= $championnat['pays_championnat']?>"/></br>
								Année: <input type="text" name="annee" value="<?= $championnat['annee_championnat']?>"/></br>
								Nombre d\'équipes: <select name="nbequipe">
													<?php for($i=1; $i<=25; $i++){?>
															<option value="<?=$i?>" <?php if($i==$championnat['nb_equipe_championnat']){echo 'selected="selected"';}?>><?=$i?></option>
															<?php }?>
														</select></br>
								Points par match gagné: <select name="ptsg">
													<?php for($i=0; $i<=10; $i++){?>
															<option value="<?=$i?>" <?php if($i==$championnat['pts_gagne']){echo 'selected="selected"';}?>><?=$i?></option>
															<?php }?>
														</select></br>
								Points par match perdu: <select name="ptsp">
															<?php for($i=0; $i<=10; $i++){?>
															<option value="<?=$i?>" <?php if($i==$championnat['pts_perdu']){echo 'selected="selected"';}?>><?=$i?></option>
															<?php }?>
														</select></br>
								Points par match nul: <select name="ptsn">
															<?php for($i=0; $i<=10; $i++){?>
															<option value="<?=$i?>" <?php if($i==$championnat['pts_nul']){echo 'selected="selected"';}?>><?=$i?></option>
															<?php }?>
														</select></br>
								Gestion des exaequos: <select name="exaequo">
															<option value="difference" selected="selected">Différence</option>
														</select></br>
								<input type="submit" value="Modifier Championnat"/>
							</p>
						</form>
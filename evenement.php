<!DOCTYPE>
<html>
<body>
	<?php include("index.php"); ?>
<h1><strong>Liste des evenements </strong>
    <?php if(isset($_SESSION['id']) && $_SESSION['role'] == 1)
{ ?>
	<a class="btn btn-success btn-lg" href="ajoutEvenement.php"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
    
    <?php } ?>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Description</th>
				<th>Prix</th>
				<th>Date</th>
				<th>Créateur</th>
				<th>Actions</th>
			</tr>
		</thead>

<?php
		require 'admin\database.php';
		$db = Database::connect();
		$caracteristique = $db->query('SELECT evenement.id, evenement.denomination, date, description, prix,  utilisateur.nom, utilisateur.prenom FROM evenement INNER JOIN utilisateur WHERE evenement.id_utilisateur = utilisateur.id AND validation = 1');
				
			
		while($evenement = $caracteristique->fetch()) 
                        {
			
				echo '<tr>';
							
                echo '<td>'. $evenement['denomination'] . '</td>';
                echo '<td>'. $evenement['description'] . '</td>';
                echo '<td>'. $evenement['prix'] . '€' . '</td>';
                echo '<td>'. $evenement['date'] . '</td>';
				echo '<td>'. $evenement['nom'] . ' ' .$evenement['prenom'] . '</td>';
				echo '<td width=300>';

  if(empty($_SESSION['id']))
                {
                    echo '<a class="btn btn-default" href="boutonVoir.php?id='.$evenement['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                    echo '<br>';

                }
                elseif($_SESSION['role'] == 0)
                {
                    echo '<a class="btn btn-default" href="boutonVoir.php?id='.$evenement['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                    echo '<br>';


                }
                elseif($_SESSION['role'] == 1)
                {
                    echo '<a class="btn btn-default" href="boutonVoir.php?id='.$evenement['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                    echo '<br>';

                    echo '<a class="btn btn-primary" href="modifier.php?id='.$evenement['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Modifier</a>';
                    echo '<br>';

                    echo '<a class="btn btn-danger" href="supprimer.php?id='.$evenement['id'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                    echo '<br>';

                    echo '</td>';
                    echo '</tr>';
                }
                elseif($_SESSION['role'] == 2)
                {
                    echo '<a class="btn btn-default" href="boutonVoir.php?id='.$evenement['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                    echo '<br>';



                    echo '</td>';
                    echo '</tr>';
                }
            }
							

		
			Database::disconnect();
			?>
    </table>

</body>

</html>

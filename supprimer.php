<?php $id = $_GET['id']; ?>

<!DOCTYPE>
<html>
<body>
	<?php include("index.php"); ?>

	<h2><strong><br>Supprimer</strong></h2><br>
	<h4><strong>Etes vous sûr de vouloir supprimer?</strong></h4><br>

	<form method="POST" action='scriptSupprimer.php?id=<?=$id?>'>
		<div class="form-actions">
			<input type="submit" class="btn btn-danger" value="Supprimer" />
			<a class="btn btn-primary" href="boite_a_idee.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>

		</div>
	</form>
</body>

</html>

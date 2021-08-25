<!DOCTYPE>
<html>

<body>
	<?php include("index.php"); ?>

	<br>
	<h2><strong>Ajouter une Photo à l'évenement</strong></h2>

	<form method="POST" action="scriptAjouterPhoto.php" enctype="multipart/form-data">
		<div class="form-group">
			<label for="titre">Titre de la photo :</label>
			<input type="text" class="form-control" id="titre" name="titre" placeholder="titre">
			<input type="hidden" name="id_evenement" value="<?=$_GET['id']; ?>" />
		</div>
		<div class="form-group">
			<label for="photo">Photo:</label>
			<label for="photo">Sélectionner une nouvelle photo:</label>
			<input type="file" class="form-control-file" id="photo" name="photo">
			<span class="help-inline"></span>
		</div>
		<input type="submit" class="btn btn-success" value="Ajouter Photo" />
	</form>




</body>

</html>

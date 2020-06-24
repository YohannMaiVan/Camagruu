<?php
	if (isset($_SESSION['login']) && isset($_POST['submitFile']) && !empty($_POST['submitFile']))
	{
		if ($_FILES['files']['error'] == 0) {
			//extensions
			$ext = strrchr($_FILES['files']['name'], '.');
			if ($ext != ".jpg" && $ext != ".png" && $ext != ".jpeg")
			$error = "You can only send .jpg or .png files";
		}
			// SIZE
		elseif (($_FILES['files']['size'] > 2097152) || ($_FILES['files']['error'] == 1)) { 
			echo "test de taille";
			$error = "Size File Problem";
		}
		else {
			$error = "Form Problem";
		}
		if (!isset($error)) {
			move_uploaded_file($_FILES['files']['tmp_name'], 'pics/'.$_FILES['files']['name']);
			gallery::insertPicture($_SESSION["login"], 'pics/'.$_FILES['files']['name']);
			echo "File Uploaded";
		}
	}
?>
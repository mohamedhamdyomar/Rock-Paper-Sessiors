<?php 
	if (isset($_POST['cancel'])) {
		header('Location: index.php');
		return;
	}

	$salt = 'XyZzy12*_';
	$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; //Pw is php123.

	$missing = false;
	if(isset($_POST['who']) && isset($_POST['pw'])){
		if(strlen($_POST['who']) < 1 || strlen($_POST['pw']) < 1){
			$missing = "User name and password are required";
		}
		else{
			$check = hash('md5', $salt.$_POST['pw']);
			if($check == $stored_hash){
				header("Location: game.php?name=".urlencode($_POST['who']));
				return;
			}
			else{
				$missing = "incorrect password";
			}
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Mohamed Hamdy aa634380</title>
	<style type="text/css">
		
	</style>
</head>
<body>
<div class="container">
	<h1>Login to play the game: </h1><br>
	<?php 
		if($missing !== false){
			echo '<p style="color:red;">'.htmlentities($missing)."</p><br>";
		}
	 ?>

	<form method="post">
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">User Name</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="who">
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" name="pw">
		</div>
		<input class="btn btn-primary" type="submit" value="Submit">
		<input class="btn btn-primary" type="submit" name="cancel" value="Cancel">
	</form>

</div>
</body>
</html>
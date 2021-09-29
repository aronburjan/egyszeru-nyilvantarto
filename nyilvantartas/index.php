<!DOCTYPE html>
<?php
?>
<html>
	<head>
		<title>Nyilvántartás</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
		<link rel="stylesheet" href="loginstyle.css">
	</head>
	<body>
		<div class="container">
			<form action="php/check-login.php" method="post">
			<?php if(isset($_GET['error'])){ ?>
			<div class="alert alert-warning" role="alert">
				<?=$_GET['error']?>
			</div>
			<?php } ?>			

			  <div class="mb-3">
			    <label for="username" class="form-label">Felhasználónév</label>
			    <input type="text" class="form-control" id="username" name="username">
			  </div>
			  <div class="mb-3">
			    <label for="password" class="form-label">Jelszó</label>
			    <input type="password" class="form-control" name="password" id="password">
			  </div>
			  <div>
				<label>Jogosultság:</label>
			  </div>
			  <select class="form-select" aria-label="Default select example" name="role">
				  <option selected value="level1user">1. szintű felhasználó</option>
				  <option value="level2user">2. szintű felhasználó</option>
				  <option value="admin">admin</option>
				</select>
			  <br>
			  <button type="submit" id="loginbutton" class="btn btn-primary">Bejelentkezés</button>
			</form>
		</div>
	</body>
</html>
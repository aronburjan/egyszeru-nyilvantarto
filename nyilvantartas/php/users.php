<?php
	session_start();
	if(isset($_SESSION['username']) && isset($_SESSION['id'])){ 
		?>
	
<!DOCTYPE html>
<?php
?>

<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	<link rel="stylesheet" href="users.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<script>
		
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
			}
		
		function torol(id)
			{
					var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function(){
						if(this.readyState == 4 && this.status == 200){
						}
				};
				xhttp.open("GET","delete.php?id="+id,true);
				xhttp.send();
			}
			
		function edit(id)
			{
					var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function(){
						if(this.readyState == 4 && this.status == 200){
						}
				};
				xhttp.open("GET","update.php?id="+id,true);
				xhttp.send();
			}
			
			$(document).ready(function() {

			   function RefreshTable() {
				   $( "#tabladiv" ).load( "users.php #tabladiv" );
			   }

			   $("#refresh").on("click", RefreshTable);
			});
	</script>
	</head>
	<body>
	
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
					<a class="navbar-brand" href="home.php">Nyilvántartás</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
					  <ul class="navbar-nav">
						<li class="nav-item">
						  <a class="nav-link active" aria-current="page" href="users.php">Felhasználók nyilvántartása</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="logout.php">Kijelentkezés</a>
						</li>

					  </ul>
					</div>
				  </div>
		</nav>
		<div id="tabladiv">
		<table class="table" id="tablazat">
		  <thead>
			<tr>
			  <th scope="col">Név</th>
			  <th scope="col">Felhasználónév</th>
			  <th scope="col">Jogosultság</th>
			  <th scope="col">ID</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			$conn=new mysqli("localhost","root","","nyilvantartas");
			if($conn->connect_error)
				die("Nem sikerült az adatbázishoz kapcsolódni!");
			$sql="SELECT * FROM users ORDER BY id ASC";
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc())
				{
					print('<tr><td>'.$row["name"].'</td><td>'.$row["username"].'</td><td>'.$row["role"].'</td><td>'.$row["id"].'</td>');
					if($row["username"] != "admin"){
						print('<td><button onclick="torol('.$row["id"].')">Töröl</button></td></tr>');
					}

				}
						
			print("</table>");
			$conn->close();
			
			?>
		  </tbody>
		</table>
		</div>
		<button type="button" id="refresh" class="btn btn-success">Táblázat frissítése</button>
		<br><br>
		
		
		
		
		
		
		<form action="users.php" method="post">
		  <div class="form-group">
		  <h1>Felhasználó hozzáadása</h1>
			<label for="exampleFormControlInput1">Teljes név</label>
			<input type="text" class="form-control" id="exampleFormControlInput1" name="teljesnev" placeholder="John Doe">
			<br>
			<label for="exampleFormControlInput1">Felhasználónév (maximum 255 karakter)</label>
			<input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="username123">
			<br>
			<label for="exampleFormControlInput1">Jelszó (maximum 255 karakter)</label>
			<input type="text" class="form-control" id="exampleFormControlInput1" name="password" placeholder="password123">
			<br>
		  
			<label for="exampleFormControlSelect1">Jogosultság</label>
			<select name="role" class="form-control" id="exampleFormControlSelect1">
			  <option value="admin">admin</option>
			  <option value="level1user">egyes szintű felhasználó</option>
			  <option value="level2user">kettes szintű felhasználó</option>
			</select>
			<br>
			<button id="hozzaadbutton" type="submit" name="hozzaad" class="btn btn-warning">Hozzáad</button>
		  </div>
		  <br><br>
		  
		</form>
		
		<?php
		
			if(isset($_POST["hozzaad"]))
			{
				$conn=new mysqli("localhost","root","","nyilvantartas");
				if($conn->connect_error)
							die("Nem sikerült az adatbázishoz kapcsolódni!");
				
				$sql="INSERT INTO users (role,username,password,name) 
				VALUES ('".$_POST["role"]."','".$_POST["username"]."','".md5($_POST["password"])."','".$_POST["teljesnev"]."')";
				$conn->query($sql);
				$conn->close();
				
				
			
			}
		?>
		
		
		
		<form action="users.php" method="post">
		<div class="form-group">
		<h1>Jogosultság szerkesztése</h1>
		ID:
		<input type="text" class="form-control" id="exampleFormControlInput1" name="id" placeholder="123456789">
			<label for="exampleFormControlSelect1">Jogosultság</label>
			<select name="updaterole" class="form-control" id="exampleFormControlSelect1">
			  <option value="admin">admin</option>
			  <option value="level1user">egyes szintű felhasználó</option>
			  <option value="level2user">kettes szintű felhasználó</option>
			</select>
			<br>
			<button id="megvaltoztatbutton" type="submit" name="update" class="btn btn-warning">Megváltoztat</button>
		  </div>
		  <br><br>
		  
		  </div>
		</form>
		
		<?php
		
			if(isset($_POST["update"]))
			{
				$conn=new mysqli("localhost","root","","nyilvantartas");
				if($conn->connect_error)
							die("Nem sikerült az adatbázishoz kapcsolódni!");
				
				$sql="UPDATE users SET role = '".$_POST["updaterole"]."' WHERE id = '".$_POST["id"]."'";				
				$conn->query($sql);
				$conn->close();
				
				
			
			}
		?>


	</body>
	
</html>



<?php }else
	header("Location: /index.php");
 ?>
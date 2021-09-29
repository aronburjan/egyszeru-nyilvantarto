<?php
	session_start();
	if(isset($_SESSION['username']) && isset($_SESSION['id'])){ 
		?>
	
<!DOCTYPE html>
<?php
?>
<html>
	<head>
		<title>Kezdőlap</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
		<link rel="stylesheet" href="home.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script>
			
			if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
			}
			
				function torol(id,username)
					{
							var xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function(){
								if(this.readyState == 4 && this.status == 200){
								}
						};
						xhttp.open("GET","productdelete.php?id="+id,true);
						xhttp.send();
					}
					
					$(document).ready(function() {

					   function RefreshTable() {
						   $( "#tabladiv" ).load( "home.php #tabladiv" );
					   }

					   $("#refresh").on("click", RefreshTable);
					});
					
					$(document).ready(function() {
						$('#rowsid').on('change', function() {
							this.form.submit();
						});
					});
					
					$(document).ready(function() {

					   function RefreshTable() {
						   $( "#tabladiv" ).load( "home.php #tabladiv" );
					   }

					   $("#refresh").on("click", RefreshTable);
					});
					
					$(document).ready(function() {
						$('#orderid').on('change', function() {
							this.form.submit();
						});
					});
					

			</script>
	</head>
	<body>
		<?php
			//ADMIN
			if($_SESSION['role'] == 'admin'){
				?>
				
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
				
				<p class="dropdown">Sorok száma:</p> 
				<form action="home.php" method="GET" id="displayform">
					<select name="rows" id="rowsid">
					<option href=''value="">megjelenő sorok</option>
					<option href='?rows=osszes'value="osszes">összes</option>
					<option href='?rows=5' value="5">5</option>
					<option href='?rows=10' value="10">10</option>
					<option href='?rows=15' value="15">15</option>
					<option href='?rows=20'value="20">20</option>
					<option href='?rows=50'value="50">50</option>
					
					
					</select>
				</form>
				<p class="dropdown">Rendezés:</p>
				<form action="home.php" method="GET" id="orderform">
					<select name="order" id="orderid">
					<option href=''value="">sorok rendezése</option>
					<option href='?order=ascid' value="ascid">ID növekvő</option>
					<option href='?order=descid' value="descname">ID csökkenő</option>
					<option href='?order=ascname' value="ascname">Név növekvő</option>
					<option href='?rows=descname' value="descname">Név csökkenő</option>
					<option href='?rows=ascdarab'value="ascdarab">Darab növekvő</option>
					<option href='?rows=descdarab'value="descdarab">Darab csökkenő</option>

					
					
					</select>
				</form>
				
				
				<div id="tabladiv">
				<table id="tablazat" class="table">
				  <thead>
					<tr>
					  <th scope="col"><a href='?order=id&&sort=$sort'>ID</a></th>
					  <th scope="col"><a href='?order=nev&&sort=$sort'>Terméknév</a></th>
					  <th scope="col">Mennyiség</th>
					  <th scope="col">Törékeny</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
						
						
						
						
						if(isset($_GET["rows"])){
							$numberofrows = $_GET["rows"];
							$display = 1;
						}
						$conn=new mysqli("localhost","root","","nyilvantartas");
						
						
						
						
						if(isset($_GET["order"])){
							$ascid = 0;
							$descid = 0;
							$ascname = 0;
							$descname = 0;
							$ascdarab = 0;
							$descdarab = 0;
							$order = $_GET["order"];
							if($order == "ascname")
							{
								$ascname = 1;
							}
							else if($order == "descname")
							{
								$descname = 1;
							}
							else if($order == "ascid")
							{
								$ascid = 1;
							}
							else if($order == "descid")
							{
								$descid = 1;
							}
							
							else if($order == "ascdarab")
							{
								$ascdarab = 1;
							}
							else if($order == "descdarab")
							{
								$descdarab = 1;
							}
						}
									
						if($conn->connect_error)
							die("Nem sikerült az adatbázishoz kapcsolódni!");
						if(isset($_GET["order"]) && $ascname == 1){
							$sql="SELECT * FROM products ORDER BY name ASC";
						}
						else if(isset($_GET["order"]) && $descname == 1){
							$sql="SELECT * FROM products ORDER BY name DESC";
						}
						
						else if(isset($_GET["order"]) && $ascid == 1){
							$sql="SELECT * FROM products ORDER BY id ASC";
						}
						
						else if(isset($_GET["order"]) && $descid == 1){
							$sql="SELECT * FROM products ORDER BY id DESC";
						}
						
						else if(isset($_GET["order"]) && $ascdarab == 1){
							$sql="SELECT * FROM products ORDER BY quantity ASC";
						}
						
						else if(isset($_GET["order"]) && $descdarab == 1){
							$sql="SELECT * FROM products ORDER BY quantity DESC";
						}
						
						
						
						
						
						else{
							$sql="SELECT * FROM products";
						}
						
						$result=$conn->query($sql);
						
						
						
						
						while($row=$result->fetch_assoc())
							{
								print('<tr><td>'.$row["id"].'</td><td>'.$row["name"].'</td><td>'.$row["quantity"].'</td><td>'.$row["fragile"].'</td><td><button id="delete-button" onclick="torol('.$row["id"].')">Töröl</button></td></tr>');
									if(isset($_GET["rows"])){
									if($numberofrows!="osszes"){
										if($display==$numberofrows)
										{
										break;
										}
									if(isset($_GET["rows"]))
										{
										$display+=1;
										}
									}
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
				
				
				
					<form action="home.php" method="post">
					  <div class="form-group">
					  <h1>Termék hozzáadása</h1>
						<label for="exampleFormControlInput1">Terméknév</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="productname" placeholder="terméknév">
						<br>
						<label for="exampleFormControlInput1">Mennyiség (db)</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="quantity" placeholder="123456789">
						<br>
						<label for="exampleFormControlInput1">Törékeny?</label><br>
						<input type="radio" id="fragile" name="isfragile" value="Nem">
							<label for="fragile">Nem törékeny</label><br>
						<input type="radio" id="fragile" name="isfragile" value="Igen">
							<label for="fragile">Törékeny</label><br>
						<br>
						<button id="hozzaadbutton" type="submit" name="hozzaad" class="btn btn-warning">Hozzáad</button>
					  </div>
					  
					</form>
					
					<?php

						if(isset($_POST["hozzaad"]))
						{
							//log
								//$string =$_POST["productname"];
								$time = time();
								$string = ''.$_SESSION["username"].' hozzáadott '.$_POST["quantity"].' darab '.$_POST["productname"].' nevű terméket. Ekkor: '.date("Y-m-d h:i:s",$time).'.';
								$breakline = "\n";
								$file = fopen("log.txt", "a+");
								fwrite($file,$string);
								fwrite($file,$breakline);
								fclose($file);
								
							
							
							//log
							
							$conn=new mysqli("localhost","root","","nyilvantartas");
							if($conn->connect_error)
										die("Nem sikerült az adatbázishoz kapcsolódni!");
							
							$sql="INSERT INTO products (name,quantity,fragile,addedby) 
							VALUES ('".$_POST["productname"]."','".$_POST["quantity"]."','".$_POST["isfragile"]."','".$_SESSION["username"]."')";
							$conn->query($sql);
							if(isset($_GET["kivalaszt"])){
							$numberofrows = $_GET["rows"];
							$display = 1;
							}
							$conn->close();
							
							
						
						}
		?>
				
		<?php } 
		?>
		
		
		
		
		
		<?php
			//Level 1 user
			if($_SESSION['role'] == 'level1user'){
				?>
				
				<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
				  <div class="container-fluid">
					<a class="navbar-brand" href="home.php">Nyilvántartás</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
					  <ul class="navbar-nav">
						<li class="nav-item">
						  <a class="nav-link" href="logout.php">Kijelentkezés</a>
						</li>

					  </ul>
					</div>
				  </div>
				</nav>
				
				<p class="dropdown">Sorok száma:</p> 
				<form action="home.php" method="GET" id="displayform">
					<select name="rows" id="rowsid">
					<option href=''value="">megjelenő sorok</option>
					<option href='?rows=osszes'value="osszes">összes</option>
					<option href='?rows=5' value="5">5</option>
					<option href='?rows=10' value="10">10</option>
					<option href='?rows=15' value="15">15</option>
					<option href='?rows=20'value="20">20</option>
					<option href='?rows=50'value="50">50</option>
					
					
					</select>
				</form>
				<p class="dropdown">Rendezés:</p>
				<form action="home.php" method="GET" id="orderform">
					<select name="order" id="orderid">
					<option href=''value="">sorok rendezése</option>
					<option href='?order=ascid' value="ascid">ID növekvő</option>
					<option href='?order=descid' value="descname">ID csökkenő</option>
					<option href='?order=ascname' value="ascname">Név növekvő</option>
					<option href='?rows=descname' value="descname">Név csökkenő</option>
					<option href='?rows=ascdarab'value="ascdarab">Darab növekvő</option>
					<option href='?rows=descdarab'value="descdarab">Darab csökkenő</option>

					
					
					</select>
				</form>
				
				<div id="tabladiv">
				<table id="tablazat" class="table">
				  <thead>
					<tr>
					  <th scope="col"><a href='?order=id&&sort=$sort'>ID</a></th>
					  <th scope="col"><a href='?order=nev&&sort=$sort'>Terméknév</a></th>
					  <th scope="col">Mennyiség</th>
					  <th scope="col">Törékeny</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
						
						
						
						
						if(isset($_GET["rows"])){
							$numberofrows = $_GET["rows"];
							$display = 1;
						}
						$conn=new mysqli("localhost","root","","nyilvantartas");
						
						
						
						
						if(isset($_GET["order"])){
							$ascid = 0;
							$descid = 0;
							$ascname = 0;
							$descname = 0;
							$ascdarab = 0;
							$descdarab = 0;
							$order = $_GET["order"];
							if($order == "ascname")
							{
								$ascname = 1;
							}
							else if($order == "descname")
							{
								$descname = 1;
							}
							else if($order == "ascid")
							{
								$ascid = 1;
							}
							else if($order == "descid")
							{
								$descid = 1;
							}
							
							else if($order == "ascdarab")
							{
								$ascdarab = 1;
							}
							else if($order == "descdarab")
							{
								$descdarab = 1;
							}
						}
									
						if($conn->connect_error)
							die("Nem sikerült az adatbázishoz kapcsolódni!");
						if(isset($_GET["order"]) && $ascname == 1){
							$sql="SELECT * FROM products ORDER BY name ASC";
						}
						else if(isset($_GET["order"]) && $descname == 1){
							$sql="SELECT * FROM products ORDER BY name DESC";
						}
						
						else if(isset($_GET["order"]) && $ascid == 1){
							$sql="SELECT * FROM products ORDER BY id ASC";
						}
						
						else if(isset($_GET["order"]) && $descid == 1){
							$sql="SELECT * FROM products ORDER BY id DESC";
						}
						
						else if(isset($_GET["order"]) && $ascdarab == 1){
							$sql="SELECT * FROM products ORDER BY quantity ASC";
						}
						
						else if(isset($_GET["order"]) && $descdarab == 1){
							$sql="SELECT * FROM products ORDER BY quantity DESC";
						}
						
						
						
						
						
						else{
							$sql="SELECT * FROM products";
						}
						
						$result=$conn->query($sql);
						
						
						
						
						while($row=$result->fetch_assoc())
							{
								print('<tr><td>'.$row["id"].'</td><td>'.$row["name"].'</td><td>'.$row["quantity"].'</td><td>'.$row["fragile"].'</td><td><button onclick="torol('.$row["id"].')">Töröl</button></td></tr>');
									if(isset($_GET["rows"])){
									if($numberofrows!="osszes"){
										if($display==$numberofrows)
										{
										break;
										}
									if(isset($_GET["rows"]))
										{
										$display+=1;
										}
									}
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
				
				
				<form action="home.php" method="post">
					  <div class="form-group">
					  <h1>Termék hozzáadása</h1>
						<label for="exampleFormControlInput1">Terméknév</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="productname" placeholder="terméknév">
						<br>
						<label for="exampleFormControlInput1">Mennyiség (db)</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="quantity" placeholder="123456789">
						<br>
						<label for="exampleFormControlInput1">Törékeny?</label><br>
						<input type="radio" id="fragile" name="isfragile" value="Nem">
							<label for="fragile">Nem törékeny</label><br>
						<input type="radio" id="fragile" name="isfragile" value="Igen">
							<label for="fragile">Törékeny</label><br>
						<br>
						<button id="hozzaadbutton" type="submit" name="hozzaad" class="btn btn-warning">Hozzáad</button>
					  </div>
					  
					</form>
					
					<?php

						if(isset($_POST["hozzaad"]))
						{
							//log
								//$string =$_POST["productname"];
								$time = time();
								$string = ''.$_SESSION["username"].' hozzáadott '.$_POST["quantity"].' darab '.$_POST["productname"].' nevű terméket. Ekkor: '.date("Y-m-d h:i:s",$time).'.';
								$breakline = "\n";
								$file = fopen("log.txt", "a+");
								fwrite($file,$string);
								fwrite($file,$breakline);
								fclose($file);
								
							
							
							//log
							
							$conn=new mysqli("localhost","root","","nyilvantartas");
							if($conn->connect_error)
										die("Nem sikerült az adatbázishoz kapcsolódni!");
							
							$sql="INSERT INTO products (name,quantity,fragile,addedby) 
							VALUES ('".$_POST["productname"]."','".$_POST["quantity"]."','".$_POST["isfragile"]."','".$_SESSION["username"]."')";
							$conn->query($sql);
							if(isset($_GET["kivalaszt"])){
							$numberofrows = $_GET["rows"];
							$display = 1;
							}
							$conn->close();
							
							
						
						}
		?>
		<?php } 
		?>
		
		<?php
			//Level 2 user
			if($_SESSION['role'] == 'level2user'){
				?>
				
				<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
				  <div class="container-fluid">
					<a class="navbar-brand" href="home.php">Nyilvántartás</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
					  <ul class="navbar-nav">
						<li class="nav-item">
						  <a class="nav-link" href="logout.php">Kijelentkezés</a>
						</li>

					  </ul>
					</div>
				  </div>
				</nav>
				
				<p class="dropdown">Sorok száma:</p> 
				<form action="home.php" method="GET" id="displayform">
					<select name="rows" id="rowsid">
					<option href=''value="">megjelenő sorok</option>
					<option href='?rows=osszes'value="osszes">összes</option>
					<option href='?rows=5' value="5">5</option>
					<option href='?rows=10' value="10">10</option>
					<option href='?rows=15' value="15">15</option>
					<option href='?rows=20'value="20">20</option>
					<option href='?rows=50'value="50">50</option>
					
					
					</select>
				</form>
				<p class="dropdown">Rendezés:</p>
				<form action="home.php" method="GET" id="orderform">
					<select name="order" id="orderid">
					<option href=''value="">sorok rendezése</option>
					<option href='?order=ascid' value="ascid">ID növekvő</option>
					<option href='?order=descid' value="descname">ID csökkenő</option>
					<option href='?order=ascname' value="ascname">Név növekvő</option>
					<option href='?rows=descname' value="descname">Név csökkenő</option>
					<option href='?rows=ascdarab'value="ascdarab">Darab növekvő</option>
					<option href='?rows=descdarab'value="descdarab">Darab csökkenő</option>

					
					
					</select>
				</form>
				
				<div id="tabladiv">
				<table id="tablazat" class="table">
				  <thead>
					<tr>
					  <th scope="col"><a href='?order=id&&sort=$sort'>ID</a></th>
					  <th scope="col"><a href='?order=nev&&sort=$sort'>Terméknév</a></th>
					  <th scope="col">Mennyiség</th>
					  <th scope="col">Törékeny</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
						
						
						
						
						if(isset($_GET["rows"])){
							$numberofrows = $_GET["rows"];
							$display = 1;
						}
						$conn=new mysqli("localhost","root","","nyilvantartas");
						
						
						
						
						if(isset($_GET["order"])){
							$ascid = 0;
							$descid = 0;
							$ascname = 0;
							$descname = 0;
							$ascdarab = 0;
							$descdarab = 0;
							$order = $_GET["order"];
							if($order == "ascname")
							{
								$ascname = 1;
							}
							else if($order == "descname")
							{
								$descname = 1;
							}
							else if($order == "ascid")
							{
								$ascid = 1;
							}
							else if($order == "descid")
							{
								$descid = 1;
							}
							
							else if($order == "ascdarab")
							{
								$ascdarab = 1;
							}
							else if($order == "descdarab")
							{
								$descdarab = 1;
							}
						}
									
						if($conn->connect_error)
							die("Nem sikerült az adatbázishoz kapcsolódni!");
						if(isset($_GET["order"]) && $ascname == 1){
							$sql="SELECT * FROM products ORDER BY name ASC";
						}
						else if(isset($_GET["order"]) && $descname == 1){
							$sql="SELECT * FROM products ORDER BY name DESC";
						}
						
						else if(isset($_GET["order"]) && $ascid == 1){
							$sql="SELECT * FROM products ORDER BY id ASC";
						}
						
						else if(isset($_GET["order"]) && $descid == 1){
							$sql="SELECT * FROM products ORDER BY id DESC";
						}
						
						else if(isset($_GET["order"]) && $ascdarab == 1){
							$sql="SELECT * FROM products ORDER BY quantity ASC";
						}
						
						else if(isset($_GET["order"]) && $descdarab == 1){
							$sql="SELECT * FROM products ORDER BY quantity DESC";
						}
						
						
						
						
						
						else{
							$sql="SELECT * FROM products";
						}
						
						$result=$conn->query($sql);
						
						
						
						
						while($row=$result->fetch_assoc())
							{
								print('<tr><td>'.$row["id"].'</td><td>'.$row["name"].'</td><td>'.$row["quantity"].'</td><td>'.$row["fragile"].'</td></tr>');
									if(isset($_GET["rows"])){
									if($numberofrows!="osszes"){
										if($display==$numberofrows)
										{
										break;
										}
									if(isset($_GET["rows"]))
										{
										$display+=1;
										}
									}
								}

							}
									
						print("</table>");
						$conn->close();
						?>
				  </tbody>
				</table>
				</div>
				
				
				
				
		<?php } 
		?>
		
		
		
		
			
			
	</body>
</html>
<?php }else
	header("Location: /index.php");
 ?>
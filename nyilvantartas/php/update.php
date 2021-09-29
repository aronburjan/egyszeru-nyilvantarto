<?php

	$conn=new mysqli("localhost","root","","nyilvantartas");
	if($conn->connect_error)
		die("Nem sikerült az adatbázishoz kapcsolódni!");
				
	$sql="UPDATE users SET role = '".$_GET["updaterole"]."' WHERE id = '".$_GET["id"]."'";				
	$conn->query($sql);
	$conn->close();
				



?>
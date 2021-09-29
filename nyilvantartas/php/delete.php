<?php
	$conn=new mysqli("localhost","root","","nyilvantartas");
	if($conn->connect_error)
		die("Nem sikerült az adatbázishoz kapcsolódni!");
				
	$sql="DELETE FROM users WHERE id=".$_GET["id"];
	$conn->query($sql);
	$conn->close();





?>
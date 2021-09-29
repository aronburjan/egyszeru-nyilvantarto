<?php
	session_start();
	if(isset($_SESSION['username']) && isset($_SESSION['id'])){ 
	session_start();
	$conn=new mysqli("localhost","root","","nyilvantartas");
	$time = time();
	$string = ''.$_GET["id"].' azonosítójú terméket törölték. Ekkor: '.date("Y-m-d h:i:s",$time).'.';
	$breakline = "\n";
	$file = fopen("log.txt", "a+");
	fwrite($file,$string);
	fwrite($file,$breakline);
	fclose($file);
	if($conn->connect_error)
		die("Nem sikerült az adatbázishoz kapcsolódni!");
	//$deleteusrename = "SELECT FROM products WHERE username=".$_GET["username"];
	//if($_GET['username'] == $deleteusrename{		
	$sql="DELETE FROM products WHERE id=".$_GET["id"];
	//}
	$conn->query($sql);
	$conn->close();
	}





?>
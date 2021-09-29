<?php
session_start();
ob_start();
	//nem tudtam includeolni
	$sname = "localhost";
	$uname = "root";
	$password = "";

	$db_name = "nyilvantartas";

	$conn = mysqli_connect($sname, $uname, $password, $db_name);

	if(!$conn)
	{
		echo "Nem sikerült csatlakozni!";
		exit();
	}

	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){
		function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		$username = test_input($_POST['username']);
		$password = test_input($_POST['password']);
		$role = test_input($_POST['role']);
		
		if(empty($username)){
			header("Location: ../index.php?error=Adjon meg felhasználónevet");
		}else if (empty($password))
		{
			header("Location: ../index.php?error=Adjon meg jelszót");
		}else{
			$password = md5($password);
			
			$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) === 1){
				$row = mysqli_fetch_assoc($result);
				if($row['password'] === $password && $row['role'] == $role){
					
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['role'] = $row['role'];
					$_SESSION['username'] = $row['username'];
					header("Location: ../php/home.php");
				}
				else{
					header("Location: ../index.php?error=Hibás felhasználónév vagy jelszó vagy jogosultság!");
				}
			}
			else{
				header("Location: ../index.php?error=Hibás felhasználónév vagy jelszó vagy jogosultság!");
				}

			
		}
	}
	else{
		header("Location: ../index.php");
	}
?>
<?php 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=Please enter a Username");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Please enter a Password");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE usersUsername='$uname' AND UsersPassword='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['usersUsername'] === $uname && $row['usersPassword'] === $pass) {
            	$_SESSION['usersUsername'] = $row['usersUsername'];
            	$_SESSION['usersId'] = $row['usersId'];
            	header("Location: dashboard.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorrect Username or Password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorrect Username or Password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
?>
<?php

//default username and password
$USER_NAME="admin";
$USER_PASSWORD="qifan123";

if(isset($_POST)){
	$user_name=$_POST['user_name'];
	$password=$_POST['password'];
}

if($USER_NAME==$user_name){
	if($USER_PASSWORD==$password){
		echo "Login Success";
		echo"<h1> Welcome to the Page $user_name! <br>";
		echo "<h2> Click Start to Start the Game!<h2>";
		echo '<form action="game.php"> <input type="submit" value="Log In" name="submit">';

	}else{
		echo "Wrong Password";
	}
}else{
	echo "Wrong User Name";
}




?>
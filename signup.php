<?php 
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$user_name = $_POST['user_name'];
	$password  = $_POST['password'];

	if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
	{
		$user_id = random_num(20);
		$query   = "insert into endusers (user_id,user_name,password) values ('$user_id','$user_name','$password')";

		mysqli_query($con, $query);
		header("Location:login.php");
		die;
	}
	else
	{
		echo "Please enter valid credentials!";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SignUp</title>
</head>
<body>
	<style type="text/css">
		#text
		{
			height: 25px;
			border-radius: 8px;
			padding: 4px;
			border: solid thin #aaa;
			width: 100%;
		}
		#h2
		{  
		    text-align: center;  
		    color: #277582;  
		    padding: 20px;  
		} 

		#button
		{
			padding: 10px;
			width: 100px;
			color: white;
			background-color: lightblue;
			border: none;
		}

		#box
		{
			background-color: lightpink;
			margin: auto;
			width: 300px;
			padding: 20px;
		}
	</style>

	<div id = "box">
		<form method="post">
			<div style="font-size: 20px; margin: 10px; color: white;"> <h2>SignUp</h2> </div>

			<label for="name"><b>User Name</b></label>
			<input id="text" type="text" name="user_name"><br><br>

			<label for="name"><b>Password</b></label>
			<input id="text" type="password" name="password"><br><br>
			
			<input id="button" type="submit" value="signup"><br><br>
			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
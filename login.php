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
		$query   = "select * from endusers where user_name = '$user_name' limit 1";

		$output  = mysqli_query($con, $query);
		if($output)
		{
			if($output && mysqli_num_rows($output)>0)
			{
				$details = mysqli_fetch_assoc($output);
				if($details['password'] === $password)
				{
					$_SESSION['user_id'] = $details['user_id'];
					header("Location:index.php");
					die;
				}
			}
		}
		echo "Invalid user_name or password!";
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
	<title>Login</title>
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

		#button
		{
			padding: 10px;
			width: 100px;
			color: white;
			background-color: lightblue;
			border: none;
			border-radius: 8px;
		}

		#box
		{
			background-color: lightpink;
			margin: auto;
			width: 500px;
			/*height: 100%;*/
			padding: 20px;
			border-radius: 5px;
		}
		#h2
		{  
		    text-align: center;  
		    color: #277582;  
		    padding: 20px;  
		} 
		#label
		{  
		    color: #08ffd1;  
		    font-size: 17px;  
		}  
	</style>

	<div id = "box">
		<form method="post">
			<div style="font-size: 20px; margin: 10px; color: white;"> <h2>Login</h2> </div>
			<label for="name"><b>User Name</b></label>
			<input id="text" type="text" name="user_name" ><br><br>

			<label for="pwd"><b>Password</b></label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="login"><br><br>
			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>
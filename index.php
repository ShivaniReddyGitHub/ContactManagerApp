<?php 

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	if(!empty($name) && !empty($phone) && !empty($email) && !is_numeric($user_name))
	{
		$user_id = random_num(20);
		$query   = "insert into details (user_id,name,phone,email) values ('$user_id','$name','$phone','$email')";

		mysqli_query($con, $query);
		header("Location:final.php");
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
	<title>Add Contacts</title>
</head>
<body>
	<style type="text/css">
		#body  
		{  
		    margin: 0;  
		    padding: 0;  
		    background-color:#6abadeba;  
		    font-family: 'Arial';  
		}
		#login
		{  
		        width: 382px;  
		        overflow: hidden;  
		        margin: auto;  
		        margin: 20 0 0 450px;  
		        padding: 80px;  
		        /*background: #23463f;*/  
		        border-radius: 15px ;  
		          
		}
		#h2
		{  
		    text-align: center;  
		    color: #277582;  
		    padding: 20px;  
		} 
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
		 
	</style>
	<a href="logout.php">Logout</a>
	<div id = "box">
		<form id="login" method="post">
			<div style="font-size: 20px; margin: 10px; color: white;"> <h2>Add Contacts<h2> </div>

			<label for="name"><b>Name</b></label>
			<input id="text" type="text" placeholder="Name" name="name"><br><br>

			<label for="tel"><b>Phone Number</b></label>
			<input id="text" type="tel" placeholder="Ph No" name="phone"><br><br>

			<label for="email"><b>Email</b></label>
			<input id="text" type="email" placeholder="Email" value="" name="email"><br><br>
			<input id="button" type="submit" value="Save"><br><br> 
			<a href="logout.php">Click to Logout</a><br><br>
		</form>
	</div>

	<br>
</body>
</html>
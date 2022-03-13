<html>
<head>
</head>
<body>
<h2> Thank You for entering your details, Your details have been stored in the database.</h2>
<a href="Logout.php">Logout Page</a>
<h1>
<table border="2" style="width:40%; float:left;"> 
<tr>
	<th> name </th>
	<th> phone</th>
	<th> email</th>	
</tr>
<?php

include("connection.php");
error_reporting(0);

$query = "select * from details";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);


/*echo $result['name']." ".$result['phone']." ".$result['email'];*/
if($total!=0)
{
	while($result = mysqli_fetch_assoc($data))
	{
		echo "
		<tr>
			<td>".$result['name']."</td>
			<td>".$result['phone']."</td>
			<td>".$result['email']."</td>
		</tr>
		";
	}
}
else
{
	echo "No records found";
}

?>
</table>
</h1>
</body>
</html>

<?php
session_start();
$_SESSION['logged_in1']='false';
?>
<html>
	<head>
		
		<title> Admin login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="w3.css">
		<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<body>
<div class="login-box">
		<img src="images/usericon.jpg" class="avatar">
		<h1> ADMIN</h1>
		<form method='post'>
	
		<input type="text" name="id"  placeholder="Enter username " required>
			<br>
		<input type="password" name="password" placeholder="Password" required><br>
			
		<input type="submit" name="login" value="Login">
		
		</form>
      <?php
$servername = "localhost";
$username = "hemantha";
$password = "123";
$dbname ="student";
$conn = mysqli_connect($servername, $username, $password,$dbname);
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
     if(isset($_POST['login']))
{
$Username=$_POST['id'];
$password1=md5($_POST['password']);
$query_check="select Username from admin where Username ='$Username' and password='$password1';";
$result=mysqli_query($conn,$query_check);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$_SESSION['logged_in1']='true';
	    $newurl='delete.php';
	    header('Location:' .$newurl);
    }

}

?>
</body>
</html>
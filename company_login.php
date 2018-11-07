<?php
session_start();
?>
<html>
	<head>
		<title> Company login</title>
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

	<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s2">
      <a href="indexx.html" class="w3-button w3-block w3-black" >HOME</a>
    </div>
   
    <div class="w3-col s2">
      <a href="student_login.php" class="w3-button w3-block w3-black">STUDENT-LOGIN</a>
    </div>
    <div class="w3-col s2">
      <a href="signup.php" class="w3-button w3-block w3-black">STUDENT-SIGNUP</a>
	</div>
	<div class="w3-col s2">
      <a href="company_signup.php" class="w3-button w3-block w3-black">COMPANY-SIGNUP</a>
    </div>
   
  </div>
</div>
		<div class="login-box">
		<img src="images/usericon.jpg" class="avatar">
		<h1> LOGIN HERE</h1>
		<form method='post'>
	
		<input type="text" name="company_id"  placeholder="Enter Company ID " required>
			<br>
		<input type="password" name="password" placeholder="Password" required><br>
			
		<input type="submit" name="login" value="Login">
		
		</form>
      </div>
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
     if(isset($_POST['login'])!='')
{
$company_id=$_POST['company_id'];
$password=$_POST['password'];
if(!($company_id==''|| $password=='')){
$query_check="select Company_name from comany_login where Company_id ='$company_id' and password='$password';";
$result=mysqli_query($conn,$query_check);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if($row)
	{  $company_names=$row['Company_name'];
		$_SESSION["company_name"] = $company_names;
	    $_SESSION["company_id"] = $company_id;
		$newurl='company_profile.php';
	    header('Location:' .$newurl);
    }
else if(!$row)
	{
		echo 'incorrect';
	}
}
else{
	echo 'pls enter both fields';
}}
?>
</body>
</html>
<?php
session_start();
?>
<html>
	<head>
		<title>Student login</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s2">
      <a href="indexx.html" class="w3-button w3-block w3-black" >HOME</a>
    </div>
   
    <div class="w3-col s2">
      <a href="company_login.php" class="w3-button w3-block w3-black">COMPANY-LOGIN</a>
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
		<input type="text" name="usn" placeholder="Enter your USN" required>
			<br>
		<input type="password" name="password" placeholder="Password " required>

			<br>
		
		<input type="submit" name="login" value="login">
		
		</form>
</div>
	<?php
		$servername = "localhost";
$username = "hemantha";
$password = "123";
$dbname ="student";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	
if(isset($_POST['login'])!='')
{
$usn=$_POST['usn'];
//$password=($_POST['password']);
$password =md5($_POST['password']);

//echo $password;
//$apassword=md5($password);
$query_check="select name from candidate where usn='$usn' and password='$password'";
$result=mysqli_query($conn,$query_check);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if($row)
	{$_SESSION['usn']=$usn;
	 $_SESSION['name']=$row['name'];
	   $newurl='student_profile.php';
	    header('Location:'.$newurl);
        //echo $_SESSION['name'];
    }
else if(!$row)
	{
		echo '<script>alert("Wrong credentials");</script>';
	}
}		?>
	</body>
</html>
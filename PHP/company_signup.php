<html>
	<head>
		<title> Company signup</title>
		<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/form.css">
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
      <a href="./indexx.html" class="w3-button w3-block w3-black" >HOME</a>
    </div>
   
    <div class="w3-col s2">
      <a href="./company_login.php" class="w3-button w3-block w3-black">COMPANY-LOGIN</a>
    </div>
    <div class="w3-col s2">
      <a href="./student_login.php" class="w3-button w3-block w3-black">STUDENT-LOGIN</a>
	</div>
	<div class="w3-col s2">
      <a href="./signup.php" class="w3-button w3-block w3-black">STUDENT-SIGNUP</a>
    </div>
   
  </div>
</div>
	<div class="wrap">
		<h2> SIGNUP HERE</h2>
<form method="POST">
<input type ="text" name="name" placeholder="Company Name" required><br>


<input type ="text" name="company_id" placeholder="Company ID" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<input type ="submit" name="signup" value="signup"><br>
<input type ="button" name="login" value="login" onclick="location.href='company_login.php';" >

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
	
if(isset($_POST['signup'])!='')
{
$name=$_POST['name'];
$password=$_POST['password'];
$company_id=$_POST['company_id'];
$query_check="select Company_id from comany_login where Company_id='$company_id';";
$result=mysqli_query($conn,$query_check);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if(!$row)
	{	
$query="Insert into comany_login(Company_name,Company_id,password) values('$name','$company_id','$password');";
if(mysqli_query($conn,$query))
   {
echo 'REGISTERED..';
	$newurl='company_login.php';
	header('Location:' .$newurl);
    }

else
{
echo 'error: ' .mysqli_error($conn);
} 
	}
	else
	{
		echo 'already registered company';
	}
}
?>
</body>
</html>

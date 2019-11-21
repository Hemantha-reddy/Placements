<html>
	<head>
	<Style>

#fil{
    padding: 10px;
    background: teal; 
    display: table;
     }


	</style>
		<title>student-signup</title>
		<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  
<script src="./css/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<body>

<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s2">
      <a href="./indexx.html" class="w3-button w3-block w3-black" >HOME</a>
    </div>
   
    <div class="w3-col s2">
      <a href=".company_login.php" class="w3-button w3-block w3-black">COMPANY-LOGIN</a>
    </div>
    <div class="w3-col s2">
      <a href="./student_login.php" class="w3-button w3-block w3-black">STUDENT-LOGIN</a>
	</div>
	<div class="w3-col s2">
      <a href="./company_signup.php" class="w3-button w3-block w3-black">COMPANY-SIGNUP</a>
    </div>
   
  </div>
</div>
	<div class="wrap">
<h2> SIGNUP</h2>
<form method="POST" enctype="multipart/form-data" >
	<input type="text" name="usn" placeholder="Your Username" required ><br>
<input type ="text" name="name" placeholder="Your Full name" required ><br>
<input type="text" name="email" placeholder="Valid Email" required><br>
<input type ="text" name="branch" placeholder="Your branch" required><br>
<input type="password" name="password" placeholder="Password" required >
<br>

<input type ="text" name="phone" placeholder="Your Phone no" required ><br><br>
<input type="file" name="resume" placeholder="Resume " required size="60" id="files">
	<br>
<input type ="submit" name="signup" value="Signup"><br>


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
$usn=strtoupper($_POST['usn']);
$name=strtoupper($_POST['name']);
$email=strtoupper($_POST['email']);
$branch=strtoupper($_POST['branch']);
$password =trim($_POST['password']);


if(isset($_FILES['resume']))
{
	$filename="resumes/".$usn;

	if(move_uploaded_file($_FILES['resume']['tmp_name'],$filename.".pdf"))
	{
  echo "uploaded";
	}
else
{
 echo	$_FILES['resume']['error'];
}
}
//$password=$_POST['password'];
$phone=$_POST['phone'];
$query_check="select usn from candidate where usn='$usn';";
$result=mysqli_query($conn,$query_check);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if(!$row)
	{	
$query="Insert into candidate(usn,name,email,password,phone,branch) values('$usn','$name','$email',md5('$password'),'$phone','$branch');";
if(mysqli_query($conn,$query))
   {
	$newurl='student_login.php';
	header('Location:' .$newurl);
    }

else
{
echo 'error: ' .mysqli_error($conn);
} 
	}
	else
	{
		echo "<script>alert('already registered user');</script>";
	}
}
?>
<script>
$('#password, #repassword').on('keyup', function () {
  if ($('#password').val() == $('#repassword').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>
</body>
</html>

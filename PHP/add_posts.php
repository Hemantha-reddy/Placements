<?php
session_start();
$value = array(4);
if($_SESSION['logged_in']=='false'){
	echo '<script> alert("Please login first");
	 window.location.href="./student_login.php";</script>';
}
?>
<html>
	<head>
	<style>
p{
	font-family: 'Poor story',cursive;
	font-size:'30px';
}


	</style>
	<TITLE>
	Posts
	</title>
	<link href="./fonts.css" rel="stylesheet">
	<link rel="stylesheet" href="./materialize.min.css">
<!--Import Google Icon Font-->
<link href="./icons.css" rel="stylesheet">
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
</head>
<nav class="nav-wrapper black">
	<div class="container">
		<a href="#" class="brand-logo"> <img class="responsive-img" id="logo" src="./images/pes_logo.png"/> </a>
        <a href="#" class="sidenav-trigger" data-target="mobile-links">
			<i class="material-icons">menu</i>
		</a>

	<ul class="right hide-on-med-and-down"> 
		<li><a href="./indexx.html">Home</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#">Contact</a></li>
		<li><a href="./student_profile.php">Profile</a></li>
		<li><a href="./redirect_page.php">Logout</a></li>
	</ul>
	</div>
</nav>
<ul class="sidenav" id="mobile-links">
<li><a href="./indexx.html">Home</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#">Contact</a></li>
		<li><a href="./student_profile.php">Profile</a></li>
		<li><a href="./redirect_page.php">Logout</a></li>
</ul>
<body>
	<div class="container" align="Center">
<h2 id="intro"> </h2>	<BR>
<form method="post" action="#">
 <h5><br> Title </h5><input type="text" name="title" style="width:400px;" ><br>
<h5><br>Please share your experience below</h5>	
			<br><textarea class="materialize-textarea" name="description" id="ta2"></textarea>
			<script>
				$('#ta2').val('New Text');
				M.textareaAutoResize($('#ta2'));
				</script><br><br>
				<input type="submit" class='btn' value="Post" id="Posted">
</form>	

<?php
$servername = "localhost";
$username = "hemantha";
$password = "123";
$dbname ="student";		
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn)
{   
    die("Connection failed: " . mysqli_connect_error());
}
$query1="select title,description from posts;";
$result1=mysqli_query($conn,$query1);
$img=0;
while($row1=mysqli_fetch_array($result1))

{echo '<br><div class="row">
	<div class="col s12 m6"><span>
	<div class="card">
	  <div class="card-image waves-effect waves-block waves-light">
	  <img class="activator" src="./images/Experience';
	  echo $img;
	  echo '.jpg">
	  </div>
	  <div class="card-content">
	  <span class="card-title activator">'; 
	  echo $row1['title'];
	  echo '</span>
		</div>
		<div class="card-reveal">
	  <span class="card-title grey-text text-darken-4">';
	  echo $row1['title'];
	  echo '<i class="material-icons right">close</i></span>
		<h5><p id="experience">';
		  echo $row1['description'];
		  echo '</p></h5></div>
   </div>
   </div>   
  </div>';
  $img=$img+1;
  if($img==6)
  {
$img=0;
  }
}

if(isset($_POST['description']))	
{    $usn1=$_SESSION['usn'];
	$title=$_POST['title'];
	$description=$_POST['description'];
 //echo $description;
 //echo $title;
	$query="Insert into posts values('$usn1','$title','$description');";
 //echo 'hiiii';
	$result=mysqli_query($conn,$query);
 
    if($result)
	{ echo '<script> window.alert("Posted");</script>';
$page = $_SERVER['PHP_SELF'];
$sec = "1";
    
	}	
}
?>



<script src="./jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="./materialize.min.js"></script>
<script>
$(document).ready(function(){
	$('.sidenav').sidenav();
})	
</body>	
</html>

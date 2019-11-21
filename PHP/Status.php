<?php
session_start();
if($_SESSION['logged_in']=='false'){
	echo '<script> alert("Please login first");
	 window.location.href="./student_login.php";</script>';
}
?>
<html>
	<head><TITLE>
	Profile
	</TITLE>
		<style>

       #tables_set{
		width : 700px;	
            height : 400px;	
			padding: 15px;
    text-align: left;
	   }
	  
#tables_set{
		width : 700px;	
            height : 400px;	
			padding: 15px;
    text-align: left;
	   }
	  #table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

 td,  th {
    border: 1px solid #ddd;
    padding: 8px;
}

 tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

 th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

			</style>
	<link rel="stylesheet" href="css/materialize.min.css">
<!--Import Google Icon Font-->
<link href="css/icons.css" rel="stylesheet">
</head>
<nav class="nav-wrapper black">
	<div class="container">
		<a href="#" class="brand-logo"> <img class="responsive-img" id="logo" src="./images/pes_logo.png"/> </a>
        <a href="#" class="sidenav-trigger" data-target="mobile-links">
			<i class="material-icons">menu</i>
		</a>

	<ul class="right hide-on-med-and-down"> 
		<li><a href="./indexx.html">Home</a></li>
		<li><a href="https://pesitsouth.pes.edu/about/">About</a></li>
		<li><a href="https://pesitsouth.pes.edu/contact/">Contact</a></li>
        <li><a href="./student_profile.php">Profile</a></li>
		<li><a href="./redirect_page.php">Logout</a></li>
	</ul>
	</div>
</nav>
<ul class="sidenav" id="mobile-links">
<li><a href="./indexx.html">Home</a></li>
		<li><a href="https://pesitsouth.pes.edu/about/">About</a></li>
		<li><a href="https://pesitsouth.pes.edu/contact/">Contact</a></li>
        <li><a href="./student_profile.php">Profile</a></li>
		<li><a href="./redirect_page.php">Logout</a></li>
</ul>
	
	<body>
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
$usn=$_SESSION['usn'];
$query_check="select Company_id from company_apply where usn='$usn';";
$result=mysqli_query($conn,$query_check);
if($_SESSION['statuss']=='close')
		{
			echo "<h5 align='center'>You have got placed so you have been removed from all applied companies</h5>";
		}
		else if($_SESSION['statuss']=='open'){
			if(mysqli_num_rows($result)==0)
	{
		echo "<h5 align='center'>You have not applied for any companies</h5>";
	}
	else{
echo "<div align='center'><h5> Companies applied</h4><br>";
echo " <div id=\"tables_set\" align=\"center\">";
	echo "<table class=\" bordered highlight\" border=\"1\">
	<thead>
	<tr>
	<th>USN</th>
	<th>COMPANY ID</th>
	<th>Company name</th>
	</tr>
	</thead>";
	
	if(mysqli_num_rows($result)==0)
	{
		echo "<h5 align='center'>You have not applied for any companies</h5>";
	}
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{   
		$cid=$row['Company_id'];
		$QUERY4="SELECT Company_name from comany_login where Company_id='$cid';";
		$result4=mysqli_query($conn,$QUERY4);
		$row4 = mysqli_fetch_array($result4);
		echo "<tbody>";	
		 echo "<tr>";
		 echo "<td>" . strtoupper($usn) . "</td>";
		 echo "<td>" . strtoupper($row['Company_id']) . "</td>";
		 echo "<td>" . strtoupper($row4['Company_name']) . "</td>";
		 echo "</tr>";
		}
	
	echo "</tbody>";
	echo "</table>"; 
	echo "</div>";	
	echo "</div>";}}
 ?>
 <script src="JS/jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="JS/materialize.min.js"></script>

<script>
$(document).ready(function(){
	$('.sidenav').sidenav();
})
	</script>
	</body>
</html>

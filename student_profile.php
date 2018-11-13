<?php
session_start();
$usns=trim($_SESSION['usn']);
$usns=strtoupper($usns);
$status='';

?>
<html>
<head>
		<style>
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
nav {
    height: 30px;
	line-height: 30px;

}
.card {
 width:300px;
}

.navbar .container .navbar-brand {
   
    font-size: 60px;
    margin: 8px 0;
}
p{
	font-family: 'Poor story',cursive;
	font-size:'30px';
}
</style>
<link href="./fonts.css" rel="stylesheet">
<link rel="stylesheet" href="./materialize.min.css">
<!--Import Google Icon Font-->
<link href="./icons.css" rel="stylesheet">
</head>
<nav><div class="nav-wrapper black">
	<div class="container">
	<a href="#" class="brand-logo"> <img class="responsive-img" id="logo" src="./pes_logo.png"/> </a>
        <a href="#" class="sidenav-trigger" data-target="mobile-links">
			<i class="material-icons">menu</i>
		</a>

	<ul class="right hide-on-med-and-down"> 
		<li><a href="./indexx.html">Home</a></li>
		<li><a href="https://pesitsouth.pes.edu/about/">About</a></li>
		<li><a href="https://pesitsouth.pes.edu/contact/">Contact</a></li>
		<li><a href="./add_posts.php">Post</a></li>
		<li><a href="./Status.php">Status</a></li>
		<li><a href="./statistics.php">Statistics</a></li>
		<li><a href="./redirect_page.php">Logout</a></li>
	</ul>
	</div>
	</div>
</nav>
<ul class="sidenav" id="mobile-links">
<li><a href="./indexx.html">Home</a></li>
		<li><a href="https://pesitsouth.pes.edu/about/">About</a></li>
		<li><a href="https://pesitsouth.pes.edu/contact/">Contact</a></li>
		<li><a href="./add_posts.php">Post</a></li>
        <li><a href="./Status.php">Status</a></li>
		<li><a href="./statistics.php">Statistics</a></li>
		<li><a href="./redirect_page.php">Logout</a></li>
</ul>
	<body>
	<div class="container" align="center" >
	
	<H1 class="flow-text" id="para"></H1>
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
$query6="select name,usn,email,phone,status,branch from candidate where usn='$usns';";
$result6=mysqli_query($conn,$query6);

if($row6 = mysqli_fetch_array($result6))
{
echo '<br><div class="row">
	<div class="col s12 m6"><span>
	<div class="card">
	  <div class="card-image waves-effect waves-block waves-light">
	  <img class="activator" src="profile.jpg">
	  </div>
	  <div class="card-content">
	  <span class="card-title activator">Profile</span>
		</div>
		<div class="card-reveal">
	  <span class="card-title grey-text text-darken-4">Profile<i class="material-icons right">close</i></span>
		<h5><p>';
		  echo "Name: ".$row6['name'];
		  echo '<br>';
		  echo "Usn: ".$row6['usn'];
		  echo '<br>';
		  echo "Branch: ".$row6['branch'];
		  echo '<br>';
		  echo "Email: ".$row6['email'];
		  echo '<br>';
		  echo "Phone: ".$row6['phone'];
		  echo '<br>';
		  echo "Status: ".$row6['status'];
		  echo '</p></h5></div>
   </div>
   </div>   
  </div>';
}
$query5="select status from candidate where usn='$usns';";
$result5=mysqli_query($conn,$query5);
$row5 = mysqli_fetch_array($result5);
if($row5['status']=='open'){
	$status='open';}
	else if($row5['status']=='close')
{
	$status='close';
	echo '<script> alert("You have already been placed. You cannot apply anymore");</script>';
}
echo '<h5>Companies arriving this month:</h5><br>';
echo "<table border='1'>
<tr>
<th>&nbsp ID</th>
<th> Name</th>
<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspJob description</th>
<th>Eligibility</th>
</tr>";

$query="select Company_id,job_description,eligibility from company;";
$result=mysqli_query($conn,$query);	
while($row = mysqli_fetch_array($result))
{$company_id=$row['Company_id'];
 $querys="select Company_name from comany_login where Company_id='$company_id';";
 $result1=mysqli_query($conn,$querys);
 $row1=mysqli_fetch_array($result1);
 if($row1)
    {
	 echo "<tr>";
	 echo "<td>" . $row['Company_id'] . "</td>";
	 echo "<td>" . $row1['Company_name'] . "</td>";
	 echo "<td>" . $row['job_description'] . "</td>";
	 echo "<td>" . $row['eligibility'] . "</td>";
	 echo "</tr>";
    }
}
echo "</table>"; 


		?>
		<br>
<div align="center">
		<form method="post">
		    <h6 class="flow-text">Enter the company id </h6>
          <input name="company_id" type="text" class="validate" style="width:130px;" required><br><br>
		  <h6 class="flow-text">Enter your skill sets</h6>
		  <input name="skills" type="text" class="validate" style="width:900px;" required><br><br>
		  <h6 class="flow-text">Enter your CGPA</h6>
		  <input name="CGPA" type="text" class="validate" style="width:130px;" required><br><br>
    
			&nbsp&nbsp<input type="submit" name="submit" class="btn" value="apply" id="apply">
			
</div>
		</form>
		<?php
	if($row5['status']=='open')
	{
		
	if(isset($_POST['company_id'])!="")
	{	//$msg="";
		$Company_ids=$_POST['company_id'];
		$skills=$_POST['skills'];
		$CGPA=$_POST['CGPA'];
    if(!$Company_ids==""){
		$query_new1="select usn,Company_id from company_apply where Company_id='$Company_ids' and usn='$usns';";
	    $result_new1=mysqli_query($conn,$query_new1);
	   if($row_new1=mysqli_fetch_array($result_new1))	
		{
         echo '<script>alert("You have already registered for this company");</script>';
		}
		
	   else if (!$row_new1=mysqli_fetch_array($result_new1))
	   {$query_new="select Company_name,Company_id from comany_login where Company_id='$Company_ids';";
	    $result_new=mysqli_query($conn,$query_new);
		$row_new=mysqli_fetch_array($result_new);	
		  if($row_new)
			{
		 $branch=strtoupper($usns[5].$usns[6]);
		 $query2="Insert into company_apply values('$Company_ids','$usns','$branch','$skills',$CGPA);";
	     $result2=mysqli_query($conn,$query2);
	  if($result2)
	 {
		 echo "<script>window.alert('Applied')</script>";
	 }
	 
			}
			else {
				echo "<script>window.alert('Enter a valid company id')</script>";
			 }	
	}
}}}
else if ($row5['status']=='close')
{echo "<script> document.getElementById('apply').disabled = \"true\";
	</script>;";
	}
		?>
		
	</body>
	<script src="./jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="./materialize.min.js"></script>
	<script>
$(document).ready(function(){
	$('.sidenav').sidenav();
})
</script>
</html>
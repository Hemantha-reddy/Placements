<?php
session_start();
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
	   th {
    background-color: #3f51b5;
    color: white;
}

	   table.highlight tbody tr:hover {
    background-color: #69f0ae  !important;
}

			</style>
	<link rel="stylesheet" href="./materialize.min.css">
<!--Import Google Icon Font-->
<link href="./icons.css" rel="stylesheet">
</head>
<nav class="nav-wrapper indigo">
	<div class="container">
		<a href="#" class="brand-logo"> <img class="responsive-img" id="logo" src="./pes_logo.png"/> </a>
        <a href="#" class="sidenav-trigger" data-target="mobile-links">
			<i class="material-icons">menu</i>
		</a>

	<ul class="right hide-on-med-and-down"> 
		<li><a href="./indexx.html">Home</a></li>
		<li><a href="https://pesitsouth.pes.edu/about/">About</a></li>
		<li><a href="https://pesitsouth.pes.edu/contact/">Contact</a></li>
		<li><a href="./redirect_page.php">Logout</a></li>
	</ul>
	</div>
</nav>
<ul class="sidenav" id="mobile-links">
<li><a href="./indexx.html">Home</a></li>
		<li><a href="https://pesitsouth.pes.edu/about/">About</a></li>
		<li><a href="https://pesitsouth.pes.edu/contact/">Contact</a></li>
		<li><a href="./redirect_page.php">Logout</a></li>
</ul>
	
	<body>
		<div class="container" align="center" >
		<H1 class="pink-text text-lighten-2" id="para"></H1>
		<br><br>
		<form method="post">
		<label id="t1">Job Description:</label>
			<br><textarea class="materialize-textarea" name="job_description" id="ta1"></textarea>

			<script>
				$('#ta1').val('New Text');
				M.textareaAutoResize($('#ta1'));
				</script>

<br>
<br>
			
		   <label id="t2"> Job Eligibility:</label>
			<br><textarea class="materialize-textarea" name="job_eligibility" id="ta2"></textarea>

			<script>
				$('#ta2').val('New Text');
				M.textareaAutoResize($('#ta2'));
				</script>
			<br><br><input type="submit" class='btn' name="submit_data" id="sub">
		</form>
</div>

		<script>
		var company_name="<?php echo $_SESSION['company_name']; ?>";
  document.getElementById("para").innerHTML="Welcome "+company_name+" to PES University ";
		</script> 
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
$company_id=$_SESSION['company_id'];
$query_check="select job_description from company where company_id='$company_id';";
$result=mysqli_query($conn,$query_check);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
if(!$row)
{	
if(isset($_POST['submit_data'])!='')
{
$job_description=$_POST['job_description'];
$job_eligibility=$_POST['job_eligibility'];

$query="Insert into company values('$company_id','$job_description','$job_eligibility');";

	if(!$row)
	{
if(mysqli_query($conn,$query))
   {
    echo 'Submitted..';
	//$newurl='redirect_page.php';
	//header('Location:' .$newurl);
    }
}}}

else if($row)
{
	echo "<h5 align=\"center\"> You have already submitted the description and eligibility criteria</h5>";
	echo "<script> document.getElementById('ta1').readOnly = \"true\";
	document.getElementById('ta2').readOnly = \"true\";
	document.getElementById('sub').disabled = \"true\";</script>;";
}

echo "<h5> Students applied</h5>";
echo " <div id=\"tables_set\" align=\"center\">";
	echo "<table class=\"striped bordered highlight\" border=\"1\">
	<thead>
	<tr>
	<th>USN</th>
	<th>Name</th>
	<th>BRANCH</th>
	</tr>
	</thead>";
	$query3="select usn,branch from company_apply where Company_id='$company_id';";
	$result3=mysqli_query($conn,$query3);	
	while($row3 = mysqli_fetch_array($result3))
	{   
	
	 if($row3)
		{//echo mysqli_error($conn);
			$usn3=$row3['usn'];
		$QUERY4="SELECT name from candidate where usn='$usn3';";
		$result4=mysqli_query($conn,$QUERY4);
		$row4 = mysqli_fetch_array($result4);
		echo "<tbody>";	
		 echo "<tr>";
		 echo "<td>" . strtoupper($usn3) . "</td>";
		 echo "<td>" . strtoupper($row4['name']) . "</td>";
		 echo "<td>" . strtoupper($row3['branch']) . "</td>";
		 echo "</tr>";
		}
	}
	echo "</tbody>";
	echo "</table>"; 
	echo "</div>";	
 ?>
 <script src="./jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="./materialize.min.js"></script>

<script>
$(document).ready(function(){
	$('.sidenav').sidenav();
})
	</script>
	</body>
</html>

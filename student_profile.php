<?php
session_start();
$msg="";
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
<nav><div class="nav-wrapper indigo">
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
		<li><a href="./statistics.php">Statistics</a></li>
		<li><a href="./redirect_page.php">Logout</a></li>
</ul>
	<body>
	<div class="container" align="center" >
	<?php echo $msg;?>
	<H1 class="flow-text" id="para"></H1>
</div>
		<form method="post">
			<h5>Companies arriving this month:</h5></form>
 

		<script>
		var student_name="<?php echo $_SESSION['name']; ?>";
  document.getElementById("para").innerHTML="Welcome  "+student_name;
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
echo "<table border='1'>
<tr>
<th>&nbspComapany Id</th>
<th>Company Name</th>
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
		    <h6 class="flow-text">Enter the company id to apply</h6>

          <i class="material-icons prefix">create</i>
          <input name="company_id" type="text" class="validate" style="width:120px;"><br><br>
    
			&nbsp&nbsp<input type="submit" name="submit" class="btn" value="apply">
			&nbsp&nbsp<input type ="button" class="btn" value="Done" name="Submit" onclick="location.href='./company_applied.php';" >
</div>
		</form>
		<?php
		$usns=trim($_SESSION['usn']);
		$usns=strtoupper($usns);
		//echo $usns;
		if(isset($_POST['company_id'])!="")
	{	//$msg="";
		$Company_ids=$_POST['company_id'];
    if(!$Company_ids==""){
		$query_new="select Company_name,Company_id from comany_login where Company_id='$Company_ids';";
	    $result_new=mysqli_query($conn,$query_new);
		$row_new=mysqli_fetch_array($result_new);	
		  if($row_new)
			{
		 $branch=strtoupper($usns[5].$usns[6]);
	     $query2="Insert into company_apply values('$Company_ids','$usns','$branch');";
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

	else{
		echo "<script>window.alert('Enter a company id')</script>";
	}
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
<?php
session_start();
$value = array(4);
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
	<link rel="stylesheet" href="./css/materialize.min.css">
<!--Import Google Icon Font-->
<link href="./css/icons.css" rel="stylesheet">
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
echo "<div align='center'><h5> STATISTICS</h4><br>";
echo " <div id=\"tables_set\" align=\"center\">";
	echo "<table class=\" bordered highlight\" border=\"1\">
	<thead>
	<tr>
	<th>BRANCH</th>
	<th>STUDENTS</th>
	</tr>
	</thead>";
	$i=0;
    $QUERY4="SELECT * from statistics;";
		$result4=mysqli_query($conn,$QUERY4);
	while($row4 = mysqli_fetch_array($result4))
	{   
		$value[$i]=($row4['no_of_students']);
		echo "<tbody>";	
		 echo "<tr>";
		 echo "<td>" . ($row4['branch']) . "</td>";
		 echo "<td>" . ($row4['no_of_students']) . "</td>";
		 echo "</tr>";
		 $i++;
		}
	
	echo "</tbody>";
	echo "</table>"; 
	echo "</div>";	
	echo "</div>";
 ?>
 <script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		title:{
			text: "	Placements in 2018"
		},
		legend: {
			maxWidth: 350,
			itemWidth: 60
		},
		data: [
		{
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} Students - #percent %",
			legendText: "{indexLabel}",
			dataPoints: [
				{ y: <?php echo $value[0];?> , indexLabel: "ISE" },
				{ y: <?php echo $value[1];?>, indexLabel: "CSE" },
				{ y: <?php echo $value[2];?>, indexLabel: "ME" },
				{ y: <?php echo $value[3];?>, indexLabel: "ECE"}
			]
		}
		]
	});
	chart.render();
}
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<body>
<div id="chartContainer" style="height: 450px; width: 100%;"></div>
 <script src="./JS/jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="./JS/materialize.min.js"></script>

<script>
$(document).ready(function(){
	$('.sidenav').sidenav();
})
	</script>
	</body>
</html>

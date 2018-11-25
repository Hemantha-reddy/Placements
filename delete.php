<?php
session_start();
if($_SESSION['logged_in1']=='false'){
	echo '<script> alert("Please login first");
	 window.location.href="./admin.php";</script>';
}

?>
<html>
	<head>
		<style>

.card{
	width:400px;
}
	  #table_sets {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 700px;
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
	<link rel="stylesheet" href="./materialize.min.css">
<!--Import Google Icon Font-->
<link href="./css/icons.css" rel="stylesheet">
<script src="./JS/jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="./JS/materialize.min.js"></script>
</head>
<div align="center">
		<form method="post">
        <h5 id"delete_p">Enter the title to delete post</h5>
        <input name="TITLE" type="text" class="validate" style="width:130px;" placeholder="title"required><br><br>
        &nbsp&nbsp<input type="submit" name="del_p" class="btn" value="Delete" id="apply"></form></div>
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
{
   echo '<br><div class="row">
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
  }}
  if(isset($_POST['TITLE'])&&isset($_POST['del_p']))
  {
    $title=$_POST["TITLE"];
$query2="Delete from posts where title='$title';";
$result2=mysqli_query($conn,$query2);
if(mysqli_affected_rows($conn)>0)
{
echo "<script>alert('DEleted');</script>";
  }
  else if(mysqli_affected_rows($conn)==0)
  {
    echo "<script>alert('not DEleted');</script>";
  }

}
?>
<div align="center">
            <form method="post">
         <h5>Delete company:</h5><br>
         <input name="delete_company" type="text" class="validate" style="width:130px;" placeholder="Company id" required><br><br>
        &nbsp&nbsp<input type="submit" name="del_c" class="btn" value="Delete" id="apply"></form></div>
<?php
echo "<div align='center'>
<table border='1' id='table_sets'>
<tr>
<th>&nbsp ID</th>
<th> Name</th>
</tr>";

$query="select Company_id,Company_name from comany_login;";
$result=mysqli_query($conn,$query);	
while($row = mysqli_fetch_array($result))
{
	 echo "<tr>";
	 echo "<td>" . $row['Company_id'] . "</td>";
	 echo "<td>" . $row['Company_name'] . "</td>";
	 echo "</tr>";
    
}
echo "</table>"; 
echo '</div>';

if(isset($_POST['del_c'])&&isset($_POST['delete_company']))
  {
    $cid=$_POST["delete_company"];
$query3="Delete from company where Company_id='$cid';";
$result3=mysqli_query($conn,$query3);
if(mysqli_affected_rows($conn)>0)
{
echo "<script>alert('DEleted');</script>";
  }
  else if(mysqli_affected_rows($conn)==0)
  {
    echo "<script>alert('not DEleted');</script>";
  }
  }
?><br>
<div align="center" style="display: inline;">
<form method="post"><br>
         <h5>Students placed</h5><br>

        <input name="cid" type="text" class="validate" style="width:130px;" placeholder="Company id" required>&nbsp&nbsp&nbsp&nbsp
        <input name="usn" type="text" class="validate" style="width:130px;" placeholder="usn" required><br><br>
        &nbsp&nbsp<input type="submit" name="set" class="btn" value="placed" id="apply"></form></div>

<?php

if(isset($_POST['set'])&&isset($_POST['cid']))
  {
    $cid=$_POST["cid"];
    $usn=$_POST["usn"];
    $branch=$usn[5].$usn[6];
$query4="insert into student_hired values('$cid','$usn','$branch');";
$result4=mysqli_query($conn,$query4);
if(mysqli_affected_rows($conn)>0)
{
  $queryss="call update_status('$branch');";
  $resultss=mysqli_query($conn,$queryss);
  if(mysqli_affected_rows($conn)>0)
  {
    echo "<script>alert('set in statistics');</script>";
  }
  $queryss1="call update_company_login('$usn');";
  $resultss1=mysqli_query($conn,$queryss1);
  if(mysqli_affected_rows($conn)>0)
  {
    echo "<script>alert('deleted from company applied');</script>";
  }
}
  
}

?>
<div align="right">
   <h4> <a href="./redirect_page.php">Logout</a></h4></div>
	</body>
</html>

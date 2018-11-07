<?php
session_start();
session_unset();
session_destroy();
?>
<html>
	<head><title>
	Redirect
	</title>
	<link rel="stylesheet" href="./materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="./materialize.min.js"></script>
<!--Import Google Icon Font-->
<link href="icons.css" rel="stylesheet">
</head>
<body>	
	<h2 class=" purple-text flow-text "> Thank you for using our services...</h2>
<script>
setTimeout(function() {
	var a= alert("Are you sure you want to logout ?");
	window.location.href="./indexx.html";
	
}, 2000);
   
	
</script>

</body>
</html>
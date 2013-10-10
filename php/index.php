<?php
	session_start();
	include("inc/locale.php");
	include("inc/wp-updatecheck-functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Wordpress Monitoring</title>
	<meta charset="utf-8">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	
	<script>
		$(function() {
			$( document ).tooltip();
		});
	</script>

	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

</head>

<body>

<h1>Status check</h1>
<?php wpuc_exec(); ?>

</body>
</html>	
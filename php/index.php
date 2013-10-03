<?php
// PHP implementation for the wp-external-update-check script
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
<h2>Wordpress</h2>
<?php
// URL provided by wp-external-update-check
$url = 'http://127.0.0.1/wp-admin/admin-ajax.php?action=externalUpdateCheck&secret=mh9OUardyBtPGmnOxdf8AS11jYR8Bv6Q';
?>

<div class="core">
	<h3><?php echo _('Core'); ?></h3>
	<?php wpuc_core($url); ?>
</div>

<div class="plugins">
	<h3><?php echo _('Plugins'); ?></h3>
	<?php wpuc_plugins($url); ?>
</div>

<div class="themes">
	<h3><?php echo _('Themes'); ?></h3>
	<?php wpuc_themes($url); ?>
</div>


</body>
</html>	
<?php
// Script für Wordpress-Versionen
// Plugin: https://github.com/cconrad/wp-external-update-check

// Function checking sites configured in config.php
function wpuc_exec() {
	$configfile = "config.php";
	if (file_exists($configfile)) {
		$config = parse_ini_file($configfile, 1);
		foreach ($config as $key) {
			$json = file_get_contents($key['url']);
			$wpsite = parse_url($key['url']);
			echo '<h2><a href="'.$wpsite['scheme'].'://'.$wpsite['host'].'">'.$key['site'].'</a></h2>';
			if ($json) {
				echo '<div class="status">';
				$array = json_decode($json, true);
				//Core
				echo '<div class="core"><h3>'._('Core').'</h3>';
				if ($json != '0' AND isset($array['core'][0]['response'])) {
						echo '<p class="update">'._('New version available:');
						echo ' '.$array['core'][0]['new_bundled'].' &#8594; '.$array['core'][0]['current'].'</p>';
				}
				else {
					echo '<p class="uptodate">'._('Wordpress is up to date.').'.</p>';
				}
				echo '</div>'; //class="core"
				//Plugins
				echo '<div class="plugins"><h3>'._('Plugins').'</h3>';
				if ($json != '0' AND isset($array['plugins'])) {
					echo '<ul>';
					foreach ($array['plugins'] as $pluginname => $plugindesc) {
						echo '<li class="update"><a href="'.strip_tags($plugindesc['update']['url']).'" title="'.strip_tags($plugindesc['Description']).'">';
						print(strip_tags($plugindesc['Name']));
						echo ' '.($plugindesc['Version']).' &#8594; '.$plugindesc['update']['new_version'].'</a></li>';
					}
					echo '</ul>';
				}
				else {
					echo '<p class="uptodate">'._('No updates available.').'.</p>';
				}
				echo '</div>'; //class="plugins"
				//Themes
				echo '<div class="themes"><h3>'._('Themes').'</h3>';
				if ($json != '0' AND isset($array['themes'])) {
					echo '<ul>';
					foreach ($array['themes'] as $pluginname => $plugindesc) {
						echo '<li class="update"><a href="'.strip_tags($plugindesc['update']['url']).'">'.strip_tags($pluginname).' '.$plugindesc['update']['new_version'].'</a></li>';
					}
					echo '</ul>';
				}
				else {
					echo '<p class="uptodate">'._('No updates available.').'.</p>';
				}
				echo '</div>'; //class="themes"
				echo '</div>'; //class="status"
			} //if ($json)
			else {
				echo '<div class="error"><h3>'._('Error').'</h3><p class="update">'._('Error fetching WordPress status.').'.</p></div>';
			}
		} //foreach ($config as $key)
	} //if ($config)
	else {
		echo '<h2>'._('Fatal error').'</h2><p class="update">'._('Error reading configuration file. Please check config.php').'.</p></div>';
	}
} // wpuc_exec
?>
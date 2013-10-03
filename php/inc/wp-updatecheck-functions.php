<?php
// PHP functions for the wp-external-update-check script from cconrad:
// https://github.com/cconrad/wp-external-update-check

function wpuc_core( $url ) {
	$json = file_get_contents($url);
	$array = json_decode($json, true);
	if ($json != '0' AND isset($array['core'][0]['response'])) {
			echo '<p class="update">'._('New version available:');
			echo ' '.$array['core'][0]['new_bundled'].' &#8594; '.$array['core'][0]['current'].'</p>';
	}
	else {
		echo '<p class="uptodate">'._('Wordpress is up to date.').'.</p>';
	}
} //function wpuc_core

function wpuc_plugins( $url ) {
	$json = file_get_contents($url);
	$array = json_decode($json, true);
	if ($json != '0' AND isset($array['plugins'])) {
		foreach ($array['plugins'] as $pluginname => $plugindesc) {
			echo '<li class="update"><a href="'.strip_tags($plugindesc['update']['url']).'" title="'.strip_tags($plugindesc['Description']).'">';
			print(strip_tags($plugindesc['Name']));
			echo ' '.($plugindesc['Version']).' &#8594; '.$plugindesc['update']['new_version'].'</a></li>';
		}
	}
	else {
		echo _('No updates available.');
	}
} //function wpuc_plugins

function wpuc_themes( $url ) {
	$json = file_get_contents($url);
	$array = json_decode($json, true);
	if ($json != '0' AND isset($array['themes'])) {
		echo '<ul>';
		foreach ($array['themes'] as $pluginname => $plugindesc) {
			echo '<li class="update"><a href="'.strip_tags($plugindesc['update']['url']).'">'.strip_tags($pluginname).' '.$plugindesc['update']['new_version'].'</a></li>';
		}
		echo '</ul>';
	}
	else {
		echo _('No updates available.');
	}
}// function wpuc_themes
?>
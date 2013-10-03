wp-external-update-check
========================

Provides a secret URL to check for updates to the WordPress core, plugins and themes, without requiring cookie-based authentication. Meant for use in external monitoring services.

Installation
------------

1. Upload `external-update-check` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Copy the private URL displayed and use it however you want to (e. g. in a cron script, Jenkins, monitoring system, manually in a browser, etc.)

PHP Usage
------------

1. Copy the URL provided to the php/index.php (line 33)

Frequently Asked Questions
--------------------------

* I forgot the private URL.

  Deactivate and reactivate the plugin, a new private URL will be displayed.

* The private URL has been compromised, how can I change it?

  Deactivate and reactivate the plugin, a new private URL will be displayed. The previous private URL will no longer work.

* I activated several plugins at the same time and the private URL wasn't displayed.

  This is a known bug at the moment. Please deactivate the plugin and activate it again by clicking the "Activate" link next to it on the Plugins page.

* The private URL only outputs "0".
  
  This can have two causes:
  * Either the private URL is incorrect, or
  * there simply aren't any updates to the WordPress core, installed plugins and themes for your site.

* How can I use the output from the private URL?

  If there are updates for your WordPress installation, the private URL returns a JSON object with up to three properties:
  * "core": A JSON array of available updates for your WordPress core. There could be multiple core updates, e.g. if your site uses a localized version of WordPress.
  * "plugins": A JSON array of available updates for your WordPress plugins.
  * "themes": A JSON array of available updates for your WordPress themes.

  A simple use case would be to fetch the private URL from a cron script or scheduled task and have the script notify you in some way, if the result is not "0".

  A more complicated use case would be to parse the output with a JSON parser, download the updates automatically, apply them to a source code directory, commit them to a version control server and deploy them to a staging server.
  
  An example of a Jenkins script can be found in the `docs` directory.

* Why doesn't the plugin update stuff automatically?

  Other WordPress plugins exist which already can do that. This plugin was developed for users who prefer a more fine-grained control over which updates they want to install, who make use of version control, or test updates in a staging environment before deployment.

Changelog
---------

* v0.5
  * Fixed a bug that would show a core update even though WordPress was up to date.
  * First public release.

* v0.4
  * Documentation improvements.

* v0.3
  * Fixed opening php tag.

* v0.2
  * Documentation improvements.

* v0.1
  * First version.
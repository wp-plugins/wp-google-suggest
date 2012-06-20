=== WP Google Suggest ===
Contributors: kobenland
Tags: search, AJAX, jQuery, Google, Google suggest
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LYYF6RDJ5A2EA
Requires at least: 3.3
Tested up to: 3.4
Stable tag: 1.3.0

Provides suggestions while typing a search query, using the Google Suggest API.

== Description ==

This plugin uses an abstraction of jQueryUI's autocomplete widget that interacts with the unofficial/undocumented Google Suggest API.
Props go to Haochi Chen.

It adds an AJAX call to the search form, returning matches for the current search query.
Make sure the searchform input field has `id="s"` applied, so this plugin can hook in the existing WordPress API to unfold its magic.


== Installation ==

1. Download WP Google Suggest.
2. Unzip the folder into the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Make sure the searchform input field has `id="s"`


== Frequently Asked Questions ==

= Why are there no suggestions, when I enter a searchterm? =
To pick up the user entry, the Plugin needs the search input field to have `id="s"`, like in the default Themes that come with WordPress.


== Changelog ==

= 1.3.0 =
* Updated Utility Class
* Tested with WordPress 3.4

= 1.2 =
* Fixed a bug that prevented the plugin from activating

= 1.1 =
* Updated Google Suggest Script
* Relies on Core for JavaScript bootstrap, so Version 3.3 is required
* Tested up to WordPress 3.3.1

= 1.0 =
* Initial Release
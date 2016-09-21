=== Validate Gravatar ===
Contributors: eflyjason
Donate link: http://www.arefly.com/donate/
Tags: Gravatar, Validate
Requires at least: 3.0
Tested up to: 3.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Check if the Email's Gravatar is exist. 檢測指定郵箱的Gravatar是否存在

== Description ==

Check if the Email's Gravatar is exist.

檢測指定郵箱的Gravatar是否存在

Example: 

`if(validate_gravatar("name@domain.com")){
    echo "This Email have Gravatar!";
}else{
    echo "This Email do not have Gravatar!";
}`

== Installation ==

###Updgrading From A Previous Version###

To upgrade from a previous version of this plugin, delete the entire folder and files from the previous version of the plugin and then follow the installation instructions below.

###Installing The Plugin###

Extract all files from the ZIP file, making sure to keep the file structure intact, and then upload it to `/wp-content/plugins/`.

This should result in the following file structure:

`- wp-content
    - plugins
        - validate-gravatar
            | LICENSE
            | license.txt
            | readme.txt
            | validate-gravatar.php`

Then just visit your admin area and activate the plugin.

**See Also:** ["Installing Plugins" article on the WP Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

== Frequently Asked Questions ==

= I cannot active this plugin, what can i do? =

You may post on the [support forum of this plugin](http://wordpress.org/support/plugin/validate-gravatar/) to ask for help.

= I love this plugin! Can I donate to you? =

YES! I do this in my free time and I appreciate all donations that I get. It makes me want to continue to update this plugin. You can find more details on [About Me Page](http://www.arefly.com/about/).

== Changelog == 

**Version 1.0.5**

* Remove All Remote Load File.

**Version 1.0.4**

* Fix Bug of `define`. (Thanks to cmhello)

**Version 1.0.3**

* Add Banners.

**Version 1.0.1 to 1.0.2**

* Update Readme File's Example.

**Version 1.0**

* Initial release.

== Upgrade Notice ==

See Changelog.
<?php
/*

**************************************************************************

Plugin Name:  Validate Gravatar
Plugin URI:   http://www.arefly.com/validate-gravatar/
Description:  Check if the Email's Gravatar is exist. 檢測指定郵箱的Gravatar是否存在
Version:      1.0.5
Author:       Arefly
Author URI:   http://www.arefly.com/

**************************************************************************

	Copyright 2014  Arefly  (email : eflyjason@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

**************************************************************************/

define("VALIDATE_GRAVATAR_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("VALIDATE_GRAVATAR_FULL_DIR", plugin_dir_path( __FILE__ ));
define("VALIDATE_GRAVATAR_TEXT_DOMAIN", "validate-gravatar");

function validate_gravatar($email) {
	$hash = md5(strtolower(trim($email)));
	$uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
	$headers = @get_headers($uri);
	if (!preg_match("|200|", $headers[0])) {
		$has_valid_avatar = FALSE;
	} else {
		$has_valid_avatar = TRUE;
	}
	return $has_valid_avatar;
}
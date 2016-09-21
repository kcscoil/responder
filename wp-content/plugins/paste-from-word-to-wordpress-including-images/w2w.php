<?php
/*
Plugin Name: Paste from Word to WordPress (Images too!) by NonprofitCMS.org
Plugin URI: http://www.nonprofitcms.org/2011/03/paste-from-word-to-wordpress-including-images/
Description: Allows pasting text, tables, images, and charts from Word straight into the visual editor.  
Version: 1.0
Author: Kunal Johar
Author URI: http://www.nonprofitcms.org/
License: MIT License
*/



function genRandomString() {
    $length = 15;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}


function wordtowordpress_install()
{
    //Create a random string as a security string
	$randomStr = genRandomString();
	
	
	//save it to the options database
	update_option('wordtowordpresssecurecode', $randomStr);
	
}

function wordtowordpress_menu()
{
    global $wpdb;
	if (get_option('wordtowordpresssecurecode') == '')
	{
	    $randomStr = genRandomString();
		update_option('wordtowordpresssecurecode', $randomStr);
	}
	
	echo '<div id="message" class="updated fade">';
	echo 'Paste from Word to WordPress Plugin</div>';
	
	echo '<div class="wrap"><h2>Setup Directoins</h2><br/>';
	
	echo 'Step 1: <a href="http://www.nonprofitcms.org/2011/03/paste-from-word-to-wordpress-including-images/">Download Desktop Widget</a> (Microsoft Windows XP or higher needed):<br/>';
	echo 'Step 2: Copy something from Word<br/>';
	echo 'Step 3: You will be prompted for your Site URL: <strong>' . get_site_url() . '</strong><br/>';
	echo 'Step 4: Next, Enter Security Activation Code: <strong>' . get_option('wordtowordpresssecurecode') . '</strong><br/>';
	echo 'Step 5: Press Save!  From here on out you can paste from Word to WordPress!<br/>';
	echo '<br/>';
	echo '<br/>';
	echo '<br/>- <a href="">Watch an overview video</a> of this plugin.<br/>';
	echo '<br/>- <a href="http://nonprofitcms.org/support/forum/nonprofitcms-paste-from-word-to-wordpress-plugin">Visit our support forums</a> if you encounter issues or need any  help!';
	
	echo '</div>';
	
   
}
 
function wordtowordpress_actions()
{
    add_options_page("Word to WordPress", "Word to WordPress", 1, "wordtowordpress", "wordtowordpress_menu");
}

add_action('activate_word-to-wordpress/w2w.php', 'wordtowordpress_install'); 
add_action('admin_menu', 'wordtowordpress_actions');


?>
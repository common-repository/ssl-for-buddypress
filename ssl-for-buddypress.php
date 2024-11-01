<?php
/*
Plugin Name: SSL for BuddyPress
Plugin URI:  https://membersonly.top/
Description: SSL for BuddyPress will redirect non-SSL HTTP buddypress pages to HTTPS buddypress pages automatically
Version: 1.0.1
Author: membersonly.top 
Author URI: https://membersonly.top
Text Domain: ssl-for-buddypress
License: GPLv3 or later
*/
/*  Copyright 2019 - 2020 membersonly.top
 This program comes with ABSOLUTELY NO WARRANTY;
https://www.gnu.org/licenses/gpl-3.0.html
https://www.gnu.org/licenses/quick-guide-gplv3.html
*/

add_action('wp', 'ssfb_redirect_bp_to_ssl');


function ssfb_redirect_bp_to_ssl()
{
	if (function_exists ( 'bp_current_component' ))
	{
		$is_bp_current_component = bp_current_component ();
	}
	else
	{
		$is_bp_current_component = '';
	}

	if (empty($is_bp_current_component))
	{
		return;
	}
	else
	{
		if (!is_ssl()) 
		{
			$ssfb_var_redirect_url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			wp_redirect($ssfb_var_redirect_url, 301);
			exit;
		}
	}
}

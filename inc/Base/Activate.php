<?php

namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();
		$users = get_users();
		foreach ($users as $user){
		    if($user->roles[0] == 'administrator'){
		        $user->add_cap('format-text-capability');
            }
        }
	}
}
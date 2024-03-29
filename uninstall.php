<?php

/**
 * Trigger this file on Plugin uninstall
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

$users = get_users();
foreach ($users as $user){
    if(user_can($user,'format-text-capability')){
        $user->remove_cap('format-text-capability');
    }
}

// Clear Database stored data
//$books = get_posts( array( 'post_type' => 'book', 'numberposts' => -1 ) );
//
//foreach( $books as $book ) {
//	wp_delete_post( $book->ID, true );
//}

// Access the database via SQL
//global $wpdb;
//$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
//$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
//$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );
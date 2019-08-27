<?php


namespace Inc\Base;

use \Inc\Base\BaseController;

class AjaxHandler extends BaseController
{
    public function register() {
        add_action( 'wp_ajax_submit_format', array( $this, 'update_format') );
    }

    function update_format() {
        global $wpdb; // this is how you get access to the database

        $formData = ( $_POST['formData'] );
        $aux = [];
        foreach ($formData as $v){
            $aux[$v['name']] = $v['value'];
        }
        $formData = $aux;

        print_r($formData);

        wp_die();
    }
}
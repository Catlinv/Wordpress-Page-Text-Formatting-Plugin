<?php


namespace Inc\Base;

use Inc\Api\FormatData;
use \Inc\Base\BaseController;

class AjaxHandler extends BaseController
{
    public function register() {
        add_action( 'wp_ajax_submit_format', array( $this, 'update_format') );
        add_action( 'wp_ajax_get_format', array( $this, 'get_format') );
    }

    function update_format() {

        $formData = ( $_POST['formData'] );

        $aux = [];
        foreach ($formData as $v){
            $aux[$v['name']] = $v['value'];
        }
        $formData = $aux;

        FormatData::updateFormat($formData);
        FormatData::updateDatabase();

        echo json_encode(FormatData::getInstance()->toArray());
        die();
    }

    function get_format() {
        echo json_encode(FormatData::getInstance()->toArray());
        die();
    }
}
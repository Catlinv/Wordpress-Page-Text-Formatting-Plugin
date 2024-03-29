<?php


namespace Inc\Base;

use Inc\Api\FormatData;
use \Inc\Base\BaseController;

class AjaxHandler extends BaseController
{
    public function register() {
        add_action( 'wp_ajax_submit_format', array( $this, 'update_format') );
        add_action( 'wp_ajax_get_format', array( $this, 'get_format') );
        add_action( 'wp_ajax_reset_format', array( $this, 'reset_format') );
        add_action( 'wp_ajax_update_permissions', array( $this, 'update_permissions') );
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

    function reset_format() {
        FormatData::resetToDefault();
        $this->get_format();
    }

    function update_permissions() {
        $formData = ( $_POST['formData'] );
        $test = [];
        foreach ($formData as $el){
            $user = get_user_by('login',$el['name']);
            if($el['value'] === 'true'){
                $user->add_cap('format-text-capability');
            } else {
                $user->remove_cap('format-text-capability');
            }
        }
        die();
    }
}
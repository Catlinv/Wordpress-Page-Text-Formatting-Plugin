<?php 

namespace Inc\Base;

use Inc\Api\FormatData;
use \Inc\Base\BaseController;

/**
* 
*/
class Enqueue extends BaseController
{
	public function register() {
	    $pagename = isset($_GET['page']) ? $_GET['page'] : null;
	    if($pagename === 'page_text_formatting_plugin') {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        }
        else{
            add_action('wp_head', array($this, 'hook_css'));
        }
	}
	
	function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle', $this->plugin_url . 'assets/mystyle.css' );
        wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'mypluginscript', $this->plugin_url . 'assets/myscript.js' );
        wp_enqueue_script( 'my-script-handle', $this->plugin_url . 'assets/myscript.js' , array( 'jquery','wp-color-picker' ), false, true );
	}

    function hook_css(){
	    if(is_page()) {
	        $data = FormatData::getInstance()->toArray();
	        foreach ($data as $title=>$values){
	            $this->addStyleForTitle($title,$values);
	        }
        }
    }

    private function addStyleForTitle($title,$data){
	    ?>
        <style>
            <?php echo $title?> {
                background-color: <?php echo $data['background-color'];?> ;
                border-color: <?php echo $data['border-color'];?> ;
                border-radius: <?php echo $data['border-radius'];?>px ;
                border-style: <?php echo $data['border-style'];?> ;
                border-width: <?php echo $data['border-width'];?>px ;
                color: <?php echo $data['color'];?> ;
                font-size: <?php echo $data['font-size'];?>px ;
                letter-spacing: <?php echo $data['letter-spacing'];?>px ;
                line-height: <?php echo $data['line-height'];?> ;
                text-align: <?php echo $data['text-align'];?> ;
                text-transform: <?php echo $data['text-transform'];?>
            }
        </style>
        <?php
    }
}
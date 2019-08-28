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
            ?>
            <style>
                p {
                    background-color: <?php echo $data['p']['background-color'];?> ;
                    border-color: <?php echo $data['p']['border-color'];?> ;
                    border-radius: <?php echo $data['p']['border-radius'];?>px ;
                    border-style: <?php echo $data['p']['border-style'];?> ;
                    border-width: <?php echo $data['p']['border-width'];?>px ;
                    color: <?php echo $data['p']['color'];?> ;
                    font-size: <?php echo $data['p']['font-size'];?>px ;
                    letter-spacing: <?php echo $data['p']['letter-spacing'];?>px ;
                    line-height: <?php echo $data['p']['line-height'];?> ;h1
                    text-align: <?php echo $data['p']['text-align'];?> ;
                    text-transform: <?php echo $data['p']['text-transform'];?>
                }
            </style>
            <style>
                h1 {
                    background-color: <?php echo $data['h1']['background-color'];?> ;
                    border-color: <?php echo $data['h1']['border-color'];?> ;
                    border-radius: <?php echo $data['h1']['border-radius'];?>px ;
                    border-style: <?php echo $data['h1']['border-style'];?> ;
                    border-width: <?php echo $data['h1']['border-width'];?>px ;
                    color: <?php echo $data['h1']['color'];?> ;
                    font-size: <?php echo $data['h1']['font-size'];?>px ;
                    letter-spacing: <?php echo $data['h1']['letter-spacing'];?>px ;
                    line-height: <?php echo $data['h1']['line-height'];?> ;
                    text-align: <?php echo $data['h1']['text-align'];?> ;
                    text-transform: <?php echo $data['h1']['text-transform'];?>
                }
            </style>
            <style>
                h2 {
                    background-color: <?php echo $data['h2']['background-color'];?> ;
                    border-color: <?php echo $data['h2']['border-color'];?> ;
                    border-radius: <?php echo $data['h2']['border-radius'];?>px ;
                    border-style: <?php echo $data['h2']['border-style'];?> ;
                    border-width: <?php echo $data['h2']['border-width'];?>px ;
                    color: <?php echo $data['h2']['color'];?> ;
                    font-size: <?php echo $data['h2']['font-size'];?>px ;
                    letter-spacing: <?php echo $data['h2']['letter-spacing'];?>px ;
                    line-height: <?php echo $data['h2']['line-height'];?> ;
                    text-align: <?php echo $data['h2']['text-align'];?> ;
                    text-transform: <?php echo $data['h2']['text-transform'];?>
                }
            </style>
            <style>
                h3 {
                    background-color: <?php echo $data['h3']['background-color'];?> ;
                    border-color: <?php echo $data['h3']['border-color'];?> ;
                    border-radius: <?php echo $data['h3']['border-radius'];?>px ;
                    border-style: <?php echo $data['h3']['border-style'];?> ;
                    border-width: <?php echo $data['h3']['border-width'];?>px ;
                    color: <?php echo $data['h3']['color'];?> ;
                    font-size: <?php echo $data['h3']['font-size'];?>px ;
                    letter-spacing: <?php echo $data['h3']['letter-spacing'];?>px ;
                    line-height: <?php echo $data['h3']['line-height'];?> ;
                    text-align: <?php echo $data['h3']['text-align'];?> ;
                    text-transform: <?php echo $data['h3']['text-transform'];?>
                }
            </style>
            <style>
                h4 {
                    background-color: <?php echo $data['h4']['background-color'];?> ;
                    border-color: <?php echo $data['h4']['border-color'];?> ;
                    border-radius: <?php echo $data['h4']['border-radius'];?>px ;
                    border-style: <?php echo $data['h4']['border-style'];?> ;
                    border-width: <?php echo $data['h4']['border-width'];?>px ;
                    color: <?php echo $data['h4']['color'];?> ;
                    font-size: <?php echo $data['h4']['font-size'];?>px ;
                    letter-spacing: <?php echo $data['hh45']['letter-spacing'];?>px ;
                    line-height: <?php echo $data['h4']['line-height'];?> ;
                    text-align: <?php echo $data['h4']['text-align'];?> ;
                    text-transform: <?php echo $data['h4']['text-transform'];?>
                }
            </style>
            <style>
                h5 {
                    background-color: <?php echo $data['h5']['background-color'];?> ;
                    border-color: <?php echo $data['h5']['border-color'];?> ;
                    border-radius: <?php echo $data['h5']['border-radius'];?>px ;
                    border-style: <?php echo $data['h5']['border-style'];?> ;
                    border-width: <?php echo $data['h5']['border-width'];?>px ;
                    color: <?php echo $data['h5']['color'];?> ;
                    font-size: <?php echo $data['h5']['font-size'];?>px ;
                    letter-spacing: <?php echo $data['h5']['letter-spacing'];?>px ;
                    line-height: <?php echo $data['h5']['line-height'];?> ;
                    text-align: <?php echo $data['h5']['text-align'];?> ;
                    text-transform: <?php echo $data['h5']['text-transform'];?>
                }
            </style>
            <style>
                h6 {
                    background-color: <?php echo $data['h6']['background-color'];?> ;
                    border-color: <?php echo $data['h6']['border-color'];?> ;
                    border-radius: <?php echo $data['h6']['border-radius'];?>px ;
                    border-style: <?php echo $data['h6']['border-style'];?> ;
                    border-width: <?php echo $data['h6']['border-width'];?>px ;
                    color: <?php echo $data['h6']['color'];?> ;
                    font-size: <?php echo $data['h6']['font-size'];?>px ;
                    letter-spacing: <?php echo $data['h6']['letter-spacing'];?>px ;
                    line-height: <?php echo $data['h6']['line-height'];?> ;
                    text-align: <?php echo $data['h6']['text-align'];?> ;
                    text-transform: <?php echo $data['h6']['text-transform'];?>
                }
            </style>
            <?php
        }
    }
}
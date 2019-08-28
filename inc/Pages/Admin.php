<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

/**
* 
*/
class Admin extends BaseController
{
	public $settings;

	public $pages = array();

	public function __construct()
	{

	    parent::__construct();
		$this->settings = new SettingsApi();

		$this->pages = array(
			array(
				'page_title' => 'Text Formatting Plugin',
				'menu_title' => 'Text Formatting',
				'capability' => 'manage_options', 
				'menu_slug' => 'page_text_formatting_plugin',
				'callback' => function(){ (require_once $this->plugin_path . 'templates/admin.php');},
				'icon_url' => '',
				'position' => 110
			)
		);

	}

	public function register() 
	{
		$this->settings->addPages( $this->pages )->register();
	}
}
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
    public $subpages = array();

	public function __construct()
	{
        parent::__construct();
		$this->settings = new SettingsApi();

		$this->pages = array(
			array(
				'page_title' => 'Text Formatting Plugin',
				'menu_title' => 'Text Formatting',
				'capability' => 'format-text-capability',
				'menu_slug' => 'page_text_formatting_plugin',
				'callback' => function(){ (require_once $this->plugin_path . 'templates/admin.php');},
				'icon_url' => '',
				'position' => 110
			)
		);

        $this->subpages = array(
            array(
                'parent_slug' => 'page_text_formatting_plugin',
                'page_title' => 'Permissions',
                'menu_title' => 'User Permissions',
                'capability' => 'manage_options',
                'menu_slug' => 'page_text_formatting_plugin_permissions',
                'callback' => function(){ (require_once $this->plugin_path . 'templates/permissions.php');}
            )
        );

	}

	public function register() 
	{
        $this->settings->addPages( $this->pages )->withSubPage( 'Settings' )->addSubPages( $this->subpages )->register();
	}
}
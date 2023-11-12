<?php
/**
 * BuddyBoss Compatibility Integration Class.
 *
 * @since BuddyBoss 1.1.5
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Check if the class does not exits then only allow the file to add
 */
if( ! class_exists( 'AcrossWP_Sub_Menu' ) ) {
	/**
	 * Fired during plugin licences.
	 *
	 * This class defines all code necessary to run during the plugin's licences and update.
	 *
	 * @since      0.0.1
	 * @package    AcrossWP_Sub_Menu
	 * @subpackage AcrossWP_Sub_Menu/includes
	 * @author     AcrossWP <contact@acrosswp.com>
	 */
	abstract class AcrossWP_Sub_Menu {

		/**
		 * The single instance of the class.
		 *
		 * @var AcrossWP_Sub_Menu
		 * @since 0.0.1
		 */
		protected static $_instance = null;

		/**
		 * The single instance of the class AcrossWP_Main_Menu.
		 *
		 * @var AcrossWP_Main_Menu
		 * @since 0.0.1
		 */
		public $main_menu;


		/**
		 * Initialize the collections used to maintain the actions and filters.
		 *
		 * @since    0.0.1
		 */
		public function __construct() {
			$this->main_menu = AcrossWP_Main_Menu::instance();
		}

		/**
		 * All the hooks will be here
		 */
		public function hooks () {

			/**
			 * Add the parent menu into the Admin Dashboard
			 */
			add_action( 'admin_menu', array( $this, 'menu' ), 1000 );
		}

		/**
		 * Main Post_Anonymously_Loader Instance.
		 *
		 * Ensures only one instance of WooCommerce is loaded or can be loaded.
		 *
		 * @since 0.0.1
		 * @static
		 * @see Post_Anonymously_Loader()
		 * @return Post_Anonymously_Loader - Main instance.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Define constant if not already set
		 * @param  string $name
		 * @param  string|bool $value
		 */
		private function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		/**
		 * Adds the plugin license page to the admin menu.
		 *
		 * @return void
		 */
		abstract function menu();
	}	
}
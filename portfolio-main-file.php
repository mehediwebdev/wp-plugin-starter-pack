<?php


  /**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Your Name
 * @copyright         2019 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Portfolio Plugin
 * Plugin URI:        https://innovativesoftit.com/wordPress-portfolio-plugin
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md.Mehedi Hasan
 * Author URI:        https://innovativesoftit.com
 * Text Domain:       mehedi-portfolio
 *Domain Path:        /languages/  
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://innovativesoftit.com/wordPress-portfolio-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/** portfolio version */
define('PORTFOLIO_VERSION', '1.0.0');

/** portfolio directory path */
define('PORTFOLIO_PLUGIN_DIRECTORY_PATH', trailingslashit(plugin_dir_path( __FILE__ ))  );  



/** portfolio includes directory path */
define('PORTFOLIO_PLUGIN_INCLUDES_PATH' , trailingslashit(PORTFOLIO_PLUGIN_DIRECTORY_PATH . 'includes' ) ); 

/** portfolio directory url */

define('PORTFOLIO_PLUGIN_ASSET_PATH' , trailingslashit(plugin_dir_url( __FILE__ )) ); 



define('PORTFOLIO_PLUGIN_CSS_PATH' , trailingslashit(PORTFOLIO_PLUGIN_ASSET_PATH . 'assets/css' ) ); 


define('PORTFOLIO_PLUGIN_JS_PATH' , trailingslashit(PORTFOLIO_PLUGIN_ASSET_PATH . 'assets/js' ) ); 

/** portfolio class */

class wpc_portfolio_plugin{

	public function __construct(){
		add_action('plugins_loaded', array($this, 'wpc_portfolio_plugin_textdomain' ) );
		add_action('wp_enqueue_scripts', array($this, 'wpc_portfolio_plugin_asset_enqueue' ) );
	}

  function wpc_portfolio_plugin_textdomain() {
  load_plugin_textdomain('mehedi-portfolio', false, PORTFOLIO_PLUGIN_DIRECTORY_PATH . 'languages' );
 }


  function wpc_portfolio_plugin_asset_enqueue() {

   wp_enqueue_style( 'bootstrap-css', trailingslashit(PORTFOLIO_PLUGIN_CSS_PATH) . 'bootstrap.css', array(), '4.1.1', false );

   wp_enqueue_style( 'portfolio-css', trailingslashit(PORTFOLIO_PLUGIN_CSS_PATH) . 'portfolio.css', array(), '1.0.0', false );

   wp_enqueue_script( 'bootstrap-js', trailingslashit(PORTFOLIO_PLUGIN_JS_PATH) . 'bootstrap.min.js', array('jquery'), '4.1.1', true );

  wp_enqueue_script( 'isotope-js', trailingslashit(PORTFOLIO_PLUGIN_JS_PATH) . 'isotope.pkgd.min.js', array('jquery'), '3.0.4', true );

    wp_enqueue_script( 'portfolio-js', trailingslashit(PORTFOLIO_PLUGIN_JS_PATH) . 'portfolio.js', array('jquery', 'isotope-js'), '1.0.0', true );
  }
}
new wpc_portfolio_plugin();

// our custom classes
//require_once( dirname(__FILE__) . '/classes/class-translation.php' );
//require_once( dirname(__FILE__) . '/classes/class-reports.php' );
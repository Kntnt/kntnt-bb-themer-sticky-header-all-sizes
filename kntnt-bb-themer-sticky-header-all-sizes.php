<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt Sticky Header of Beaver Builder Theme Builder for All Screen Sizes
 * Description:       Provides the sticky headers of Beaver Builder Theme Builder (a.k.a. Beaver Themer) for all screen sizes.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Kntnt\BB_Themer_Sticky_Header_All_Sizes;

defined( 'WPINC' ) && new Plugin;

class Plugin {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'replace_js' ], 9999 );
	}

	public function replace_js() {
		// The original fl-theme-builder-header-layout.js is not enqueued and hence cannot be dequeued.
		// Instead we load the replacement script in the footer to make sure it is executed after the original
		// script, which makes the replacement script redefine FLThemeBuilderHeaderLayout.
		wp_enqueue_script( 'fl-theme-builder-header-layout', plugin_dir_url( __FILE__ ) . 'fl-theme-builder-header-layout.js', [ 'jquery' ], '1.0', true );
	}

}

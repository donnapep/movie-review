<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://wpreviewplugins.com
 * @since             1.0.0
 * @package           Movie_Review
 *
 * @wordpress-plugin
 * Plugin Name:       Movie Review
 * Plugin URI:        http://wpreviewplugins.com/product/movie-review/
 * Description:       Add information such as title, director, genre and poster to enhance your movie reviews.
 * Version:           1.0.0
 * Author:            Donna Peplinskie
 * Author URI:        http://donnapeplinskie.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       movie-review
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-movie-review-activator.php
 */
function activate_movie_review() {
  require_once plugin_dir_path( __FILE__ ) . 'includes/class-movie-review-activator.php';
  Movie_Review_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-movie-review-deactivator.php
 */
function deactivate_movie_review() {
  require_once plugin_dir_path( __FILE__ ) . 'includes/class-movie-review-deactivator.php';
  Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_movie_review' );
register_deactivation_hook( __FILE__, 'deactivate_movie_review' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-movie-review.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_movie_review() {

  $plugin = new Movie_Review();
  $plugin->run();

}
run_movie_review();
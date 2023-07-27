<?php

/**
 * The plugin Wedding Invitation for Velocity Developer
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/velocitydeveloper/vd-wedding
 * @since             1.0.0
 * @package           vd_wedd
 *
 * @wordpress-plugin
 * Plugin Name:       VD Wedding
 * Plugin URI:        https://velocitydeveloper.com/
 * Description:       Plugin Undangan Pernikahan by Velocity Developer
 * Version:           1.0.0
 * Author:            Velocity Developer
 * Author URI:        https://velocitydeveloper.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vd-wedd
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Define constants
 *
 * @since 1.0.0
 */
if (!defined('VD_WEDD_VERSION')) define('VD_WEDD_VERSION', '1.0.0');
if (!defined('VD_WEDD_PLUGIN_DIR')) define('VD_WEDD_PLUGIN_DIR', plugin_dir_path(__FILE__));
if (!defined('VD_WEDD_PLUGIN_URL'))    define('VD_WEDD_PLUGIN_URL', plugin_dir_url(__FILE__));


// Load everything
require_once VD_WEDD_PLUGIN_DIR . 'inc/posttype-ucapan.php';
require_once VD_WEDD_PLUGIN_DIR . 'inc/shortcodes.php';

/**
 * Register Beaver Builder modules
 */
add_action('init', function () {
    if (class_exists('FLBuilder')) {
        require_once VD_WEDD_PLUGIN_DIR . 'modules/vdwd-gallery/vdwd-gallery.php';
        require_once VD_WEDD_PLUGIN_DIR . 'modules/vdwd-timeline/vdwd-timeline.php';
        require_once VD_WEDD_PLUGIN_DIR . 'modules/vdwd-rekening/vdwd-rekening.php';
        require_once VD_WEDD_PLUGIN_DIR . 'modules/vdwd-navbar/vdwd-navbar.php';
        require_once VD_WEDD_PLUGIN_DIR . 'modules/vdwd-button/vdwd-button.php';
    }
});

//register script
add_action('wp_enqueue_scripts', function () {
    // Get the version.
    $the_version = VD_WEDD_VERSION;

    wp_enqueue_script('jquery');
    wp_enqueue_script('vdwd-script', VD_WEDD_PLUGIN_URL . 'js/vdwdd-script.js', array('jquery'), $the_version, true);
    wp_localize_script(
        'vdwd-script',
        'vdwedd',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        )
    );
});

//start session
add_action('init', function () {
    if (!session_id()) {
        session_start();
    }
});

//regsiter page template
add_filter("theme_page_templates", function ($post_templates) {
    $post_templates['vdwedd-template']   = __('Velocity Wedding', 'vd-wedd');
    return $post_templates;
});
add_filter('template_include', function ($template) {
    if (is_singular()) {
        $page_template = get_post_meta(get_the_ID(), '_wp_page_template', true);
        if ('vdwedd-template' === $page_template) {
            $template = VD_WEDD_PLUGIN_DIR . 'inc/page-template.php';
        }
    }
    return $template;
});

/// render border css for Beaver Builder
function vdwedd_border_css($settings, $class)
{
    if (empty($settings))
        return false;

    $css = '';
    $css .= $class . ' {';

    $radius = $settings['radius'];
    if ($radius) {
        $css .= 'border-top-left-radius: ' . $radius['top_left'] . 'px;
        border-top-right-radius: ' . $radius['top_right'] . 'px;
        border-bottom-right-radius: ' . $radius['bottom_right'] . 'px;
        border-bottom-left-radius: ' . $radius['bottom_left'] . 'px;';
    }

    $style = $settings['style'];
    if ($style) {
        $css .= '    border-style: ' . $style . ';';
    }

    $color = $settings['color'];
    if ($color) {
        $css .= '    border-color: #' . $color . ';';
    }

    $width = $settings['width'];
    if ($width) {
        $css .= 'border-width:' . $width['top'] . 'px ' . $width['right'] . 'px ' . $width['bottom'] . 'px ' . $width['left'] . 'px;';
    }

    $css .= ' }';
    return $css;
}

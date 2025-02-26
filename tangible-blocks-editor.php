<?php
/**
 * Plugin Name: Tangible Blocks - Editor
 * Plugin URI: https://tangibleblocks.com/editor
 * Description: Create blocks for Gutenberg, Beaver, and Elementor
 * Version: 3.1.1
 * GitHub URI: TangibleInc/blocks-editor
 * Author: Team Tangible
 * Author URI: https://teamtangible.com
 * License: GPLv2 or later
 */
use tangible\framework;
use tangible\updater;

define( 'TANGIBLE_BLOCKS_EDITOR_VERSION', '3.1.1' );

$module_path = is_dir(
  ($path = __DIR__ . '/../../tangible') // Module
) ? $path : __DIR__ . '/vendor/tangible'; // Plugin

require_once $module_path . '/framework/index.php';
require_once $module_path . '/updater/index.php';

/**
 * Get plugin instance
 */
function tangible_blocks_editor($instance = false) {
  static $plugin;
  return $plugin ? $plugin : ($plugin = $instance);
}

// Backward compatibility
function tangible_block_editor() {
  return tangible_blocks_editor();
}

add_action('plugins_loaded', function() {

  $plugin    = framework\register_plugin([
    'name'           => 'tangible-blocks-editor',
    'title'          => 'Tangible Blocks - Editor',
    'setting_prefix' => 'tangible_blocks_editor',

    'version'        => TANGIBLE_BLOCKS_EDITOR_VERSION,
    'file_path'      => __FILE__,
    'base_path'      => plugin_basename( __FILE__ ),
    'dir_path'       => plugin_dir_path( __FILE__ ),
    'url'            => plugins_url( '/', __FILE__ ),
    'assets_url'     => plugins_url( '/assets', __FILE__ ),

    // 'item_id'        => 22590, // Product ID on Tangible Plugins store
    // 'multisite'      => false,
  ]);

  framework\register_plugin_dependencies($plugin, [
    'tangible-blocks/tangible-blocks.php' => [
      'title' => 'Tangible Blocks',
      'url' => 'https://tangibleblocks.com/',
      'fallback_check' => function() {
        return function_exists('tangible_blocks');
      }
    ]
  ]);

  tangible_blocks_editor( $plugin );

  updater\register_plugin([
    'name' => $plugin->name,
    'file' => __FILE__,
    // 'license' => ''
  ]);

  if (!framework\has_all_plugin_dependencies($plugin)) return;

  // Features loaded will have $framework and $plugin in their scope

  require_once __DIR__.'/includes/index.php';

}, 10);

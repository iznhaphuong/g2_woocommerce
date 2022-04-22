<?php 
/**
* Plugin Name: Group2 Plugin
* Plugin URI: http://www.mywebsite.com/my-first-plugin
* Description: The very first plugin that I have ever created. * Version: 1.0
* Author: Nha Phuong
* Author URI: http://www.mywebsite.com
*/

function loadMyBlock() {
    wp_enqueue_script(
    'my-new-block',
    plugin_dir_url(__FILE__) . 'test-block.js',
    array('wp-blocks','wp-editor'),
    true
    );
    }
    add_action('enqueue_block_editor_assets', 'loadMyBlock');
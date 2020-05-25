<?php
/*
Plugin Name: WordPress Behavior Driven Development
Plugin URI: https://wordpress-bdd.com/
Description: Let's learn Behavior Driven Development 
Version: 0.3
Author: John Dee
Author URI: https://wordpress-bdd.com
*/

namespace WPbdd;

require_once (plugin_dir_path(__FILE__). 'src/WPbdd/autoloader.php');

class WPbdd{
    use Ability_RenderShortcode_HelloWorld;
}

add_shortcode('first-testable-shortcode', array(new WPbdd,'doRenderAndReturnShortcode'));
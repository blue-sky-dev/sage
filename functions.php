<?php

//get active theme directory name (lets you rename roots)
$theme_name = next(explode('/themes/', get_template_directory()));

include_once('includes/roots-activation.php');	// activation
include_once('includes/roots-admin.php');		// admin additions/mods
include_once('includes/roots-options.php');		// theme options menu
include_once('includes/roots-ob.php');			// output buffer
include_once('includes/roots-cleanup.php');		// code cleanup/removal
include_once('includes/roots-htaccess.php');	// h5bp htaccess

// set the value of the main container class depending on the selected grid framework
$roots_css_framework = get_option('roots_css_framework');
if (!defined('roots_container_class')) {
	switch ($roots_css_framework) {
		case 'blueprint':
			define('roots_container_class', 'span-24');
			define('is_960gs', false);
		case '960gs_12':
			define('roots_container_class', 'container_12');
			define('IS_960GS', true);
			define('is_960gs_12', true);
		case '960gs_16':
			define('roots_container_class', 'container_16');
			define('is_960gs', true);
			define('is_960gs_16', true);
		case '960gs_24':
			define('roots_container_class', 'container_24');
			define('is_960gs', true);
			define('is_960gs_24', true);
		default:
			define('roots_container_class', '');
			define('is_960gs', false);
	}
}

function get_roots_css_framework_stylesheets() {
	$css_uri = get_stylesheet_directory_uri();
	$styles = '';

	if (!is_960gs) {
		$styles .= "<link rel=\"stylesheet\" href=\"$css_uri/css/blueprint/screen.css\">\n";
	} elseif (is_960gs_12 == 1 || is_960gs_16 == 1) {
		$styles .= "<link rel=\"stylesheet\" href=\"$css_uri/css/960/reset.css\">\n";
		$styles .= "\t<link rel=\"stylesheet\" href=\"$css_uri/css/960/text.css\">\n";
		$styles .= "\t<link rel=\"stylesheet\" href=\"$css_uri/css/960/960.css\">\n";
	} elseif (is_960gs_24 == 1) {
		$styles .= "<link rel=\"stylesheet\" href=\"$css_uri/css/960/reset.css\">\n";
		$styles .= "\t<link rel=\"stylesheet\" href=\"$css_uri/css/960/text.css\">\n";
		$styles .= "\t<link rel=\"stylesheet\" href=\"$css_uri/css/960/960_24_col.css\">\n";
	}

	if (class_exists('RGForms')) {
		$styles .= "\t<link rel=\"stylesheet\" href=\"" . plugins_url(). "/gravityforms/css/forms.css\">\n";
	}

	$styles .= "\t<link rel=\"stylesheet\" href=\"$css_uri/css/style.css\">\n";

	if (!is_960gs) {
		$styles .= "\t<!--[if lt IE 8]>i<link rel=\"stylesheet\" href=\"$css_uri/css/blueprint/ie.css\"><![endif]-->\n";
	}

  return $styles;
}
	
// set the maximum 'Large' image width to the Blueprint grid maximum width
if (!isset($content_width)) $roots_selected_css_framework === 'blueprint' ? $content_width = 950 : $content_width = 940;

// tell the TinyMCE editor to use editor-style.css
// if you have issues with getting the editor to show your changes then use the following line:
// add_editor_style('editor-style.css?' . time());
add_editor_style('editor-style.css');

add_theme_support('post-thumbnails');

// http://codex.wordpress.org/Post_Formats
// add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

add_theme_support('menus');
register_nav_menus(
	array(
	  'primary_navigation' => 'Primary Navigation',
	  'utility_navigation' => 'Utility Navigation'
	)
);

// remove container from menus
function roots_nav_menu_args($args = ''){
	$args['container'] = false;
	return $args;
}

add_filter('wp_nav_menu_args', 'roots_nav_menu_args');

// create widget areas: sidebar, footer
$sidebars = array('Sidebar', 'Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="container">',
		'after_widget' => '</div></article>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

// add to robots.txt
// http://codex.wordpress.org/Search_Engine_Optimization_for_WordPress#Robots.txt_Optimization
add_action('do_robots', 'roots_robots');

function roots_robots() {
	echo "Disallow: /cgi-bin\n";
	echo "Disallow: /wp-admin\n";
	echo "Disallow: /wp-includes\n";
	echo "Disallow: /wp-content/plugins\n";
	echo "Disallow: /plugins\n";
	echo "Disallow: /wp-content/cache\n";
	echo "Disallow: /wp-content/themes\n";
	echo "Disallow: /trackback\n";
	echo "Disallow: /feed\n";
	echo "Disallow: /comments\n";
	echo "Disallow: /category/*/*\n";
	echo "Disallow: */trackback\n";
	echo "Disallow: */feed\n";
	echo "Disallow: */comments\n";
	echo "Disallow: /*?*\n";
	echo "Disallow: /*?\n";
	echo "Allow: /wp-content/uploads\n";
	echo "Allow: /assets";
}

?>

<?php

add_action('roots_head', 'roots_google_analytics');
add_action('roots_head', 'roots_fout_b_gone');
add_action('roots_head', 'roots_1140_head');
add_action('roots_head', 'roots_adapt_head');
add_action('roots_head', 'roots_foundation_head');
add_action('roots_head', 'roots_bootstrap_head');
add_action('roots_stylesheets', 'roots_get_stylesheets');
add_action('roots_header_before', 'roots_1140_header_before');
add_action('roots_header_after', 'roots_1140_header_after');
add_action('roots_footer_before', 'roots_1140_footer_before');
add_action('roots_footer_after', 'roots_1140_footer_after');
add_action('roots_header_before', 'roots_bootstrap_header_before');
add_action('roots_header_after', 'roots_bootstrap_header_after');
add_action('roots_footer_before', 'roots_bootstrap_footer_before');
add_action('roots_footer_after', 'roots_bootstrap_footer_after');
add_action('roots_post_inside_before', 'roots_page_breadcrumb');

function roots_google_analytics() {
  global $roots_options;
  $roots_google_analytics_id = $roots_options['google_analytics_id'];
  $get_roots_google_analytics_id = esc_attr($roots_options['google_analytics_id']);
  if ($roots_google_analytics_id !== '') {
    echo "\n\t<script>\n";
    echo "\t\tvar _gaq=[['_setAccount','$get_roots_google_analytics_id'],['_trackPageview'],['_trackPageLoadTime']];\n";
    echo "\t\t(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];\n";
    echo "\t\tg.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';\n";
    echo "\t\ts.parentNode.insertBefore(g,s)}(document,'script'));\n";
    echo "\t</script>\n";
  }
}

function roots_fout_b_gone() {
  global $roots_options;
  $roots_fout_b_gone = $roots_options['fout_b_gone'];
  $template_uri = get_template_directory_uri();
  if ($roots_fout_b_gone === true) {
    echo "\t<script src=\"$template_uri/js/libs/foutbgone.min.js\"></script>\n";
    echo "\t<script>\n";
    echo "\t\tfbg.hideFOUT('asap', 100);\n";
    echo "\t</script>";
  }
}

function roots_1140_head() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  $template_uri = get_template_directory_uri();
  if ($roots_css_framework === '1140') {
    echo "\t<script src=\"$template_uri/js/libs/css3-mediaqueries.js\"></script>";
  }
}

function roots_adapt_head() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  $template_uri = get_template_directory_uri();
  if ($roots_css_framework === 'adapt') {
    echo "\n\t<script>\n";
    echo "\t\tvar ADAPT_CONFIG = {\n";
    echo "\t\t\tpath: '$template_uri/css/adapt/',\n";
    echo "\t\t\tdynamic: true,\n";
    echo "\t\t\trange: [\n";
    echo "\t\t\t\t'0px    to 760px  = mobile.css',\n";
    echo "\t\t\t\t'760px  to 980px  = 720.css',\n";
    echo "\t\t\t\t'980px  to 1280px = 960.css',\n";
    echo "\t\t\t\t'1280px to 1600px = 1200.css',\n";
    echo "\t\t\t\t'1600px to 1920px = 1560.css',\n";
    echo "\t\t\t\t'1920px           = fluid.css'\n";
    echo "\t\t\t]\n";
    echo "\t\t};\n";
    echo "\t</script>\n";
    echo "\t<script src=\"$template_uri/js/libs/adapt.min.js\"></script>";
  }
}

function roots_foundation_head() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  $template_uri = get_template_directory_uri();
  if ($roots_css_framework === 'foundation') {
	echo "\t<!-- Combine and Compress These Javascript Files -->\n";  
    echo "\t<script src=\"$template_uri/js/foundation/jquery.reveal.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/foundation/jquery.orbit-1.3.0.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/foundation/forms.jquery.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/foundation/jquery.customforms.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/foundation/jquery.placeholder.min.js\"></script>\n";
    echo "\t<!--  End Combine and Compress Javascript Files -->\n";
    echo "\t<script src=\"$template_uri/js/foundation/app.js\"></script>\n";
    echo "\t<!-- IE Fix for HTML 5 Tags -->\n";
    echo "\t<!--[if lt IE 9]>\n";
    echo "\t\t<script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>\n";
    echo "\t<![endif]-->\n";            
  }
}

function roots_bootstrap_head() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  $roots_bootstrap_js = $roots_options['bootstrap_javascript'];
  $roots_bootstrap_less_js = $roots_options['bootstrap_less_javascript'];  
  $template_uri = get_template_directory_uri();
  if ($roots_css_framework === 'bootstrap_less') {
    echo "\t<script src=\"$template_uri/js/bootstrap/less-1.1.3.min.js\"></script>\n";     
  }  
  if ($roots_bootstrap_js === true) {
  	$roots_options['bootstrap_less_javascript'] = false;
  	
  	echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-modal.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-alerts.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-twipsy.js\"></script>\n"; 
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-popover.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-dropdown.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-scrollspy.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-tabs.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-buttons.js\"></script>\n";                           
  }
  if ($roots_bootstrap_less_js === true) {
  	$roots_options['bootstrap_javascript'] = false;
  	
  	echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-modal.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-alerts.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-twipsy.js\"></script>\n"; 
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-popover.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-dropdown.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-scrollspy.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-tabs.js\"></script>\n";
    echo "\t<script src=\"$template_uri/js/bootstrap/bootstrap-buttons.js\"></script>\n";                             
  }  
}

function roots_get_stylesheets() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];

  $styles = '';

  switch ($roots_css_framework) {
    case 'blueprint' :
      $styles .= stylesheet_link_tag('/blueprint/screen.css');
      break;
    case '960gs_12' :
    case '960gs_16' :
      $styles .= stylesheet_link_tag('/960/reset.css');
      $styles .= stylesheet_link_tag('/960/text.css', 1);
      $styles .= stylesheet_link_tag('/960/960.css', 1);
      break;
    case '960gs_24' :
      $styles .= stylesheet_link_tag('/960/reset.css');
      $styles .= stylesheet_link_tag('/960/text.css', 1);
      $styles .= stylesheet_link_tag('/960/960_24_col.css', 1);
      break;
    case '1140' :
      $styles .= stylesheet_link_tag('/1140/1140.css');
      break;
    case 'adapt' :
      $styles .= stylesheet_link_tag('/adapt/master.css');
      $styles .= "\t<noscript>\n";
      $styles .= stylesheet_link_tag('/adapt/mobile.css', 1);
      $styles .= "\t</noscript>\n";
      break;
    case 'foundation' :
      $styles .= stylesheet_link_tag('/foundation/globals.css');
      $styles .= stylesheet_link_tag('/foundation/typography.css', 1);
      $styles .= stylesheet_link_tag('/foundation/grid.css', 1);
      $styles .= stylesheet_link_tag('/foundation/ui.css', 1);
      $styles .= stylesheet_link_tag('/foundation/forms.css', 1);
      $styles .= stylesheet_link_tag('/foundation/orbit.css', 1);
      $styles .= stylesheet_link_tag('/foundation/reveal.css', 1);
      $styles .= stylesheet_link_tag('/foundation/mobile.css', 1);
      $styles .= stylesheet_link_tag('/foundation/app.css', 1);                                          
      break;      
    case 'less' :
      $styles .= stylesheet_link_tag('/less/less.css');
      break;
    case 'bootstrap' :
      $styles .= stylesheet_link_tag('/bootstrap/bootstrap.css');
      break;
    case 'bootstrap_less' :
      $styles .= stylesheet_link_tag_boostrap_less('/bootstrap/lib/bootstrap.less');
      break;             
  }

  if (class_exists('RGForms')) {
    $styles .= "\t<link rel=\"stylesheet\" href=\"" . plugins_url(). "/gravityforms/css/forms.css\">\n";
  }

  if (is_child_theme()) {
    $styles .= stylesheet_link_tag('/style.css', 1);
    $styles .= "\t<link rel=\"stylesheet\" href=\"" . get_stylesheet_uri(). "\">\n";
  } else {
    $styles .= stylesheet_link_tag('/style.css', 1);
  }

  switch ($roots_css_framework) {
    case 'blueprint' :
      $styles .= "\t<!--[if lt IE 8]>" . stylesheet_link_tag('/blueprint/ie.css', 0, false) . "<![endif]-->\n";
      break;
    case '1140' :
      $styles .= "\t<!--[if lt IE 8]>" . stylesheet_link_tag('/1140/ie.css', 0, false) . "<![endif]-->\n";
      break;
    case 'foundation' :
      $styles .= "\t<!--[if lt IE 9]>" . stylesheet_link_tag('/foundation/ie.css', 0, false) . "<![endif]-->\n";
      break;      
  }

  echo $styles;
}

function stylesheet_link_tag($file, $tabs = 0, $newline = true) {
  $indent = str_repeat("\t", $tabs);
  return $indent . '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css' . $file . '">' . ($newline ? "\n" : "");
}

function stylesheet_link_tag_boostrap_less($file, $tabs = 0, $newline = true) {
  $indent = str_repeat("\t", $tabs);
  return $indent . '<link rel="stylesheet/less" media="all" href="' . get_template_directory_uri() . '/css' . $file . '">' . ($newline ? "\n" : "");
}

function roots_1140_header_before() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  if ($roots_css_framework === '1140') {
    echo '<div class="container"><div class="row">', "\n";
  }
}

function roots_1140_header_after() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  if ($roots_css_framework === '1140') {
    echo "</div></div><!-- /.row /.container -->\n";
    echo '<div class="container"><div class="row">', "\n";
  }
}

function roots_1140_footer_before() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  if ($roots_css_framework === '1140') {
    echo "</div></div><!-- /.row /.container -->\n";
    echo '<div class="container"><div class="row">', "\n";
  }
}

function roots_1140_footer_after() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  if ($roots_css_framework === '1140') {
    echo "</div></div><!-- /.row /.container -->\n";
  }
}
function roots_bootstrap_header_before() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  if ($roots_css_framework === 'bootstrap' || $roots_css_framework === 'bootstrap_less') {
    echo '<div class="container">', "\n";
  }
}

function roots_bootstrap_header_after() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  if ($roots_css_framework === 'bootstrap' || $roots_css_framework === 'bootstrap_less') {
    echo "</div><!-- /.container -->\n";
    echo '<div class="container">', "\n";
  }
}

function roots_bootstrap_footer_before() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  if ($roots_css_framework === 'bootstrap' || $roots_css_framework === 'bootstrap_less') {
    echo "</div><!-- /.container -->\n";
    echo '<div class="container">', "\n";
  }
}

function roots_bootstrap_footer_after() {
  global $roots_options;
  $roots_css_framework = $roots_options['css_framework'];
  if ($roots_css_framework === 'bootstrap' || $roots_css_framework === 'bootstrap_less') {
    echo "</div><!-- /.container -->\n";
  }
}

function roots_page_breadcrumb() {
  global $post;
  if (function_exists('yoast_breadcrumb')) {
    if (is_page() && $post->post_parent) {
      yoast_breadcrumb('<p id="breadcrumbs">','</p>');
    }
  }
}

?>

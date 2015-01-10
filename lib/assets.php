<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/dist/styles/main.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.2.js via Google CDN
 * 2. /theme/dist/scripts/modernizr.js
 * 3. /theme/dist/scripts/app.js
 *
 * Google Analytics is loaded after enqueued scripts if:
 * - An ID has been defined in config.php
 * - You're not logged in as an administrator
 */
function sage_asset_path($filename) {
  if (WP_ENV === 'development') {
    return get_template_directory_uri() . '/dist/' . $filename;
  }

  $manifest_path = get_template_directory() . '/dist/rev-manifest.json';

  if (file_exists($manifest_path)) {
    $manifest = json_decode(file_get_contents($manifest_path), true);
  } else {
    $manifest = [];
  }

  if (array_key_exists($filename, $manifest)) {
    return get_template_directory_uri() . '/dist/' . $manifest[$filename];
  }
}

function sage_assets() {
  wp_enqueue_style('sage_css', sage_asset_path('styles/main.css'), false, null);

  /**
   * Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
   * jQuery & Modernizr load in the footer per HTML5 Boilerplate's recommendation: http://goo.gl/nMGR7P
   * If a plugin enqueues jQuery-dependent scripts in the head, jQuery will load in the head to meet the plugin's dependencies
   * To explicitly load jQuery in the head, change the last wp_enqueue_script parameter to false
   */
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');

    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js', array(), null, true);

    add_filter('script_loader_src', 'sage_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('modernizr', sage_asset_path('scripts/modernizr.js'), array(), null, true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('sage_js', sage_asset_path('scripts/app.js'), array(), null, true);
}
add_action('wp_enqueue_scripts', 'sage_assets', 100);

// http://wordpress.stackexchange.com/a/12450
function sage_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/dist/scripts/jquery.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'sage_jquery_local_fallback');

/**
 * Google Analytics snippet from HTML5 Boilerplate
 *
 * Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM
 */
function sage_google_analytics() { ?>
<script>
  <?php if (WP_ENV === 'production') : ?>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  <?php else : ?>
    function ga() {
      console.log('GoogleAnalytics: ' + [].slice.call(arguments));
    }
  <?php endif; ?>
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>','auto');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && (WP_ENV !== 'production' || !current_user_can('manage_options'))) {
  add_action('wp_footer', 'sage_google_analytics', 20);
}

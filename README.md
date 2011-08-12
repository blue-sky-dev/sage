# Roots WordPress Theme [http://www.rootstheme.com/](http://www.rootstheme.com/)

## Changelog:

### 3.6.0: August 12th, 2011
<ul>
	<li>HTML5 Boilerplate 2.0 updates</li>
	<li>Cleaner output of enqueued styles and scripts</li>
	<li>Added option for root relative URLs</li>
	<li>Small fixes to root relative URLs and clean assets</li>
	<li>Updated included jQuery plugins</li>
	<li>Added French translation (thanks @johnraz)</li>
	<li>Added Brazilian Portuguese translation (thanks @weslly)</li>
	<li>Switched the logo to use <code>add_custom_image_header</code></li>
	<li>Added a function that strips unnecessary self-closing tags</li>
	<li>Code cleanup and re-organization</li>
</ul>

### 3.5.0: July 30th, 2011
<ul>
	<li>Complete rewrite of theme options based on Twenty Eleven</li>
	<li>CSS frameworks: refactored code and added default classes for each framework</li>
	<li>CSS frameworks: added support for Adapt.js and LESS</li>
	<li>CSS frameworks: added option for None</li>
	<li>Added support for WPML and theme translation</li>
	<li>Added option for cleaner nav menu output</li>
	<li>Added option for FOUT-B-Gone</li>
	<li>Added authorship rel attribute to post author link</li>
	<li>Activation bugfix for pages being added multiple times</li>
	<li>Bugfixes to the root relative URL function</li>
	<li>Child themes will now load their CSS automatically and properly</li>
	<li>HTML5 Boilerplate updates (including Normalize.css, Modernizr 2.0, and Respond.js)</li>
	<li>Cleaner way of including HTML5 Boilerplate's <code>.htaccess</code></li>
	<li>Added hooks &amp; actions (and moved lots of code into them)</li>
	<li>Renamed <code>includes/</code> directory to <code>inc/</code></li>
	<li>Added a blank <code>inc/roots-custom.php</code> file</li>
</ul>

### 3.2.4: May 19th, 2011
<ul>
	<li>Bugfixes</li>
	<li>Matching latest changes to HTML5 Boilerplate and Blueprint CSS</li>
	<li>Updated jQuery to 1.6.1</li>
</ul>

### 3.2.3: May 10th, 2011
<ul>
	<li>Bugfixes</li>
	<li>Added <code>language_attributes()</code> to <code>&lt;html&gt;</code></li>
	<li>Matching latest changes to HTML5 Boilerplate and Blueprint CSS</li>
	<li>Updated jQuery to 1.6</li>
</ul>

### 3.2.2: April 24th, 2011
<ul>
	<li>Bugfixes</li>
</ul>

### 3.2.1: April 20th, 2011

<ul>
	<li>Added support for child themes</li>
</ul>

### 3.2.0: April 15th, 2011

<ul>
	<li>Added support for the 1140px Grid</li>
	<li>Updated the conditional comment code to match latest changes to HTML5 Boilerplate</li>
</ul>

### 3.1.1: April 7th, 2011

<ul>
	<li>Fixed relative path function to work correctly when WordPress is installed in a subdirectory</li>
	<li>Updated jQuery to 1.5.2</li>
	<li>Fixed comments to show avatars correctly</li>
</ul>

### 3.1.0: April 1st, 2011

<ul>
	<li>Added support for 960.gs thanks to John Liuti</li>
	<li>Added more onto the <code>.htaccess</code> from HTML5 Boilerplate</li>
	<li>Made the theme directory and name renamable</li>
</ul>

### 3.0.0: March 28th, 2011

<ul>
	<li>Changed name from BB to Roots</li>
	<li>Updated various areas to match the latest changes to HTML5 Boilerplate</li>
	<li>Changed the theme markup based on hCard/Readability Guidelines and work by Jonathan Neal</li>
	<li>Theme activation now creates the navigation menus and automatically sets their locations</li>
	<li>Permalink structure is now set to <code>/%year%/%postname%/</code> for performance reasons</li>
	<li>Uploads folder is now <code>/assets/</code> and not organized by month and date</li>
	<li>All static folders in <code>/wp-content/themes/roots/</code> (<code>css/</code>, <code>js/</code>, <code>img/</code>) now rewrite to the root (<code>/css/</code>, <code>/js/</code>, <code>/img/</code>)</li>
	<li><code>/wp-content/plugins/</code> now rewrites to <code>/plugins/</code></li>
	<li>More root relative URLs on WordPress functions</li>
	<li>Search results (<code>/?s=query</code>) now rewrites to <code>/search/query/</code></li>
	<li><code>l10n.js</code> is deregistered</li>
	<li>Gallery shortcode has been changed to output <code>&lt;figure&gt;</code> and <code>&lt;figcaption&gt;</code> and now links to the file by default</li>
	<li>Added more <code>loop.php</code> templates</li>
	<li>Made the HTML editor have a monospaced font</li>
	<li>Added <code>front-page.php</code></li>
	<li>Updated CSS for Gravity Forms 1.5</li>
	<li>Added <code>searchform.php template</code></li>
</ul>

### 2.4.0: January 25th, 2011

<ul>
	<li>Added a notification when saving the theme settings</li>
	<li>Added support for navigation menus</li>
	<li>Created function that makes sure there is a Home page on theme activation</li>
	<li>Updated various areas to match the latest changes to HTML5 Boilerplate</li>
</ul>

### 2.3.0: December 8th, 2010

<ul>
	<li>Logo is no longer an <code>&lt;h1&gt;</code></li>
	<li>Added ARIA roles again</li>
	<li>Changed <code>ul#nav</code> to <code>nav#nav-main</code></li>
	<li>Added vCard to footer</li>
	<li>Made all URL's root relative</li>
	<li>Added Twitter and Facebook widgets to footer</li>
	<li>Added SEO optimized <code>robots.txt</code> from WordPress codex</li>
</ul>

### 2.2.0: September 20th, 2010

<ul>
	<li>Added asynchronous Google Analytics</li>
	<li>Updated <code>.htaccess</code> with latest changes from HTML5 Boilerplate</li>
</ul>

### 2.1.0: August 19th, 2010

<ul>
	<li>Removed optimizeLegibility from headings</li>
	<li>Updated jQuery to latest version</li>
	<li>Implemented HTML5 Boilerplate <code>.htaccess</code></li>
</ul>

### 2.0.1: August 2nd, 2010

<ul>
	<li>Added some presentational CSS classes</li>
	<li>Added footer widget</li>
	<li>Added more Gravity Forms default styling</li>
</ul>

### 2.0.0: July 19th, 2010

<ul>
	<li>Added HTML5 Boilerplate changes</li>
	<li>Implemented <code>loop.php</code></li>
	<li>wp_head cleanup</li>
	<li>Added <code>page-subpages.php</code> template</li>
</ul>

### 1.5.0: April 15th, 2010

<ul>
	<li>Integrated Paul Irish's frontend-pro-template (the original HTML5 Boilerplate)</li>
</ul>

### 1.0.0: December 18th, 2009

<ul>
	<li>Added Blueprint CSS to Starkers</li>
</ul>

## Contributors:

[Scott Walkinshaw](http://www.scottwalkinshaw.com/), [Matthew Price](http://www.matthewaprice.com/), [Kyle Geminden](http://www.kylegeminden.com/), [Steve Jothen](http://twitter.com/sjothen), [John Liuti](http://twitter.com/JohnLiuti), [Jeremiah Wall](http://jeremiahwall.com/), [Jenny Jui-Shan Liang](http://jsliang.twgogo.org/), [Mason Stewart](http://masondesu.com/), [Dejan Panovski](http://webdesignplus.mk/), [Cesar Vargas](http://www.limitlis.com/), [Matthew Wrather](http://www.wrathercreative.com/), [Weslly Honorato](http://about.me/weslly)

## License:

Major components:

* HTML5 Boilerplate: [The Unlicense](http://unlicense.org)
* Blueprint CSS: Modified MIT License
* 960 Grid System: MIT/GPL License
* The 1140px Grid: CC BY-SA 3.0 Australia License
* Modernizr: MIT/BSD License
* jQuery: MIT/GPL License

Everything else:

* [The Unlicense](http://unlicense.org) (aka: public domain) 

## Summary:

Roots is a starting WordPress theme made for developers that's based on HTML5 Boilerplate, Blueprint CSS/960 Grid System/1140 Grid and Starkers that will help you rapidly create brochure sites and blogs.
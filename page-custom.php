<?php
/*
Template Name: Custom
*/
get_header(); ?>
		<div id="content" class="<?php echo CONTAINER_CLASS; ?>">	
			<div id="main" class="<?php echo get_option('roots_main_class'); ?>" role="main">
				<div class="container">
					<?php get_template_part('loop', 'page'); ?>
				</div>
			</div><!-- /#main -->
			<aside id="sidebar" class="<?php echo get_option('roots_sidebar_class'); ?>" role="complementary">
				<div class="container">
					<?php get_sidebar(); ?>
				</div>
			</aside><!-- /#sidebar -->
			<?php echo get_roots_960gs_cleardiv() ?>
		</div><!-- /#content -->
<?php get_footer(); ?>

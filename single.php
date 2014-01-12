<?php
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
	<h1><?php the_title(); ?></h1>

	<div class="thumb">
		<?php the_post_thumbnail(); ?>
	</div>

	<div class="content">
		<?php the_content(); ?>
	</div>

	<p class="date"><?php the_date(); ?></p>
	<p class="keywords"><?php the_tags('',' | ', ''); ?></p>
	<p class="category"><?php the_category(', '); ?></p>

<?php
	endwhile;
	endif;
	get_footer();
?>

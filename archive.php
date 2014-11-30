<?php
	get_header();
?>

<?php

	// case : display a category
	if (is_category()) {
		$title = "Catégorie : ".single_tag_title( '', false);
	}

	// case : display a tag
	elseif (is_tag()) {
		$title = "Mot clé : ".single_tag_title( '', false);
	}

	// case : display a tag
	elseif (is_search()) {
		$title = "Recherche : ".get_search_query();
	}

	else {
		$title = "Actualités";
	}

?>

	<h1><?php echo $title; ?></h1>

	<div class="blog">

<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();

		get_template_part('parts/article');

	endwhile;
	endif;
?>

	</div>

	<div class="sidebar">
		<?php //dynamic_sidebar('Blog'); ?>
	</div>

<?php
	get_footer();
?>

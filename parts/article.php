
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="meta">
			<?php the_category() ?> 
			<?php the_tags('',', ','') ?>
		</div>
		
		<div class="thumbnail">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a>
			<div class="date">Le <?php the_time('d M Y') ?></div>
		</div>
		
		<div class="content">
			<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
			<?php the_excerpt() ?>
			<p><a href="<?php the_permalink() ?>" class="button">Lire l'article</a></p>
		</div>

	</article>


	<div class="post">
		<div class="meta">
			<?php the_category() ?> 
			<?php the_tags('',', ','') ?>
		</div>
		
		<div class="post__thumbnail">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a>
			<div class="date">Le <?php the_time('d M Y') ?></div>
		</div>
		
		<div class="post__content">
			<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
			<?php the_excerpt() ?>
			<p><a href="<?php the_permalink() ?>" class="button--main">Lire l'article</a></p>
		</div>

	</div>

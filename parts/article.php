
<div class="post">
  <div class="post__thumbnail">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    <div class="post__date">Le <?php the_time('d M Y'); ?></div>
  </div>

  <div class="post__meta">
    <?php the_category(); ?> 
    <?php the_tags('',', ',''); ?>
  </div>
  
  <div class="post__content">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_content(); ?>
    <p><a href="<?php the_permalink(); ?>" class="button--main">Lire l'article</a></p>
  </div>
</div>

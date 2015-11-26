<?php
  get_header();
  if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

  <div class="section blog">
    <div class="wrapper flex-container">
      <div class="f3 blog__posts">

        <div class="post">
          <h1 class="blog__title"><?php the_title(); ?></h1>

          <div class="post__meta">
            <span class="post__date"><?php _e('Le', 'smoothie'); ?> <?php the_time('d F Y'); ?></span>
            <span>&bullet;</span>
            <span class="post__categories"><?php _e('Thème :', 'smoothie'); ?> <?php the_category(); ?></span> 
            <span>&bullet;</span>
            <span class="post__tags"><?php _e('Mots-Clés :', 'smoothie'); ?> <?php the_tags('',' ',''); ?></span>
          </div>
          
          <div class="post__thumbnail">
            <?php the_post_thumbnail(); ?>
          </div>
          
          <div class="post__content content">
            <?php the_content(); ?>
          </div>
        </div>

        <div class="flex-container singlenav">
          <div class="f1 singlenav__next">
            <?php _e('« Article suivant', 'smoothie'); ?><br>
            <?php next_post_link('%link'); ?>
          </div>
          <div class="f1 singlenav__prev">
            <?php _e('Article précédent »', 'smoothie'); ?><br>
            <?php previous_post_link('%link'); ?>
          </div>
        </div>
      </div>

      <div class="f1 blog__sidebar">
        <?php dynamic_sidebar('Blog'); ?>
      </div>
    </div>
  </div>

<?php
  endwhile;
  endif;
  get_footer();
?>

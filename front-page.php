<?php
  get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

    <p class="date"><?php the_date(); ?></p>

    <p class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></p>

    <?php the_excerpt(); ?>

    <p><?php the_tags('',', ','') ?></p>
    <p><?php the_category(); ?></p>

<?php
  endwhile;
  endif;
?>

  <?php get_template_part('parts/navigation'); ?>

<?php
  get_footer();
?>

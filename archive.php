<?php
  get_header();

  // case : display a category
  if (is_category()) {
    $title = "Catégorie &bullet; ".single_tag_title( '', false);
  }

  // case : display a tag
  elseif (is_tag()) {
    $title = "Mot clé &bullet; ".single_tag_title( '', false);
  }

  // case : display a tag
  elseif (is_search()) {
    $title = "Recherche &bullet; ".get_search_query();
  }

  else {
    $title = 'Le Blog &bullet; dernières actus';
  }
?>
  
  <div class="section blog">
    <div class="wrapper flex-container">
      <div class="f3 blog__posts">
        <h1 class="blog__title"><?php echo $title; ?></h1>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <div class="post">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

          <div class="post__meta">
            <span class="post__date">Le <?php the_time('d F Y'); ?></span>
            <span>&bullet;</span>
            <span class="post__categories">Thème : <?php the_category(); ?></span> 
            <span>&bullet;</span>
            <span class="post__tags"> Tags : <?php the_tags('',' ',''); ?></span>
          </div>
          
          <div class="post__thumbnail">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
          </div>
          
          <div class="post__content">
            <?php the_excerpt(); ?>
            <p class="right"><a href="<?php the_permalink(); ?>" class="button--type1 button--small button--bold">Lire l'article</a></p>
          </div>
        </div>

        <?php endwhile; endif; ?>

        <div class="blog__navigation">
        <?php 

          global $wp_query;

          $big = 999999999; // need an unlikely integer

          echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages
          ) );

        ?>
        </div>
      </div>

      <div class="f1 blog__sidebar">
        <?php dynamic_sidebar('Blog'); ?>
      </div>
    </div>
  </div>
<?php
  get_footer();
?>

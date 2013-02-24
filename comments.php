<?php
  // call me with comments_template();
  if ( post_password_required() ) return;
?>

<div id="comments" class="comments-area">

  <?php if ( have_comments() ) : ?>
    <h2 class="comments-title"> Commentaires (<?php echo get_comments_number(); ?>)</h2>

    <ol class="commentlist">
      <?php wp_list_comments(); ?>
    </ol><!-- .commentlist -->

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="nocomments">Les commentaires sont fermés sur cet article</p>
    <?php endif; ?>

  <?php endif; ?>

  <?php comment_form(); ?>

</div> <!-- #comments .comments-area -->

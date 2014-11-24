<?php
  // call me with comments_template();
  if (post_password_required()) return;

  $num_coms = get_comments_number();
?>

<div id="comments" class="comments">
  <h2 class="comments__title"> <?php echo $num_coms; ?> Commentaire<?php if($num_coms > 1): echo "s"; endif; ?></h2>

  <?php
    if (comments_open()):
      comment_form();
    endif;
  ?>

  <?php if ( have_comments() ) : ?>
    <ol class="comments__list">
      <?php
        $args = array(
          'avatar_size' => 64,
          'type' => 'comment'
        );
        wp_list_comments($args);
      ?>
    </ol>
  <?php endif; ?>

</div>
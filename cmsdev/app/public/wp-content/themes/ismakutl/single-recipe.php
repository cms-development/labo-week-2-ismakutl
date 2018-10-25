<?php get_header(); ?>
  <div id="main-page">
    <section class="section">
      <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <h1 class="title"><?= the_title(); ?></h1>
          <h3><em><?= get_post_meta(get_the_ID(), 'subtitle', true)?></em></h3>
          <!--<div><?= the_meta(); ?></div>-->
          <p><strong><?= get_post_meta(get_the_ID(), 'intro', true)?></strong></p>
          <?php if (get_post_meta(get_the_ID(), 'ingredients', true)) :?>
            <p><?= get_post_meta(get_the_ID(), 'ingredients', true)?></p>
          <?php endif; ?>
          <div class="image" style="width:300px">
            <?=
              wp_get_attachment_image(
                get_post_meta(
                  $post->ID,
                  'afbeelding_1',
                  true
                )
              );
            ?>
            <small><em>
              <?=
                wp_get_attachment_caption(
                  get_post_meta(
                    $post->ID,
                    'afbeelding_1',
                    true
                  )
                );
              ?>
            </em></small>

            <?=
              wp_get_attachment_image(
                get_post_meta(
                  $post->ID,
                  'afbeelding_2',
                  true
                )
              );
            ?>
            <small><em>
              <?=
                wp_get_attachment_caption(
                  get_post_meta(
                    $post->ID,
                    'afbeelding_2',
                    true
                  )
                );
              ?>
            </em></small>
          </div>
          <?php if (get_post_meta(get_the_ID(), 'intro', true)) :?>
            <blockquote>
              <strong>Tips:</strong>
              <p><?= get_post_meta(get_the_ID(), 'intro', true)?></p>
            </blockquote>
          <?php endif; ?>
        <?php endwhile; endif; ?>
      </div>
    </section>
  </div>
<?php get_footer(); ?>
<?= get_header(); ?>

<?php $mycustom_query = new WP_Query(array(
  'post_type' => 'recipe',
  'orderby' => 'difficulty'
)); ?>

<div id="main-page">
  <section class="section">
    <div class="container">
      <div class="columns is-multiline is-desktop">
      
        <?php if ($mycustom_query->have_posts()) : while($mycustom_query->have_posts()) : $mycustom_query->the_post() ?>
          <div class="column is-one-third">
            <!--<?= the_meta() ?>-->
            <h3><?= get_post_meta(get_the_ID(), 'subtitle', true); ?></h3>
            <p>
              <?=
                wp_get_attachment_image(
                  get_post_meta(
                    $post->ID,
                    'afbeelding_1',
                    true
                  )
                );
              ?>
            </p>
            <em><?= get_post_meta(get_the_ID(), 'intro', true); ?></em>
            <p><?= get_the_term_list(get_the_ID(), 'difficulty'); ?></p>
            <a href="<?= get_post_permalink(); ?>">Read more</a>
          </div>
          <hr>
        <?php endwhile; endif ; ?>

      </div>
    </div>
  </section>
</div>

<?= get_footer(); ?>
<?= get_header(); ?>

  <div id="main-page">
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-three-quarters">
            
            <!-- ALL POSTS -->
            <?php
              $query = array(
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => 10
              );
              $mycustom_query = new WP_Query($query);
              // print_r($mycustom_query);
              if ($mycustom_query->have_posts()) : 
                while($mycustom_query->have_posts()) :
                  $mycustom_query->the_post();
                  the_title('<h1>','</h1>');
                  the_content('<div>','</div>');
                  the_meta();
                  echo '<a href="' . get_permalink() . '">read more</a>';
                endwhile;
              endif;
            ?>
            
          </div>
          <div class="column is-one-quarter">
            <?= get_sidebar(); ?>
          </div>
        </div>

      </div>
    </section>
  </div>

<?= get_footer(); ?>
<!-- frontpage -->

<?= get_header(); ?>

  <div id="main-page">
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-three-quarters">

            <!-- RECENT POSTS -->
            <?php
              $query = array(
                'numberposts' => 2,
                'order' => 'DESC',
                'orderby' => 'date'
              );
              $recent_posts = wp_get_recent_posts($query);
              // print_r($recent_posts);
            ?>
            <h1>Recent posts</h1>
            <?php foreach($recent_posts as $post) : ?>
              <?php $author_id = $post['post_author']; ?>
              <div class="box">
                <article class="media">
                  <div class="media-left">
                    <figure class="image is-64x64">
                      <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                    </figure>
                    <div>
                      <strong>
                        <?= 
                          the_author_meta('first_name', $author_id);
                          echo ' ';
                          the_author_meta('last_name', $author_id);
                        ?>
                      </strong>
                      <br>
                      <small>
                        <?= the_author_meta('nicename', $author_id) ?>
                      </small>
                    </div>
                  </div>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <?= $post['post_title'] ?>
                        <?= $post['post_content'] ?>
                        <br>
                        <a href="<?= get_permalink(); ?>">Read more</a>
                      </p>
                    </div>
                    <nav class="level is-mobile">
                      <div class="level-left">
                        <a class="level-item" aria-label="reply">
                          <span class="icon is-small">
                            <i class="fas fa-reply" aria-hidden="true"></i>
                          </span>
                        </a>
                        <a class="level-item" aria-label="retweet">
                          <span class="icon is-small">
                            <i class="fas fa-retweet" aria-hidden="true"></i>
                          </span>
                        </a>
                        <a class="level-item" aria-label="like">
                          <span class="icon is-small">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                          </span>
                        </a>
                      </div>
                    </nav>
                  </div>
                </article>
              </div>
            <?php endforeach; ?>
            
            <!-- WEETJES -->
            <?php
              $query2 = array(
                'category_name' => 'weetjes',
                'posts_per_page' => 2
              );
              $mycustom_query = new WP_Query($query2);
              // print_r($mycustom_query);
              if ($mycustom_query->have_posts()) : 
                while($mycustom_query->have_posts()) :
                  $mycustom_query->the_post();
                  the_title('<h1>','</h1>');
                  the_content('<p>','</p>');
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
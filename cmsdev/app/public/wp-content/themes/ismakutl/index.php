<!-- standaard page-template -->

<?= get_header(); ?>

  <div id="main-page">
    <section class="section">
      <div class="container">

        <div class="columns">
          <div class="column is-three-quarters">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?= the_title(); ?>
              <?= the_content(); ?>
            <?php endwhile; endif; ?>
          </div>
          <div class="column is-one-quarter">
            <?= get_sidebar(); ?>
          </div>
        </div>
        
      </div>
    </div>
  </div>

<?= get_footer(); ?>
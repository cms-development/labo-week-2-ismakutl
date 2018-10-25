<!-- custom page-template (no-sidebar) -->

<?=
  /* Template Name: Custom */
  get_header(); 
?>

<div id="main-page">
  <section class="section">
    <div class="container">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?= the_title(); ?>
        <?= the_content(); ?>
      <?php endwhile; endif; ?>
      
    </div>
  </div>
</div>

<?= get_footer(); ?>
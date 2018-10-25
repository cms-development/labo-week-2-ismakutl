<?= get_header(); ?>

<?php $mycustom_query = new WP_Query(array(
  'post_type' => 'event'
)); ?>

<div id="main-page">
  <section class="section">
    <div class="container">
      <div class="columns is-multiline is-desktop">
      
        <?php $locations = array(); ?>
        <?php if ($mycustom_query->have_posts()) : while($mycustom_query->have_posts()) : $mycustom_query->the_post() ?>
          <div class="column is-one-third">
            <!--<?= the_meta(); ?>-->
            <h3 class="title"><?= the_title(); ?></h3>
            <?php $date = new DateTime(get_post_meta(get_the_ID(), 'date_period', true)); ?>
            <p><em><?= $date->format("F j, Y, g:i a"); ?></em></p>
            <?php $location['coords'] = get_post_meta(get_the_ID(), 'location', true)?>
            <?php $location['permalink'] = get_post_permalink()?>
            <?php array_push($locations, $location); ?>
            <a href="<?= get_post_permalink(); ?>">Read more</a>
          </div>
          <hr>
        <?php endwhile; endif ; ?>
        <div id="mapid" style="height:200px;width:300px;margin:0 auto;"></div>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
        <script>
          const locations = <?php echo json_encode($locations); ?>;
          let mymap = L.map('mapid').setView([51.062211788106204, 3.702287861192417], 13);
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
              maxZoom: 12,
          }).addTo(mymap);
          console.log(locations)
          locations.forEach(l => {
            L.marker([l.coords.lat, l.coords.lng]).addTo(mymap).on('click', () => 
              window.location = l.permalink);
          });
        </script>

      </div>
    </div>
  </section>
</div>

<?= get_footer(); ?>
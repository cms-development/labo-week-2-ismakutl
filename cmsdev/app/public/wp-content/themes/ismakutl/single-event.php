<?= get_header(); ?>
  <div id="main-page">
    <section class="section">
      <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <h1 class="title"><?= the_title(); ?></h1>
          <!--<div><?= the_meta(); ?></div> -->
          <!--<?= the_content() ?> -->
          <?php $location = get_post_meta(get_the_ID(), 'location', true); ?>
          <p><strong>Datum: </strong><?= get_post_meta(get_the_ID(), 'date_period', true)?></p>
          <p><strong>Paymethods: </strong></p>
          <ul>
            <?php
              foreach(get_post_meta(get_the_ID(), 'paymethods', true) as $method) {
                echo '<li>' . $method . '</li>';
              } 
            ?>
          </ul>
          <div id="mapid" style="height:200px;width:300px;margin:0 auto;"></div>
          <?php endwhile; endif; ?>
        </div>
    </section>
  </div>

  <!-- Scripts / css for open street maps -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  <script>
    const loc = <?php echo json_encode($location); ?>;
    console.log(loc)
    let map = L.map('mapid').setView([51.062211788106204, 3.702287861192417], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 12,
    }).addTo(map);
    L.marker([loc.lat, loc.lng]).addTo(map).on('click', () => window.location = loc.perma_link);
  </script>
<?= get_footer(); ?>
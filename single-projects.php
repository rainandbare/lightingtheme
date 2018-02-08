<?php get_header(); ?>
 <main class="main-page single-collections single-projects">
	<div class="container">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>  
      
      <section class="single-project-info">
          <h1 class="page-title"><?= the_title(); ?></h1> 
          <section class="credits flex">
            <ul class="flex">
              <?php 
                $names = array();
                $credits = array('designer', 'photographer', 'location', 'product');
                 foreach ($credits as $credit) {
                $fieldValue = get_field($credit);
                array_push($names, $fieldValue);
              }
              if( have_rows('other_credits') ): while ( have_rows('other_credits') ) : the_row();

                  // display a sub field value
                array_push($credits, get_sub_field('custom_title'));
                array_push($names, get_sub_field('custom_txt'));

              endwhile;endif;

             for ($i = 0; $i < sizeOf($credits); $i++) { 
                if($names[$i] !== ''){ ?>
                  <li>
                    <h5><?php echo $credits[$i]; ?></h5>
                    <h6><?php echo $names[$i]; ?></h6>
                  </li>
                <?php } ?>
              <?php } ?>
            </ul>
            <div class="flex">
              <div class="controls">
                <h6 class="count"><span id="current">1</span>/<span id="total"></span></h6>
              </div>
              <div class="social-share">
                <?php echo do_shortcode('[Sassy_Social_Share]') ?>
              </div>
            </div>
          </section>
      </section>
      <section class="single-project-photos">
        <div class="images">
          <?php 
            $rowcount = count( get_field('images') );
            if ($rowcount > 2){?>
              <div class="project-slider">
              <?php if( have_rows('images') ):
                while ( have_rows('images') ) : the_row();
                    $image = get_sub_field('image'); ?>
                    <div><img class="slide" src=" <?= $image['url']; ?> " alt="<?= $image['alt']; ?>"></div>
               <?php endwhile; endif; ?>
              </div>
           <?php  } else if($rowcount <= 2){ ?>
              <div class="project-slider-under2">
              <?php  if( have_rows('images') ):
                    while ( have_rows('images') ) : the_row();
                        $image = get_sub_field('image'); ?>
                        <div class="mobile-photo"><img class="slide" src=" <?= $image['url']; ?> " alt="<?= $image['alt']; ?>"></div>
                        <div class="slide" style="background-image: url( <?= $image['url']; ?> );"></div>
              <?php endwhile; endif; ?>
              </div>
            <?php } ?>
          </div>
      </section>
      <div class="below-images flex">
        <a class="back-button" href="<?= site_url();?>/projects"><h6>← Back to All Projects</h6></a>
        <div class="social-share projects">
          <?php echo do_shortcode('[Sassy_Social_Share]') ?>
        </div>
      </div>
    <?php endwhile; ?>
	</div>
</main> <!-- /.main -->

<?php get_footer(); ?>
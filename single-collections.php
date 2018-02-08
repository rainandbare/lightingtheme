<?php get_header(); ?>
<main class="main-page single-collections"> 
  <div class="container">
    <div class="clearfix page-divider">
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <section class="single-collection-title clearfix">
        <div class='print-title'>
          <div class="title-bar">
            <h1 class="single-product-title"><?= the_title(); ?></h1> 
            <div class="send">
              <a href="mailto:?to=&body=<?= the_permalink(); ?>&subject=Viso <?= the_title(); ?>" target="_blank">
              <!-- <a id="#email-to-friend-form" class="popmake-mail-to-friend-pop-up"> -->
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </a>
              <a onclick="printTrigger('iFramePdf');" target="_blank">
                <i class="fa fa-print" aria-hidden="true"></i>
              </a>
            </div>
          </div>
          <h3><?php the_field('tag_line') ?></h3>
          <h6 class="designer">Designer: <?php the_field('designer'); ?></h6>
        </div>
        <div class="print-header">
          <img src=" <?php echo get_template_directory_uri(); ?>/img/viso.svg" alt="Viso Inc"/>
          <address>
           <?php the_field('address', 'option'); ?>
          </address>
        </div>
      </section><!-- single-collection-title -->
      <section class="single-collection-photos">
        <div class="images">
          <div class="collection-slider">
            <?php 
              class Finish
                  {
                      public $name;
                      public $id;
                      public $url;
                  }
              $finishs = array();
            ?>
            <?php $images = get_field('images');  
            foreach($images as $_image){
              $src = $_image['image']['url'];
              $alt = $_image['image']['alt']; 
              $name = '';
              $id = '';

              if($_image['finish_example'] == 1){
                $thumbnail = $_image['finish_thumbnail']['url'];
                $name = strtolower($_image['finish_name']);
                $id = str_replace (' ', '', $name);
                
                $finish = new Finish();
                $finish->name = $name;
                $finish->id = $id;
                $finish->url = $thumbnail;
                
                array_push($finishs, $finish); 
              }; ?>
              <div>
                <div id="<?php echo $id; ?>" class="slide collection" style="background-image: url( <?= $src; ?> );"></div>
              </div>
            <? } ?>

          </div>
        </div>
        <div class='print-gallery clearfix'>
          <?php 
          $images = get_field('images'); 

          foreach($images as $_image){
              $src = $_image['image']['url'];?>
          <img src=<?php echo $src; ?>>
         <? }  ?>
        </div>
        <div class="social-share">
          <?php echo do_shortcode('[Sassy_Social_Share]') ?>
        </div>
      </section> <!-- single-collection-photos -->
      <section class="single-collection-info">
          <?php 
          if (sizeof($finishs) > 0){?>
          <section class="variations flex">
            <?php foreach ($finishs as $finish) { ?>
              <div data-finish="<?= $finish->id; ?>" class="variation">
                <img src=" <?= $finish->url; ?> " alt="">
                <h6><?= $finish->name; ?></h6>
              </div>
            <?php }   
             if(get_field('other_variations_to_add')){
                if( have_rows('variations') ):
                    while ( have_rows('variations') ) : the_row();
                        if( have_rows('variation_images') ):
                          while ( have_rows('variation_images') ) : the_row();
                            $name = get_sub_field('name');
                            $image = get_sub_field('image'); ?>
                      <div data-finish="none" class="variation">
                        <img src=" <?= $image['url']; ?> " alt="">
                        <h6><?= $name; ?></h6>
                      </div>
             <?php endwhile; endif; ?>
             <?php endwhile; endif; ?>
           <?php } ?>
          </section>
          <?php } else { ?>
            <section class="nofinishesSpace"></section>
          <?php } ?>
          <section class="details">
            <div class="toggledown">
              <div class="visable flex">
                <div class='circle'>
                  <div class='x'></div>
                </div>
                <h4>Product Details</h4>
              </div>
              <div class="see-more">
                <?php the_content(); ?>
              </div>
            </div>
            <div class="toggledown">
              <div class="visable flex">
                <div class='circle'>
                  <div class='x'></div>
                </div>
                <h4>Downloads</h4>
              </div>
              <div class="see-more">
                <?php $frontpage_id = get_option( 'page_on_front' ); $catalogueURL = get_field( "catalogue_upload", $frontpage_id ); ?>
                <ul class="downloadLinks">
                  <li><a href="<?= $catalogueURL; ?>" download="" target="_blank">Download catalogue PDF</a></li>
                  <li><a href="<?php echo get_bloginfo('url')?>/installation-manuals/">Installation Manuals</a></li>
                  <?php $spec_image = get_field('specs_image'); ?>
                  <li><a target="_blank" class="specs" href=<?= $spec_image['url']; ?> download />Specs</a></li>
                </ul>
              </div>
            </div>
            
            <a class="inquire" href="<?php echo get_bloginfo('url')?>/contact/?msg=<?php echo urlencode('Please contact me about the following collection: '.get_the_title())?>">Inquire About This Product</a>
            <ul class="underInfo">
              <li><a href="<?php echo get_bloginfo('url')?>/shipping-information/">Shipping Info</a></li>
              <li><a href="<?php echo get_bloginfo('url')?>/trade/">Trade Customer Information</a></li>
              <li class="activate-newsletter-popup"><a>Residential Customer Newsletter Signup</a></li>
              <li><button class="popmake-request-print-catalogue" id="requestcatalogueseemore">Request Print Catalogue</button></li>
              <li class="custom-link">Have a project? <a href="<?php echo get_bloginfo('url'); ?>/custom-finishes">See all custom finishes.</a></li>
            </ul>
          </section>
          <?php $product_codes = get_field('product_codes', 'option'); ?>
          <img src= <?= $product_codes['url']; ?> class="productCodes">
      </section>  <!-- single-collection-info -->
      <section class="single-collection-projects">
        <?php    
          function my_posts_where( $where ) {
            $where = str_replace("meta_key = 'images_", "meta_key LIKE 'images_", $where);
            return $where;
          }
          add_filter('posts_where', 'my_posts_where');
          $currentID = get_the_ID();

          // args
          $args = array(
            'post_type'   => 'projects',
            'posts_per_page' => -1,
            'meta_query' => array(
              array(
                'key' => 'images_%_products',
                'value' => $currentID,
                'compare' => '='
              )
            )
          );

        // query
        $the_query = new WP_Query( $args );
        $masterProjectsArray = array();

       if( $the_query->have_posts() ):?>
        <div class="projects">
          <h2>Projects</h2>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
              $creditArray = array();
              $projectId = get_the_id();
              $images = array();
              
              $names = array();
              $credits = array('designer', 'photographer', 'location', 'product');

              foreach ($credits as $credit) {
                $fieldValue = get_field($credit, $projectId);
                array_push($names, $fieldValue);
              }
              if( have_rows('other_credits', $projectId) ): while ( have_rows('other_credits', $projectId) ) : the_row();

                  // display a sub field value
                array_push($credits, get_sub_field('custom_title'));
                array_push($names, get_sub_field('custom_txt'));

              endwhile;endif;

              for ($i = 0; $i < sizeOf($credits); $i++) { 
                if($names[$i] !== ''){ 
                  $creditArray[$credits[$i]] = $names[$i];
                }
               } 
              if( have_rows('images') ): 

                while ( have_rows('images') ) : the_row();
                    $product = get_sub_field('products');
                    if ($product === $currentID){
                      $image = get_sub_field('image');
                      array_push($images, $image['url']);
                    }
              endwhile; else : endif; 
              $masterProjectsArray[$projectId] = array(
                                          'title' => get_the_title(),
                                          'images' => $images,
                                          'credits' => $creditArray
                                          ); ?>
            <?php endwhile;?>
            <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
          <ul class="project-thumbnails clearfix">
            <?php $projectCount = sizeOf($masterProjectsArray);
           if ($projectCount <= 3){ 
            foreach ($masterProjectsArray as $id => $project) { ?>
                <li data-project="<?= $id ?>" style="background-image: url(<?php echo $project['images'][0]; ?>);">
                    <div class="overlay">
                      <h4><?php echo $project['title']; ?></h4>
                    </div>
                  </li>
              <?php } ?> <!-- end of under three li loop -->
            <?php } else { //if there are more than three projects
                $i = 0;
                $OverIDs = array();
                foreach ($masterProjectsArray as $id => $project) {
                  if ($i < 3){ ?>
                  <li data-project="<?= $id ?>" style="background-image: url(<?php echo $project['images'][0]; ?>);">
                    <div class="overlay">
                      <h4><?php echo $project['title']; ?></h4>
                    </div>
                  </li>
                  <?php $i++; 
                  } else { 
                    array_push($OverIDs, $id);  
                  } ?> <!-- end of $i iteration -->
                <?php }; ?> <!-- end of reg over three li loop -->
                <?php if (sizeof($OverIDs) > 0) {?>
                  <li class="greaterThan4">
                    <ul class="project-thumbnails-slider">
                      <?php foreach ($OverIDs as $id) {
                      $project = $masterProjectsArray[$id]; ?>
                      <li data-project="<?= $id ?>" style="background-image: url(<?php echo $project['images'][0]; ?>);">
                        <div class="overlay">
                          <h4><?php echo $project['title']; ?></h4>
                        </div>
                      </li>
                      <?php } ?> <!-- end of over4 fooreach loop -->
                    </ul>
                  </li>
                <?php }; ?> <!-- end of if Over Ids has entries -->
              <?php } ?> <!-- end of if there are more than three projects -->
          </ul>
          <div id="projectJSON"><?php echo json_encode($masterProjectsArray); ?></div> 

          <section id="project-popup" class="project-popup">
            <button id="close-project-popup" class="popup-close"><i class="fa fa-close" aria-hidden="true"></i></button>
            <div class="container popup-container">
              <h2 class="page-title"><?php echo the_title(); ?> - <span id="projectTitle"></span></h2>
              <section class="project-credits flex">
                <ul class="flex">
                <!--  this information is populated with javascript -->
                </ul>
                <div class="controls">
                  <h6 class="count"><span id="current">1</span>/<span id="total"></span></h6>
                  <?php if($projectCount > 1){?>
                    <button id="nextProject" class="btn">Next Project</button>
                  <?php } ?>
                </div>
              </section>
              <section class="single-project-photos">
                <div class="images">
                  <div class="collections-project-slider">
                    <!--  this information is populated with javascript -->
                  </div>
                </div>
              </section>
            </div>
          </section><!--  project pop up -->
        </div> <!-- projects -->
        <?php endif; ?>
        <a class="back-button" href="<?= site_url();?>/collections"><h6>← Back to All Collections</h6></a>
      </section><!-- single-collection-projects -->
      <iframe id="iFramePdf" src="<?= $spec_image['url']; ?>" style="display:none;"></iframe>
      <script>
        function printTrigger(elementId) {
            var getMyFrame = document.getElementById(elementId);
            getMyFrame.focus();
            window.print();
            getMyFrame.contentWindow.print();
        }
      </script>
    <? endwhile; endif; ?>
    </div>
   
  </div>
</main>

<?php get_footer(); ?>
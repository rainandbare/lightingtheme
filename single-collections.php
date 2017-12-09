<?php get_header(); ?>
<main class="main-page single-collections"> 
  <div class="container flex">
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <section class="single-collection-photos">
        <div class="images">
          <div class="collection-slider">
            <?php $images = get_field('images');  
            foreach($images as $_image){
               $src = $_image['image']['url'];
               $alt = $_image['image']['alt']; ?>
               <div><img src=" <?= $src; ?> " alt="<?= $alt; ?>"></div>
            <? } ?>
          </div>
        </div>
        <div class="social-share">Social Share</div>
        <div class="projects">
          <div class="collection-slider">
            <?php $currentID = get_the_ID(); ?>
            <?php   
              $args = new WP_Query(array(
                  'post_type' => 'attachment',
                  'posts_per_page' => -1,
                  'oderby' => 'meta_value_num',
                  'order' => 'ASC',
                  'post_status' => 'any',
                  'post_parent' => null,
                  'meta_query' => array(
                      array(
                          'key' => 'collection_used',
                          'value' => $currentID ,
                          'compare' => 'LIKE'
                      )
                  )
              ));
              while ( $args->have_posts() ) : $args->the_post();
                $imageArray = wp_get_attachment_image_src( get_the_ID(), 'full'); ?>              
                <div><img src="<?= $imageArray[0] ?>"></div>
              <?php endwhile; wp_reset_postdata();?> 
          </div>
        </div>
        <div class="send">
          <a href="#email-to-friend-form" class="send-to-friend">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
          </a>
          <a href="" target="_blank">
            <i class="fa fa-print" aria-hidden="true"></i>
          </a>
        </div>
      </section>
      <section class="single-collection-info">
          <h1 class="single-product-title"><?= the_title(); ?></h1> 
          <h3><?php the_field('tag_line') ?></h3>
          <h6 class="designer">Designer: <?php the_field('designer'); ?></h6>
          <section class="variations">
            <?php if( have_rows('variations') ):
                  while ( have_rows('variations') ) : the_row(); 
                    $variationName = get_sub_field('variation_name'); ?>
                        <?php if( have_rows('variation_images') ):
                            while ( have_rows('variation_images') ) : the_row(); 
                              $imageURL = get_sub_field('image'); ?>
                                <div class="variation"><img src=" <?= $imageURL['url']; ?> " alt=""></div>
                                <h6><?php the_sub_field('name'); ?></h6>
                          <?php endwhile;
                        else :
                            // no rows found
                        endif; ?>
                  <?php endwhile;
              else :
                  // no rows found
              endif;  ?>
          </section>
          <section class="details">
            <div class="dropdown">
              <div class="visable flex">
                <div class="circle-plus closed">
                  <div class="circle">
                    <div class="horizontal"></div>
                    <div class="vertical"></div>
                  </div>
                </div>
                <h4>Product Details</h4>
              </div>
              <div class="see-more">
                <?php the_content(); ?>
              </div>
            </div>
            <div class="dropdown">
              <div class="visable flex">
                <div class="circle-plus closed">
                  <div class="circle">
                    <div class="horizontal"></div>
                    <div class="vertical"></div>
                  </div>
                </div>
                <h4>Downloads</h4>
              </div>
              <div class="see-more">
                <a href="">Download catalogue PDF</a>
                <?php get_template_part( 'templates/catalogue', 'links') ?>
                <a href="<?php echo get_bloginfo('url')?>/installation-manuals/">View Installation Manuals</a>
                <a target="_blank" class="specs" href="<?= $spec_image['url']; ?>" download />Specs</a>
              </div>
            </div>
            <div><a class="btn" href="<?php echo get_bloginfo('url')?>/contact/?msg=<?php echo urlencode('Please contact me about the following collection: '.get_the_title())?>">Inquire About This Product</a></div>
            <div><a href="">Shipping Info</a></div>
            <div><a href="">Trade Customer Information</a></div>
            <div><a href="">Retail Customer Newsletter Signup</a></div>
          </section>
      </section>
    <? endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>
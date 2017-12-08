<?php get_header(); ?>
<main class="main-page"> 
  <section class="single-collection-header">
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1><?= the_title(); ?></h1> 
      <?php  
        $id = get_the_ID();
        $terms = wp_get_post_terms( $id, 'collectiontypes'); 
        foreach($terms as $_term) {
           if($_term->slug!='new' && $_term->slug!='classic'){
            $term_slug = $_term->slug; 
          }
        } ?>
      <ul class="category-list">       
        <li class="sort-sign filter" data-filter="all" >
          <a href="<?php echo get_bloginfo('url');?>/collections/">
            <span>All</span>
          </a>
        </li>
        <?php 
          $categories = get_terms( 'collectiontypes' );
          foreach($categories as $category){ ?>
            <li>
              <a href="<?php echo get_bloginfo('url').'/collections?sort='.$category->slug; ?>">
                <span><?php echo $category->name ?></span>
              </a>
            </li>
        <?php } ?>              
      </ul>
<!--       ADD PAGE NAVIGATION -->
    </section>
    <section class="single-collection-main">
      <section class="column-photos">
        <div class="gallery">
          <div class="collection-slider-feature">
            <?php 
            $images = get_field('images');  
            foreach($images as $_image){
               $src = $_image['image']['url'];
               $alt = $_image['image']['alt']; ?>
               <div class="collection-slide"><img src=" <?= $src; ?> " alt="<?= $alt; ?>"></div>
            <? } ?>
          </div>
          <div class="collection-slider-nav">
            <?php 
            $images = get_field('images');  
            foreach($images as $_image){
               $src = $_image['image']['url'];
               $alt = $_image['image']['alt']; ?>
               <div class="collection-slide"><img src=" <?= $src; ?> " alt="<?= $alt; ?>"></div>
            <? } ?>
          </div>
        </div>
        <div class="options">
          <?php if( have_rows('variations') ):
              while ( have_rows('variations') ) : the_row(); 
                $variationName = get_sub_field('variation_name'); ?>
                  <h3><?= $variationName ?></h3>
                    <?php if( have_rows('variation_images') ):
                        while ( have_rows('variation_images') ) : the_row(); 
                          $imageURL = get_sub_field('image'); ?>
                            <img src=" <?= $imageURL['url']; ?> " alt="">
                            <h6><?php the_sub_field('name'); ?></h6>
                      <?php endwhile;
                    else :
                        // no rows found
                    endif; ?>
              <?php endwhile;
          else :
              // no rows found
          endif;  ?>
        </div>
      </section>
      <section class="column-info">
        <div class="collection-content">
          <?php the_title();?>
          <?php the_field('tag_line') ?>
          <?php the_content(); ?>
        </div>
        <div class="designer">
          <h3>Designer</h3>
          <?php the_field('designer'); ?> 
        </div>
        <div class="inquire">
          <a class="btn redbtn" href="<?php echo get_bloginfo('url')?>/contact/?msg=<?php echo urlencode('Please contact me about the following collection: '.get_the_title())?>">Inquire About This Product</a>
        </div>
        <div class="share"></div>
      </section>
      <section class="column-action">
        <?php if($spec_thumb = get_field('spec_thumbnail')):?>
          <div class="configuration">
            <div>CONFIGURATIONS</div>
            <div class="config-img">
              <img src=" <?= $spec_thumb['sizes']['thumbnail']; ?> "/>
            </div>
          </div>
        <?php endif;?>
        <?php $currentID = get_the_ID(); ?>
        <div class="projects">
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
                <img src=" <?= $imageArray[0] ?> ">
                <?php endwhile; wp_reset_postdata();?> 



<!--           saving this in case i need to refer to it     -->
         <!--  <?php $args = array(
            'post_status'=>'publish',
            'post_type'=>'projects',
            'posts_per_page'=>-1,
            'meta_query'=>array(
              'relation' => 'AND',
                array(
                  'key'=>'collection_id',
                  'value' => get_the_ID(),
                  'compare' => '='
              )));
            $projects = new WP_Query($args);?>             
          <?php if($projects->found_posts>0):?>
            <h3>PROJECT IMAGES</h3>
              <div class="project-images">
              <? $postCount = 0; ?>
              <?php $postid = get_the_ID(); ?> 
              <?php while ($projects->have_posts()): $projects->the_post();
                $image = get_the_post_thumbnail_url( get_the_ID());
                $permalink = get_permalink( get_the_ID() );?>
                <div class="">
                  <a href="<? echo $permalink ?>">
                    <img src="<?= $image; ?>"/>
                  </a>
                </div>
               <?php endwhile; endif; wp_reset_postdata();?> -->
        </div>
        <div class="catalogue">
          <?php get_template_part( 'templates/catalogue', 'links') ?>
        </div>
        <div class="specs">
          <ul>
            <li>
              <a href="<?php echo get_bloginfo('url')?>/installation-manuals/">View Installation Manuals</a>
            </li>
            <?php $spec_image = get_field('specs_image'); ?>
            <?php if($spec_image):?>
                <li>
                  <a href="#view-specs" class="specs">VIEW SPECS</a>
                </li>
                <li>
                  <a target="_blank" class="specs" href="<?= $spec_image['url']; ?>" download />DOWNLOAD SPECS</a>
                </li>
              
          </ul>
          <img src="<?= $spec_image['url']; ?>"/> 
          <?php endif;?>
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
    </section>
  <? endwhile; endif; ?>
  </main>
  <?php get_footer(); ?>
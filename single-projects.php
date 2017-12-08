<?php get_header(); ?>
 <main class="main-page single-project">
	<div class="container">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>  
      <section class="single-collection-header">
        <h6>Project</h6> 
        <h1><?php the_title(); ?></h1>
        <?php  
          $id = get_the_ID();
          $terms = wp_get_post_terms( $id, 'projecttypes'); 
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
            $categories = get_terms( 'projecttypes' );
            foreach($categories as $category){ ?>
              <li>
                <a href="<?php echo get_bloginfo('url').'/collections?sort='.$category->slug; ?>">
                  <span><?php echo $category->name ?></span>
                </a>
              </li>
          <?php } ?>              
        </ul>
      </section>
      <section class="credits">
        <?php 
          $credits = array('designer', 'photographer', 'location', 'product');
          foreach ($credits as $credit) {
            $fieldValue = get_field($credit);
            if($fieldValue !== ''){ ?>
              <h3><?= $credit ?></h3>
              <p><?= $fieldValue ?></p>
            <?php } ?>
          <?php } ?>
      </section>
      <?php
      $images = get_field('project_gallery');
      if( $images ): ?>
         <div class="gallery">
          <div class="collection-slider-feature">
            <?php 
            foreach($images as $image){
               $src = $image['url']; 
               ?>
               <div class="collection-slider"><img src=" <?= $src; ?> "></div>
            <? } ?>
          </div>
          <div class="collection-slider-nav">
            <?php 
            foreach($images as $image){
               $src = $image['url']; ?>
               <div class="collection-slider"><img src=" <?= $src; ?> "></div>
            <? } ?>
          </div>
        </div>
        <section class="related">
           
        </section>




    <?php endif; ?>
    <?php endwhile; ?>
	</div>
</main> <!-- /.main -->

<?php get_footer(); ?>
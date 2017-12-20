<?php get_header(); ?>
<main class="main-page single-collections"> 
  <div class="container flex">
    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
              $name = strtolower($_image['finish_name']);
              $id = str_replace (' ', '', $name);

              if($_image['finish_example'] == 1){
                $thumbnail = $_image['finish_thumbnail']['url'];
                
                $finish = new Finish();
                $finish->name = $name;
                $finish->id = $id;
                $finish->url = $thumbnail;
                
                array_push($finishs, $finish); 
              };
              ?>
               <div><img id=<?php echo $id; ?> class="slide" src=" <?= $src; ?> " alt="<?= $alt; ?>"></div>
            <? } ?>
          </div>
        </div>
        <div class="social-share">
          <div class="addtoany_share_save_container addtoany_content_bottom suzettes_add_to_any flex">
            <div class="a2a_kit a2a_kit_size_20 addtoany_list" data-a2a-url="<?php the_permalink(); ?>" data-a2a-title="<?php the_title(); ?>" style="line-height: 32px;">
            <a class="a2a_button_sms" href="sms:?&body=it%20is%20working%20sorta">
              <span class="phoneLimiter a2a_svg">
                <svg viewBox="0 0 263 483" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g id="phone" fill-rule="nonzero">
                    <path d="M229.480392,0 L33.5196078,0 C14.954902,0 0,14.9010638 0,33.3989362 L0,449.601064 C0,468.098936 14.954902,483 33.5196078,483 L229.480392,483 C248.045098,483 263,468.098936 263,449.601064 L263,33.3989362 C263,14.9010638 248.045098,0 229.480392,0 Z M121.186275,41.106383 L141.813725,41.106383 C149.033333,41.106383 154.705882,46.7585106 154.705882,53.9521277 C154.705882,61.1457447 149.033333,66.7978723 141.813725,66.7978723 L121.186275,66.7978723 C113.966667,66.7978723 108.294118,61.1457447 108.294118,53.9521277 C108.294118,46.7585106 113.966667,41.106383 121.186275,41.106383 Z M152.127451,436.755319 L110.872549,436.755319 C103.652941,436.755319 97.9803922,431.103191 97.9803922,423.909574 C97.9803922,416.715957 103.652941,411.06383 110.872549,411.06383 L152.127451,411.06383 C159.347059,411.06383 165.019608,416.715957 165.019608,423.909574 C165.019608,431.103191 159.347059,436.755319 152.127451,436.755319 Z M237.215686,380.234043 L25.7843137,380.234043 L25.7843137,92.4893617 L237.215686,92.4893617 L237.215686,380.234043 Z" id="Shape"></path>
                  </g>
                </svg>
              </span>
              <span class="a2a_label">Send Text Message</span>
            </a>
            <a class="a2a_button_facebook" href="/#facebook" title="Facebook" rel="nofollow noopener" target="_blank"><span class="a2a_svg a2a_s_facebook" style="background-color: transparent;">
              <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z"></path></svg></span>
              <span class="a2a_label">Facebook</span>
            </a>
            <a class="a2a_button_twitter" href="/#twitter" title="Twitter" rel="nofollow noopener" target="_blank">
              <span class="a2a_svg a2a_s_twitter" style="background-color: transparent;"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M28 8.557a9.913 9.913 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.738 9.738 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.893 9.893 0 0 1-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013 0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z"></path></svg></span><span class="a2a_label">Twitter</span>
            </a>
            <a class="a2a_button_pinterest" href="/#pinterest" title="Pinterest" rel="nofollow noopener" target="_blank">
              <span class="a2a_svg a2a_s_pinterest" style="background-color: transparent;">
                <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M16.539 4.5c-6.277 0-9.442 4.5-9.442 8.253 0 2.272.86 4.293 2.705 5.046.303.125.574.005.662-.33.061-.231.205-.816.27-1.06.088-.331.053-.447-.191-.736-.532-.627-.873-1.439-.873-2.591 0-3.338 2.498-6.327 6.505-6.327 3.548 0 5.497 2.168 5.497 5.062 0 3.81-1.686 7.025-4.188 7.025-1.382 0-2.416-1.142-2.085-2.545.397-1.674 1.166-3.48 1.166-4.689 0-1.081-.581-1.983-1.782-1.983-1.413 0-2.548 1.462-2.548 3.419 0 1.247.421 2.091.421 2.091l-1.699 7.199c-.505 2.137-.076 4.755-.039 5.019.021.158.223.196.314.077.13-.17 1.813-2.247 2.384-4.324.162-.587.929-3.631.929-3.631.46.876 1.801 1.646 3.227 1.646 4.247 0 7.128-3.871 7.128-9.053.003-3.918-3.317-7.568-8.361-7.568z"></path></svg>
              </span>
              <span class="a2a_label">Pinterest</span>
            </a>
            </div>
          </div>
        </div>
        <?php   
            $currentID = get_the_ID(); 
            $args = new WP_Query(array(
                'post_type' => 'attachment',
                'posts_per_page' => -1,
                'orderby' => 'meta_value_num',
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
            ));?>
            <?php 
              class ProjectImage
                {
                    public $projectName;
                    public $projectId;
                    public $imageURL;
                } 
                $projects = array();  ?>
          
            <?php  
                while ( $args->have_posts() ) : $args->the_post();
                $parents = get_post_ancestors( $post->ID );
                $imageArray = wp_get_attachment_image_src( get_the_ID(), 'full');           
                //for each parentID in $parents array
                foreach ($parents as $id) {
                  //if parent is project 
                  if(get_post_type($id) == 'projects'){
                    //associate image and id and store them in a masterProjectsArray
                    $projectImage = new ProjectImage();
                    $projectImage->projectName = get_the_title($id);
                    $projectImage->projectId = $id;
                    $projectImage->imageURL = $imageArray[0];
                      
                    array_push($projects, $projectImage); 
                  }
                } 

              endwhile;
                // dump($projects);
              ?>
              <?php wp_reset_postdata(); ?> 
              <?php if(sizeOf($projects) > 0){ ?>
              <div class="projects">
              <h2><?php echo the_title(); ?> Projects</h2>
              <ul class="project-thumbnails">
                <?php 
                $usedIds = array();
                $masterProjectsArray = array();
                $creditArray = array();

                 foreach ($projects as $project){
                  //if this is the first instance of the projectID
                  if(in_array($project->projectId, $usedIds) != 1){ 
                    // make a new item in the soon to be Javascript Object
                    $id = $project->projectId;
                    $credits = array('designer', 'photographer', 'location', 'product');
                    foreach ($credits as $credit) {
                      $fieldValue = get_field($credit, $id);
                      if($fieldValue !== ''){ 
                        $creditArray[$credit] = $fieldValue;
                      }
                     } 
                      $masterProjectsArray[$id] = array(
                                                  'title' => $project->projectName,
                                                  'images' => array( $project->imageURL ),
                                                  'credits' => $creditArray
                                                  );
                    ?>
                    <li data-project=" <?= $id ?> " style="background-image: url(<?php echo $project->imageURL; ?>);">
                      <div class="overlay">
                        <?php echo $project->projectName; ?>
                      </div>
                    </li>
                    <?php //put the id in the used ids array
                    array_push($usedIds, $id);
                  } else {
                      array_push($masterProjectsArray[$project->projectId]['images'], $project->imageURL);
                    // add your image to the Image Array in the soon to be Javascript Object
                  }?>
                <?php } ?>
                  <div id="projectJSON"><?php echo json_encode($masterProjectsArray); ?></div> 
              </ul>
              <section id="project-popup" class="project-popup">
                <button id="close-project-popup" class="popup-close"><i class="fa fa-close" aria-hidden="true"></i></button>
                <div class="container">
                  <h2 class="page-title"><?php echo the_title(); ?> at <span id="projectTitle"></span></h2>
                  <section class="project-credits flex">
                    <ul class="flex">
                    </ul>
                    <div class="controls">
                      <h6 class="count"><span id="current">1</span>/<span id="total"></span></h6>
                      <button id="nextProject" class="btn">Next Project</button>
                    </div>
                  </section>
                <section class="single-project-photos">
                  <div class="images">
                    <div class="collections-project-slider">
                    </div>
                  </div>
                </section>
                </div>
              </section>
            </div>      
            <?php } ?>
      </section>
      <section class="single-collection-info">
          <h1 class="single-product-title"><?= the_title(); ?></h1> 
          <h3><?php the_field('tag_line') ?></h3>
          <h6 class="designer">Designer: <?php the_field('designer'); ?></h6>
          <section class="variations flex">
            <?php 
              foreach ($finishs as $finish) { ?>
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
                      <div class="variation">
                        <img src=" <?= $image['url']; ?> " alt="">
                        <h6><?= $name; ?></h6>
                      </div>
             <?php endwhile; endif; ?>
             <?php endwhile; endif; ?>
           <?php } ?>
          </section>
          <section class="details">
            <div class="toggledown">
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
            <div class="toggledown">
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
                <?php $frontpage_id = get_option( 'page_on_front' ); $catalogueURL = get_field( "catalogue_upload", $frontpage_id ); ?>
                <ul class="downloadLinks">
                  <li><a href="<?= $catalogueURL; ?>" download="" target="_blank">Download catalogue PDF</a></li>
                  <li><button id="requestcatalogueseemore">Request Print Catalogue</button></li>
                  <li><a href="<?php echo get_bloginfo('url')?>/installation-manuals/">Installation Manuals</a></li>
                  <?php $spec_image = get_field('specs_image'); ?>
                  <li><a target="_blank" class="specs" href=<?= $spec_image['url']; ?> download />Specs</a></li>
                </ul>
              </div>
            </div>
            <a class="btn inquire" href="<?php echo get_bloginfo('url')?>/contact/?msg=<?php echo urlencode('Please contact me about the following collection: '.get_the_title())?>">Inquire About This Product</a>
            <ul class="underInfo">
              <li><a class="uppercase" href="<?php echo get_bloginfo('url')?>/shipping-information/">Shipping Info</a></li>
              <li><a href="<?php echo get_bloginfo('url')?>/trade/">Trade Customer Information</a></li>
              <li><a href="http://eepurl.com/-4aaH" target="_blank">Retail Customer Newsletter Signup</a></li>
            </ul>
            <div class="send">
              <a href="#email-to-friend-form" class="send-to-friend">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </a>
              <a href="" target="_blank">
                <i class="fa fa-print" aria-hidden="true"></i>
              </a>
            </div>
          </section>
      </section>
    <? endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>
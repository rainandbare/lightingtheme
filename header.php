<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php // Load our CSS ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header class="siteHeader">
  <nav class="midsize-social flex">
    <ul class="nav-utility-links">
      <li><a href="<?= site_url(); ?>/contact-us">Contact</a></li>
      <li><a href="http://eepurl.com/-4aaH" target="_blank">Newsletter</a></li>
    </ul>
    <?php get_template_part( 'templates/nav', 'social' ); ?>
  </nav>
  <?php if(is_front_page()){ ?>
    <nav class="flex nav-topBar">
  <?php } else { ?>
 <!--  <nav class="flex nav-topBar" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/QASH.jpg);"> -->
<?php $frontpage_id = get_option( 'page_on_front' ); ?>
<?php $headerBackground = get_field('header_background_image', $frontpage_id); ?>
<nav class="flex nav-topBar" style="background-image: url(<?php echo $headerBackground['url'] ?>);">
  <?php } ?>
    <div class="flex nav-main-container">
      <!-- for seo purposes -->
      <?php if(is_front_page()){?>
        <h1 class="logo-top">
          <a class="logo-home-link" href="<?= site_url();?>" title="Viso Inc">
            <img src=" <?php echo get_template_directory_uri(); ?>/img/viso.svg" alt="Viso Inc"/>
          </a>
        </h1>   
      <?php } else { ?>
        <h2 class="logo-top">
          <a class="logo-home-link" href="<?= site_url();?>" title="Viso Inc">
            <img src=" <?php echo get_template_directory_uri(); ?>/img/viso.svg" alt="Viso Inc"/>
          </a>
        </h2>   
      <?php } ?>
    </div>
   
    <div class="flex fullscreen-nav">
      <nav id="nav-main">
          <ul class="nav-main-overalList flex">
            <li class="dropdown">
              <button class="dropbtn toggleButton">Inside Viso</button>
              <div class="dropdown-content">
                <div class="innerWrapper flex">
                  <section class="dropdownSection-mainMenu"> 
                    <?php suzette_main_menu(); ?> 
                    <ul class="otherMenuLink">
                      <li><a href="<?= site_url(); ?>/shipping-information">Shipping Information</a></li>
                    </ul>
                  </section>
                  <section class="dropdownSection-about">
                    <div class="whoWeAre">
                      <h4>Who We Are</h4>
                      <a class="about-link" href="<?= site_url(); ?>/about">
                        <p class="special">At VISO, our goal is simple. We design unique, contemporary decorative light fixtures for our customers. We manufacture using only the highest quality materials, provide unparalleled customer service and always strive to deliver on time and on budget.</p>
                      </a>
                    </div>
                    <ul class="otherMenuLink">
                      <li><a href="<?= site_url(); ?>/mission">Misson</a></li>
                    </ul>
                  </section>
                  <section class="dropdownSection-feature"> 
                    <div class="temp-image-control">
                      <?php $frontpage_id = get_option( 'page_on_front' ); ?>
                      <?php $featureInfo = get_field( 'dropdown_photo_info', $frontpage_id ); 
                      ?>
                      <a href="<?= $featureInfo['dropdown_photo_link'] ?>"><img src=" <?= $featureInfo['dropdown_photo']['url'];  ?> "></a>
                    </div>
                    <?php
                        //$args = array( 'numberposts' => '1' );
                        //$recent_posts = wp_get_recent_posts( $args );
                        //foreach( $recent_posts as $recent ){
                        //    printf( '<a href="%1$s">%2$s</a>',
                        //         esc_url( get_permalink( $recent['ID'] ) ),
                        //         apply_filters( 'the_title', $recent['post_title'], $recent['ID'] )
                        //     );
                        //}
                    ?>
                  </section>
                </div>
              </div>
            </li>
            <li class="nav-main-link">
              
            </li>
          </ul>
      </nav>      
      <ul class="flex nav-utiity-container">
        <li>
          <h4>*Free Shipping</h4>
          <p class="shipping-info">More Information</p>
        </li>
        <li class="topBar-downloadLink">
            <?php $catalogueURL = get_field( "catalogue_upload", $frontpage_id ); ?>
            <a class="btn" href="<?= $catalogueURL; ?>" download="" target="_blank">DOWNLOAD CATALOGUE</a>
        </li>
        <li class='topBar-search'>   
          <div class="top-header-search">
            <?php get_search_form(); ?>
          </div>
        </li>
        <li>
          <a class="flex" href="http://simple.lighting">
            <div class="simple-logo">
              <img src="<?php echo get_template_directory_uri(); ?>/img/simple-logo.png" alt="Simple by Viso Logo">
            </div>
          </a>
        </li>
      </ul>
    </div>
    <div id="mobile-menu-icon" class="mobile-menu-icon">
      <!-- <i class="fa fa-bars" aria-hidden="true"></i> -->
      <div id="nav-icon4">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </nav>
</header><!--/.header-->

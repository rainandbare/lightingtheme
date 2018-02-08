<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta name="format-detection" content="telephone=no"> -->
  <meta name="p:domain_verify" content="4f78473abd894edd95cc5815f870074a"/>
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0023/4281.js" async="async"></script>
  <?php // Load our CSS ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php if(is_front_page()){ ?>
  <header class="siteHeader">
<?php } else { ?>
<?php $frontpage_id = get_option( 'page_on_front' ); ?>
<?php $headerBackground = get_field('header_background_image', $frontpage_id); ?>
  <header class="siteHeader" style="background-image: url(<?php echo $headerBackground['url'] ?>);">
<?php } ?>
  <nav class="midsize-social flex">
    <ul class="nav-utility-links">
      <li><a href="<?= site_url(); ?>/contact-us">Contact</a></li>
      <li class="activate-newsletter-popup">Newsletter</li>
    <!--   <li><a href="http://eepurl.com/-4aaH" target="_blank">Newsletter</a></li> -->
    </ul>
    <?php get_template_part( 'templates/nav', 'social' ); ?>
  </nav>
    <nav class="flex nav-topBar">
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
                <div class="innerWrapper clearfix">
                  <section class="dropdownHalf">
                    <section class="dropdownSection-mainMenu"> 
                      <?php suzette_main_menu(); ?> 
                    </section>
                    <section class="dropdownSection-about">
                      <div class="whoWeAre">
                        <h4>Who We Are</h4>
                        <?php $frontpage_id = get_option( 'page_on_front' ); ?>
                        <a class="about-link" href="<?= site_url(); ?>/about">
                          <p class="special"> <?= get_field( 'about_us_text', $frontpage_id ); ?> </p>
                        </a>
                      </div>
                    </section>
                    <section class="dropdownSection-otherLinks">
                      <ul class="otherMenuLink clearfix">
                        <li><a href="<?= site_url(); ?>/shipping-information">Shipping Information</a></li>
                        <li><a href="<?= site_url(); ?>/mission">Mission</a></li>
                      </ul>
                    </section>
                  </section>
                  <section class="dropdownSection-feature"> 
                    <div class="temp-image-control">
                      <?php $featureInfo = get_field( 'dropdown_photo_info', $frontpage_id ); ?>
                      <a href="<?= $featureInfo['dropdown_photo_link'] ?>"><img src=" <?= $featureInfo['dropdown_photo']['url'];  ?> "></a>
                    </div>
                  </section>
                </div>
              </div>
            </li>
          </ul>
      </nav>      
      <ul class="flex nav-utiity-container">
        <li class="topBar-shipping">
          <a class="shipping-info" href="<?= site_url();?>/shipping-information/#free-shipping">
            <h4>*Free Shipping</h4>
            <p>More Information</p>
          </a>
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
<!--         <li class="topBar-simple-logo">
          <a class="flex" target="_blank" href="http://lightbysimple.com/">
            <div class="simple-logo">
              <svg viewBox="0 0 577 201" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>simple-logo</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g id="simple-logo">
                          <g class="svg-simple-blue" id="Group" transform="translate(289.000000, 100.500000) scale(-1, 1) rotate(-180.000000) translate(-289.000000, -100.500000) " fill-rule="nonzero">
                              <path d="M440.3,199 C433.7,195 434,198.1 434,123.8 C434,58.8 434.1,56.4 436,53.3 C438.5,49.1 443.2,46.8 449,46.8 C454.8,46.8 459.5,49.1 462,53.3 C463.9,56.4 464,58.8 464,123.8 C464,198.1 464.3,195 457.7,199 C455.6,200.4 452.7,201 449,201 C445.3,201 442.4,200.4 440.3,199 Z" id="Shape"></path>
                              <path d="M25.6,146.9 C18.6,144.5 15.7,142.8 10.7,138.1 C4.4,132.2 2.5,127.8 2.5,118.5 C2.6,101.5 9.9,94.4 38,84.5 C49.5,80.5 52.6,78.4 51.6,75.3 C49.3,68.2 30.5,70.3 23,78.5 C18,83.9 10.9,85.6 5.2,82.6 C1,80.4 -0.3,77.1 0.2,70.1 C0.7,63 3.7,58.5 11.4,53.3 C21.5,46.4 40.1,43.7 54.1,47 C71.8,51.2 82,61.7 82,75.8 C82,84.7 80.4,89.4 75.2,95.1 C69.4,101.6 65.2,103.9 49.5,109.5 C36.2,114.2 32.3,116.6 33.3,119.4 C35.2,124.3 46.1,123.9 54.7,118.6 C61.9,114.2 66.3,113.3 71.2,115.3 C76.4,117.5 78.4,120.9 77.8,127 C76.9,135.7 69,143.4 57.2,147 C48.4,149.7 33.7,149.7 25.6,146.9 Z" id="Shape"></path>
                              <path d="M186.7,147.6 C181.5,145.7 177,142.4 173.8,138.2 C171.1,134.8 171,134.8 171,137.2 C171,140.3 167.8,144.5 164,146.5 C159.6,148.8 151.9,148.4 147.9,145.7 C141,141.1 141,141.1 141,96.9 C141,57.5 141,57.3 143.3,54 C146.2,49.6 149.8,47.2 153.5,47 C161.2,46.5 163.1,47 166.8,50.4 L170.5,53.8 L171.1,79.7 C171.7,108.3 172.4,112 178.2,116.2 C182.8,119.4 189.9,119.8 194.7,117 C202.2,112.8 202.4,111.8 203,82.3 C203.5,57.7 203.6,56 205.6,53.3 C212,44.7 226.4,44.6 232,53.2 C233.2,55 233.6,60.8 234,82 C234.5,107.3 234.6,108.7 236.8,112.1 C242.5,121.4 255.4,121.2 262.4,111.7 C264.4,109 264.5,107.3 265,82.5 C265.5,57.7 265.6,56 267.6,53.3 C272.5,46.7 282.6,44.7 289.4,49 C296,53 296.3,54.7 295.7,87.4 C295.2,118 294.8,121.7 290.1,130.8 C286.8,137.3 281.4,142.6 275.2,145.7 C270,148.2 268.5,148.5 258.5,148.5 C248.5,148.5 247,148.3 242.4,145.8 C237.5,143.2 229,134.9 229,132.7 C229,132.2 227.7,133.5 226.1,135.6 C222,141.2 219.1,143.6 213.5,146.1 C207.2,149 192.5,149.8 186.7,147.6 Z" id="Shape"></path>
                              <path d="M358.7,146.6 C355.6,145.3 351.4,143 349.4,141.5 C346.3,139.2 345.9,138.3 346.3,135.7 C347.7,125.8 338.5,115 328.5,115 C324.2,115 318.4,117.3 315.3,120.2 L313,122.3 L313,65.9 C313,11.7 313.1,9.4 315,6.3 C317.6,2 321.8,0 328,0 C334.2,0 338.4,2 341,6.3 C342.8,9.2 343,11.5 343,34.3 L343,59.2 L348,54.6 C354.9,48.5 361.9,46 372.4,46 C386.7,46 397.4,50.4 406.7,60.2 C415.9,70 420,81.4 420,97.5 C420,119.9 410.8,136 393.1,144.8 C386.1,148.2 385,148.5 375.1,148.8 C365.7,149 363.8,148.8 358.7,146.6 Z M374.8,119.4 C391.5,112.5 393.7,87.4 378.4,77.1 C374.1,74.1 365.1,73.2 359.5,75 C354.7,76.6 348.5,82.2 345.7,87.4 C342.8,93 342.8,102 345.7,107.6 C348.2,112.2 353.8,117.6 358.4,119.6 C362.6,121.4 370.3,121.3 374.8,119.4 Z" id="Shape"></path>
                              <path d="M513.5,147.6 C496.1,143.3 482.7,130.5 477.6,113.1 C476.6,109.8 476,103.9 476,98 C476,81.4 480.2,70.6 490.4,60.5 C501,50 511.4,46 528.1,46 C544.7,46 560.6,51.5 565.8,59.1 C569.3,64.1 568.5,71.9 564.3,76.2 C559.5,81 553.2,81.2 545,76.9 C531.6,69.9 514.5,72.6 507.8,82.7 C506.8,84.3 506,85.8 506,86.3 C506,86.7 520.9,87 539,87 L572.1,87 L574.5,89.5 C576.7,91.6 577,92.8 577,99.8 C577,122.7 562.4,141.8 540.5,147.5 C533.5,149.3 520.6,149.3 513.5,147.6 Z M537.3,120.5 C541.1,118.7 545.1,113.7 546.5,109.3 L547.1,107 L527.1,107 C513,107 507,107.3 507,108.1 C507,108.7 508,111 509.2,113.2 C511.4,117.1 515.7,120.4 520.8,122.1 C524.8,123.4 533,122.6 537.3,120.5 Z" id="Shape"></path>
                              <path d="M102.3,146.4 C100.5,145.5 98.1,143.3 97,141.5 C95.1,138.4 95,136.6 95,97.4 C95,58.6 95.1,56.3 97,53.3 C99.5,49.1 104.2,46.8 110,46.8 C115.8,46.8 120.5,49.1 123,53.3 C124.9,56.3 125,58.6 125,97.3 C125,142.3 125,142.2 118.7,146 C114.7,148.5 106.8,148.6 102.3,146.4 Z" id="Shape"></path>
                          </g>
                          <ellipse class="svg-simple-gold" id="Oval" cx="109" cy="31.5" rx="14" ry="14.5"></ellipse>
                          <path class="svg-simple-gold" d="M327.294134,80 C335.41596,80 342,72.953742 342,64.2617422 C342,55.5697425 322.698551,34.8839437 312.588269,28.0450941 C305.84808,23.485861 300.419569,20.9831994 296.302734,20.5371094 C303.781457,26.2646173 308.365393,33.1526788 310.054543,41.2012939 C312.588269,53.2742166 312.588269,57.8162978 312.588269,64.2617422 C312.588269,72.953742 319.172309,80 327.294134,80 Z" id="Oval"></path>
                      </g>
                  </g>
              </svg>
            </div>
          </a>
        </li> -->
      </ul>
      <ul class="mobile-nav-utility-links">
        <li><a href="<?= site_url(); ?>/contact-us">Contact</a></li>
        <li class="activate-newsletter-popup">Newsletter</li>
    <!--   <li><a href="http://eepurl.com/-4aaH" target="_blank">Newsletter</a></li> -->
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

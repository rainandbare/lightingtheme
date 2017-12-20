<?php get_header(); ?>

<main class="main-page archive-projects ">
  <div class="container">
    <div class="collections-header">
      <h1 class="page-title">Inspirations</h1>
      <!-- <div id="sortCollections" class="wrapper-dropdown">
        <span>Filter By: </span>
          <ul class="dropdown">
          <li class="option" id="all">All</li>
          <?php 
            $taxonomy = 'projecttypes';
            $terms = get_terms([
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            ]); 
            foreach ($terms as $term) { ?>
              <li class="option sortTypes" id="<?php echo $term->slug; ?>"><?php echo $term->name; ?></li>
            <?php }; ?>
        </ul>
      </div> -->
      <?php if (have_posts() ) : ?>
          <section id="sortArticles" class="projects-wrapper">
            <?php while ( have_posts() ) : the_post(); ?> 
              <? //get_template_part( 'templates/collections-archive', get_post_format() ); ?>
              <? include(locate_template('templates/projects-archive.php')); ?>
            <?php endwhile; ?> <!-- end of loop -->
          </section>
      <?php endif; ?>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>
<?php get_header(); ?>

<main class="main-page">
  <div class="container">
    <div class="collections-header partners-header">
      <h1 class="page-title">Viso Partners</h1>
      <div id="sortCollections" class="wrapper-dropdown">
        <span>Filter </span>
        <ul class="dropdown">
          <li class="option" id="all">All</li>
          <?php 
            $taxonomy = 'partnernationality';
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            )); 
            foreach ($terms as $term) { ?>
              <li class="option sortTypes" id="<?php echo $term->slug; ?>"><?php echo $term->name; ?></li>
            <?php }; ?>
        </ul>
      </div>
    </div>
      <?php if (have_posts() ) : ?>
        <section class="basic-main filter no-sidebar">
          <section id="sortArticles" class="basic-archive">
            <?php while ( have_posts() ) : the_post(); ?> 
               <? include(locate_template('templates/partners-archive.php')); ?>
           <?php endwhile; ?> <!-- end of loop -->
          </section> 
        </section>
      <?php endif; ?>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>
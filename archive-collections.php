<?php get_header(); ?>

<main class="main-page archive-collections">
  <div class="container">
    <div class="collections-header">
      <h1 class="page-title">Collections</h1>
      <div id="sortCollections" class="wrapper-dropdown">
        <span>Filter </span>
        <ul class="dropdown">
          <li class="option" id="all">All</li>
          <?php 
            $taxonomy = 'collectiontypes';
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
          <section id="sortArticles" class="collection-wrapper clearfix">
            <?php while ( have_posts() ) : the_post(); ?> 
              <? //get_template_part( 'templates/collections-archive', get_post_format() ); ?>
              <? include(locate_template('templates/collections-archive.php')); ?>
            <?php endwhile; ?> <!-- end of loop -->
          </section>
      <?php endif; ?>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>
<?php get_header(); ?>

<main class="main-page archive-collections">
  <div class="container">
      <h1 class="page-title">Collections</h1>
      <ul id="sortTypesList" class="flex">
        <li><button class="sortTypes-button" id="all">All</button></li>
        <?php 
          $taxonomy = 'collectiontypes';
          $terms = get_terms([
              'taxonomy' => $taxonomy,
              'hide_empty' => false,
          ]); 
          foreach ($terms as $term) { ?>
            <li><button class="sortTypes" id="<?php echo $term->slug; ?>"><?php echo $term->name; ?></button></li>
          <?php }; ?>
      </ul>
      <?php if (have_posts() ) : ?>
          <section id="sortArticles" class="collection-wrapper">
            <?php while ( have_posts() ) : the_post(); ?> 
              <? //get_template_part( 'templates/collections-archive', get_post_format() ); ?>
              <? include(locate_template('templates/collections-archive.php')); ?>
            <?php endwhile; ?> <!-- end of loop -->
          </section>
      <?php endif; ?>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>
<?php get_header(); ?>

<main class="main-page">
  <div class="container">
      <h2>Collections</h2>
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
        <section class="basic-main no-sidebar">
          <section id="sortArticles" class="basic-archive">
            <?php while ( have_posts() ) : the_post(); ?> 
              <? //get_template_part( 'templates/collections-archive', get_post_format() ); ?>
              <? include(locate_template('templates/collections-archive.php')); ?>
            <?php endwhile; ?> <!-- end of loop -->
           <?php if (  $wp_query->max_num_pages > 1 ){ ?>
          </section>
          <button id="loadMorePosts" class="basic-archive-load loadmore btn redoutline">Load More</button>
          <?php }?>   
        </section>
      <?php endif; ?>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>
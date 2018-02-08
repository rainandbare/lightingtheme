<?php get_header(); ?>

<main class="main-page archive-collections archive-projects">
  <div class="container">
    <div class="collections-header">
      <h1 class="page-title">Projects</h1>
      <div id="sortCollections" class="wrapper-dropdown">
        <span>Filter </span>
          <ul class="dropdown">
          <li class="option" id="all">All</li>
          <?php 
            $taxonomy = 'projecttypes';
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            )); 
            foreach ($terms as $term) { ?>
              <li class="option sortTypes" id="<?php echo $term->slug; ?>"><?php echo $term->name; ?></li>
            <?php }; ?>
        </ul>
      </div>
      <?php if (have_posts() ) : ?>
          <section id="sortArticles" class="projects-wrapper clearfix">
            <a class="archive-collection-single explainer-cell" data-type="all" href="<?= site_url();?>/contact-us">
              <article>
                <div class="img">
                  <p><?php echo get_field('project_sentence', 'option') ?></p>
                  <p><?php echo get_field('project_call_to_action', 'option') ?></p>
                </div>
              </article>
            </a>
            <?php while ( have_posts() ) : the_post(); ?> 
              <? //get_template_part( 'templates/collections-archive', get_post_format() ); ?>
              <? include(locate_template('templates/projects-archive.php')); ?>
            <?php endwhile; ?> <!-- end of loop -->
          </section>
      <?php endif; ?>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>
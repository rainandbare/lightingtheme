<?php get_header(); ?>

<main class="main-page archive-projects ">
  <div class="container">
    <div class="collections-header">
      <h1 class="page-title">Inspirations</h1>
      <?php if (have_posts() ) : ?>
          <section id="sortArticles" class="projects-wrapper clearfix">
            <a class="archive-collection-single explainer-cell" data-type="all" href="<?= site_url();?>/contact-us">
              <article>
                <div class="img">
                  <p><?php echo get_field('inspiration_sentence', 'option') ?></p>
                  <p><?php echo get_field('inspiration_call_to_action', 'option') ?></p>
                </div>
              </article>
            </a>
            <?php while ( have_posts() ) : the_post(); ?> 
              <? include(locate_template('templates/projects-archive.php')); ?>
            <?php endwhile; ?> <!-- end of loop -->
          </section>
      <?php endif; ?>
  </div>
</main> <!-- /.main -->

<?php get_footer(); ?>
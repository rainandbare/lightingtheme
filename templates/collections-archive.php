<?php
/**
 * Template part for displaying Collections, Projects and Inspirations posts on their archive page
 */
?>
<?php 
	$boxheight = get_field('box_height');
	$textColor = get_field('text_color');
 ?>
<a class="<?= $boxheight ?> archive-collection-single" data-type="all <?php suzette_custom_taxonomies($post->ID, $taxonomy); ?>" href="<?php echo get_permalink(); ?>">
    <article style="background-image: url(<?php the_post_thumbnail_url('full'); ?>);">
    	<!-- <img class="reg-photo" src="<?php //the_post_thumbnail_url('full'); ?>" alt=""> -->
      <?php if($boxheight !== 'box'){
		$rows = get_field('images', $post->ID); // get all the rows
		$first_image = $rows[0]['image']['url']; // get the first row
		?>
		<img class="backup-square-photo" src="<?php echo $first_image; ?>" alt="">
   		<?php } ?>
      <h4 class="<?= $textColor ?>"><?php the_title(); ?></h4> 
    </article>
</a>
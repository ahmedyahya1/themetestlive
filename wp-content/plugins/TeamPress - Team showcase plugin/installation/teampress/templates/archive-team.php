<?php
get_header();
?>
<?php get_sidebar(); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.hover').mouseleave(
	    function () {
	      $(this).removeClass("hover");
	    }
	  );
});

</script>
<div id="main-content">
	<?php while ( have_posts() ) : the_post();?>
		<figure class="snip1244">
			<?php the_post_thumbnail() ?>
			<figcaption>
		    <h3><?php the_title() ?></h3>
		    <h4><?php echo get_post_meta( get_the_ID(), 'extp_position', true ); ?></h4>
		    <p><?php the_excerpt();?></p>
			</figcaption>
			
		</figure>
	<?php endwhile; ?>
</div><!--end main-content-->
<?php get_sidebar('second'); ?>
<?php get_footer(); ?>
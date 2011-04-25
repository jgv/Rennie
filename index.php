<?php get_header(); ?>

<?php
/* count posts to determine the width of main div */
$count_posts = wp_count_posts('post');
$published_posts = $count_posts->publish;
?>

<div id="main" class="scroll clearfix" style="width:<?php echo $published_posts * 820; ?>px;">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- need to create an instance of jquery cycle for each post -->
		<script type='text/javascript'> 
		$(document).ready(function() {
			$('#s<?php the_ID(); ?>')
				.after('<div id="n<?php the_ID(); ?>" class="nav">')
				.cycle({
					fx: 'fade',
					speed: 'medium',
					timeout: 0,
					next: '#s<?php the_ID(); ?>',
					pager:  '#n<?php the_ID(); ?>',
			});
		});
		</script>
	<div id="post-<?php the_ID(); ?>" class="thepost">
	  <div id="s<?php the_ID();?>" class="images">
		<!-- each post has to be a list of images -->
		<?php the_content(); ?>
		</div>
	</div>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
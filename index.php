<?php get_header();
/*count posts */
$count_posts = wp_count_posts('post');
$published_posts = $count_posts->publish;
$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
$recentPosts = new WP_Query();
$recentPosts->query("showposts=$published_posts");
?>

<? while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>

		<script type='text/javascript'> 
					$(function() {
    			$('#s<?php the_ID(); ?>')
					.after	('<div id="n<?php the_ID(); ?>" class="nav">')
						.cycle({
						fx: 'fade',
						speed: 'fast',
						timeout: 0,
						next: '#s<?php the_ID(); ?>',
						pager:  '#n<?php the_ID(); ?>',
				});
			});
		</script>
		<div id="post-<?php the_ID(); ?>" class="sup">
		<div id="s<?php the_ID();?>" class="images">
		<?php the_content(); ?>
		</div>
		</div>

<?php endwhile; ?>



<?php get_footer(); ?>
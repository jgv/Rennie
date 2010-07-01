<?php get_header();
/*count posts */
$count_posts = wp_count_posts('post');
$published_posts = $count_posts->publish;

?>

		<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<script type='text/javascript'> 
			$(document).ready(function() {
    			$('#s<?php the_ID(); ?>')
    			.after('<div id="nav<?php the_ID(); ?>">')
    			.cycle({
				fx: 'fade',
				next: '#s<?php the_ID(); ?>', 
    			timeout: 0, 
    			pager:  '#nav<?php the_ID(); ?>'
			});
		});
		</script>
		<div id="s<?php the_ID();?>">
		<?php the_content(); ?>
		</div>
		<?php the_excerpt(); ?>
		</div>
		<?php endwhile;?>

<?php get_footer(); ?>
<?php get_header();
/*count posts */
$count_posts = wp_count_posts('post');
$published_posts = $count_posts->publish;
?>

<a href="mailto:<?php bloginfo('admin_email'); ?>"><?php print print_logo(); ?></a>

<div id="main" style="width:<?php echo $published_posts * 620; ?>px;">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<script type='text/javascript'> 
		$(document).ready(function() {
			$('#s<?php the_ID(); ?>')
				.before	('<div id="n<?php the_ID(); ?>" class="nav">')
				.cycle({
					fx: 'fade',
					speed: 'fast',
					timeout: 0,
					next: '#s<?php the_ID(); ?>',
					pager:  '#n<?php the_ID(); ?>',
			});
		});
		</script>
		<div id="post-<?php the_ID(); ?>" class="thepost">
			<div id="s<?php the_ID();?>" class="images">
		<?php the_content(); ?>
			</div>
		</div>

<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>
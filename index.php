<?php get_header();
/*count posts */
$count_posts = wp_count_posts('post');
$published_posts = $count_posts->publish;

?>

		<?php while ( have_posts() ) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<script type='text/javascript'> 
			$(document).ready(function() {
    			$('.s<?php the_ID(); ?>').cycle({
				fx: 'fade',
				next: '.s<?php the_ID(); ?>', 
    			timeout: 0 
			});
		});
		</script>
		
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class='s<?php the_ID();?>'>
		<?php the_content(); ?>
		</div>
		</div>
		<?php endwhile;?>

<?php get_footer(); ?>
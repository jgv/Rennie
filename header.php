<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.cycle.all.latest.js"></script>
<script type="text/javascript" charset="utf-8">
	$(function(){
		$("#main").wrapInner("<table><tr>");
		$(".post").wrap("<td>");
	});
</script>
<?php remove_filter('the_content', 'wpautop'); /* stop the annoying auto <p> tags */ ?>

<div id="main">
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
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.autoscroll.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.tooltip.js"></script>

<script type="text/javascript">

var opts = {	step: 100,
		trigger: 300,
		interval: 20
		};
$.autoscroll.init(opts);
$(".alignnone").tooltip();
$("img").lazyload({
   effect : "fadeIn",
});

</script>

<?php include_once('functions.php'); ?>
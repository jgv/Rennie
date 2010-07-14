<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<!--
       _________    __
      / / ____/ |  / /
 __  / / / __ | | / / 
/ /_/ / /_/ / | |/ /  
\____/\____/  |___/   
                   
find this theme at http://github.com/jgv/rennie
-->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.cycle.all.latest.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.autoscroll.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.lazyload.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/jquery.tooltip.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   var opts = {	step: 100,
		trigger: 300,
		interval: 20
		};
   $.autoscroll.init(opts);
   $(".images img").tooltip({
      showURL: false,
      track: true,
      delay: 5,
      top: 20, 
      left: 10
   });
});
$(".images img").lazyload();
</script>

<?php include_once('functions.php'); ?>
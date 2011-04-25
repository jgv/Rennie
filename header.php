<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
                   
<!-- find this theme at http://github.com/jgv/rennie -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv=X-UA-Compatible content="IE=Edge;chrome=1">
<title><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php bloginfo('template_directory') ?>/js/jquery.min.js"%3E%3C/script%3E'))</script>
<script src="<?php bloginfo('template_directory') ?>/js/jquery.plugins.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var opts = {	
        step: 100,
		    trigger: 300,
		    interval: 204
		};
    $.autoscroll.init(opts);
    $("#main img").tooltip({
        showURL: false,
        track: true,
        delay: 5,
        top: 20, 
        left: 10
    });

    $("#main img").lazyload({
        container: $("#main"),
        effect: "fadeIn"     
    });
});

</script>

<?php include_once('functions.php'); ?>

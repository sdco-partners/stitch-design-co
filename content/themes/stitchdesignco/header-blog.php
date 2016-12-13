<?php
	/* no URL Forwarding Code */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<link href="http://cloud.typography.com/778678/622662/css/fonts.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
		<?php wp_enqueue_script("jquery"); ?>
		<?php wp_head(); ?>
		<script src="<?php bloginfo('template_directory') ?>/assets/javascript/jquery.cycle2.min.js" type="text/javascript"></script>
		<script src="<?php bloginfo('template_directory') ?>/assets/javascript/jquery.easing.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery("#topLink a").click(function(e) {
					var $anchor = jQuery(this);
 					jQuery("html, body").stop().animate({
						scrollTop: jQuery($anchor.attr("href")).offset().top
					}, 1500);
					e.preventDefault();
				});
			});
		</script>
	</head>

	<body>
		<a name="top" id="top"></a>
		<div id="topBarContainer">
			<div id="topBar">
				<ul>
					<li><a href="/work/" title="Work">Work</a></li>
					<li><a href="/studio/" title="Studio">Studio</a></li>
					<li><a href="http://www.sideshowpress.com" title="Shop" target="_blank">Shop</a></li>
					<li><a href="/contact/" title="Contact">Contact</a></li>
				</ul>
			</div>
		</div>
		<div id="container">
			<div id="header">
				<div id="headerRight">
					<h2>A Branding and Digital Agency</h2>
				</div>
				<h1><a href="/blog/" title="Made-to-Measure">Made-to-Measure</a></h1>
			</div>

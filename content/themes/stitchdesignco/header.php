<?php
	/* URL Forwarding Code, see header-blog.php */

  if ($_SERVER['URI'] !== "/stitchdesignco/blog/"){
	  header('Location: http://sdcopartners.com');
	  exit();
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" <?php echo (is_front_page()) ? 'class="home"' : '' ?>>

	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<meta name="description" content="With our made-to-order design philosophy, we are a branding and digital agency that develops businesses through strategic thinking and good design." />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="p:domain_verify" content="291b10ef10ce5126b2a44281fba2ff2b" />
		<title>Stitch Design Co.</title>
		<link rel="shortcut icon" href="http://www.stitchdesignco.com/favicon.png" />
		<!-- <link href="http://cloud.typography.com/778678/622662/css/fonts.css" rel="stylesheet" type="text/css" /> -->
		<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/778678/622662/css/fonts.css" />
		<link href="<?php bloginfo('template_directory') ?>/assets/css/global_new.css" rel="stylesheet" type="text/css" media="all" />
		<?php if (is_front_page()): ?>
			<link href="<?php bloginfo('template_directory') ?>/assets/css/supersized.css" rel="stylesheet" type="text/css" media="all" />
		<?php endif; ?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
		<?php if (is_front_page()): ?>
			<script src="<?php bloginfo('template_directory') ?>/assets/javascript/supersized.3.2.7.min.js" type="text/javascript"></script>
			<script src="<?php bloginfo('template_directory') ?>/assets/javascript/smoothscroll.js" type="text/javascript"></script>
		<?php endif; ?>
		<script src="<?php bloginfo('template_directory') ?>/assets/javascript/jquery.cycle2.min.js" type="text/javascript"></script>
		<!--<script src="<?php bloginfo('template_directory') ?>/assets/javascript/jquery.easing.min.js" type="text/javascript"></script>-->
		<?php if (is_front_page()): ?>
			<script>
				$(document).ready(function() {

					var url = "<?php bloginfo('template_directory') ?>";

					$.supersized({
						horizontal_center: 1,
						slide_interval: 3000,
						transition: 1,
						transition_speed: 700,
						slides: [
							{image: url + '/assets/images/home_back_photo_9.jpg'},
							{image: url + '/assets/images/home_back_photo_10.jpg'},
							{image: url + '/assets/images/home_back_photo_11.jpg'},
							{image: url + '/assets/images/home_back_photo_13.jpg'},
							{image: url + '/assets/images/home_back_photo_12.jpg'}
							
						]
					});
				});
			</script>
		<?php endif ?>
		<script type="text/javascript">
			$(document).ready(function() {

				$('#hnypt').remove();

				var headerHeight = $("#topContainer").height();
				$("#container").css("padding-top", headerHeight);
				
				$("#studioSubnav li a, #contactSubnav li a").click(function(e) {
					var $anchor = jQuery(this);
					console.log($anchor.attr('href'))
 					$("html, body").stop().animate({
						scrollTop: $($anchor.attr("href")).offset().top - headerHeight
					}, 1500);
					$("#studioSubnav li a, #contactSubnav li a").removeClass();
					$(this).addClass('active');
					e.preventDefault();
				});
				$("#stitchRight .staff li a").click(function(e) {
					var id = $(this).attr('href');
					var photoId = $(this).attr('href') + 'Photo';
					$("#9-cannon-street, #stitchLeft .bio, #stitchSlideshow .slideshow, #stitchSlideshow .staffPhoto").hide();
					$(id).fadeIn();
					$(photoId).fadeIn();
					e.preventDefault();
				});
				$("#stitchLeft .studioLink").click(function(e) {
					var id = $(this).attr('href');
					$("#stitchLeft .bio").hide();
					$(id).fadeIn();
					$("#stitchSlideshow .slideshow").fadeIn();
					e.preventDefault();
				});
				$("#employmentLeft li a").click(function(e) {
					$("#employmentLeft li a").removeClass();
					$(this).addClass('active');
					var id = $(this).attr('href');
					$("#employmentRight .description").hide();
					$(id).fadeIn();
					e.preventDefault();
				});
				$("#homeBottom .upBtn a, #topLink a").click(function(e) {
					var $anchor = $(this);
 					$("html, body").stop().animate({
						scrollTop: $($anchor.attr("href")).offset().top
					}, 1500);
					e.preventDefault();
				});
				$("#servicesSmall .nav li a").click(function(e) {
					$("#servicesSmall .nav li a").removeClass();
					$(this).addClass('active');
					var id = $(this).attr('href');
					$("#servicesSmall .description").hide();
					$(id).fadeIn();
					e.preventDefault();
				});
			});
			$(window).resize(function() {
				var headerHeight = $("#topContainer").height();
				$("#container").css("padding-top", headerHeight);
			});
		</script>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-17517579-1']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		<?php wp_head(); ?>
	</head>

	<body <?php echo (is_front_page()) ? 'class="home"' : '' ?>>
		<a name="top" id="top"></a>
		<?php if (!is_front_page()): ?>
			<?php get_template_part('navigation'); ?>
		<?php endif ?>
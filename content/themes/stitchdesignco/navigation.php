<div id="topContainer">
	<div id="topBarContainer">
		<div id="topBar">
			<a class="blogLink" href="<?php echo get_page_link(3669) ?>" title="Blog">Blog</a>
		</div>
	</div>
	<div id="top">
		<div id="header">
			<h1><a href="<?php bloginfo('url') ?>" title="Stitch Design Co.">Stitch Design Co.</a></h1>
			<div id="headerRight">
				<h2>A Branding and Digital Agency</h2>
				<h3>Made-to-Measure</h3>
			</div>
		</div>
		<ul id="topNav">
			<li class="first"><a href="<?php echo get_post_type_archive_link('work') ?>" <?php echo ( is_singular('work') || is_post_type_archive('work') || is_tax('service') ) ? 'class="active"' : '' ?> title="Work">Work</a></li>
			<li><a <?php echo (is_page(3672)) ? 'class="active"' : '' ?> href="<?php echo get_page_link(3672) ?>" title="Studio">Studio</a></li>
			<li><a <?php echo (is_page(3674)) ? 'class="active"' : '' ?> href="<?php echo get_page_link(3674) ?>" title="Contact">Contact</a></li>
		</ul>
		<?php if (is_page(3672)): ?>
			<ul id="studioSubnav">
				<li><a href="#services" title="Services" class="active">Services</a></li>
				<li><a href="#process" title="Process">Process</a></li>
				<li><a href="#stitch" title="We Are Stitch">We Are Stitch</a></li>
			</ul>
		<?php endif ?>
		<?php if (is_page(3674)): ?>
			<ul id="contactSubnav">
				<li><a href="#business" title="New Business" class="active">New<span> Business</span></a></li>
				<li><a href="#press" title="Awards &amp; Press" class="">Awards<span> &amp; Press</span></a></li>
				<li><a href="#employment" title="Employment" class="">Employment</a></li>
			</ul>
		<?php endif ?>
	</div>
</div>
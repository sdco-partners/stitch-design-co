<?php get_header(); ?>
<div id="container" style="padding-top: 183px;">
	<?php get_template_part('navigation','work') ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="workContent">
			<div id="workTop">
				<div id="workLeft">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
					<?php if (get_field('website')): ?>
						<p class="url">Website: <a href="<?php the_field('website') ?>" target="_blank"><?php the_field('website') ?></a></p>
					<?php endif ?>
				</div>
				<?php $services = wp_get_post_terms($post->ID,'service'); ?>
				<div id="workRight">
					<h3>Services Rendered</h3>
					<ul>
						<?php foreach ($services as $s): ?>
							<li><a href="<?php echo get_term_link($s) ?>"><?php echo $s->name ?></a></li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
		<div id="workPhotos">
			<?php $images = get_field('images') ?>
			<?php foreach ($images as $image): ?>
				<?php $website = get_field('website_url',$image['ID']); ?>
				<div class="photo">
					<?php if ($website): ?>
						<a href="<?php echo $website ?>" target="_blank"><img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>" width="100%" border="0"></a>
					<?php else: ?>
						<img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>" width="100%" border="0">
					<?php endif ?>
				</div>
			<?php endforeach ?>
		</div>
		
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
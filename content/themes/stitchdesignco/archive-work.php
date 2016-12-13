<?php get_header(); ?>
<div id="container" style="padding-top: 183px;">
	<?php get_template_part('navigation','work') ?>
	<div id="workArchiveContainer">
		<?php if (is_tax()): ?>
			<?php $tax = get_queried_object(); #print_r($tax) ?>
			<h3 class="archive-title"><?php echo $tax->name ?></h3>
		<?php else: ?>
			<h3 class="archive-title">all work</h3>
		<?php endif ?>
		<div id="workArchiveContent">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="work-excerpt">
					<a href="<?php the_permalink(); ?>" class="overlay"><h3><?php the_title(); ?></h3></a>
					<?php $images = get_field('images'); $key = array_rand($images); $image = $images[$key]; ?>
					<img src="<?php echo $image['url'] ?>">
				</article>
			<?php endwhile; endif; ?>
		</div>
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>
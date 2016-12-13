<?php get_header(); the_post(); ?>
	<main class="view-single-job">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</main>
<?php get_footer(); ?>
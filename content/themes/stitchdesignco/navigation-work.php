<?php 
	$work = new wp_query(array('post_type' => 'work','posts_per_page' => 19));
	$current_work = get_queried_object_id();
?>

<div id="workSubnav">

	<div class="col">
		<ul>
			<?php $c=1;$i=1;if ( $work->have_posts() ) : while ( $work->have_posts() ) : $work->the_post(); ?>
				<li><a href="<?php the_permalink() ?>" <?php echo ($current_work==$post->ID) ? 'class="active"' : '' ?> title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
				<?php if ($c == 19): ?>
					<li><a href="<?php echo get_post_type_archive_link('work') ?>" <?php echo (is_post_type_archive('work')) ? 'class="active"' : '' ?> title="Our Work">Archive</a></li>
				<?php endif ?>
				<?php if ($i==5): $i=0; ?>
					</ul></div><div class="col"><ul>
				<?php endif ?>
			<?php $c++;$i++;endwhile; endif; ?>
		</ul>
	</div>

</div>
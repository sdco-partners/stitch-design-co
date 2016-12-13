<?php get_header('blog'); ?>
	<div id="main">
		<div id="content" class="narrowcolumn" role="main">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
						<h3><?php the_time(__('F j, Y', 'kubrick')) ?> <!-- by <?php the_author() ?> --></h3>
						<div class="entry">
							<?php the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?>
						</div>
						<?php if (get_post_meta($post->ID, 'blogClient', true)) { ?><p class="client"><span>Client:</span> <?php print get_post_meta($post->ID, 'blogClient', true); ?></p><?php } ?>
						<div class="category">
							<h4><?php printf(__('%s', 'kubrick'), get_the_category_list(', ')); ?></h4>
						</div>
						<div class="photos">
							<?php
								$args = array(
									'orderby'        => 'post_date',
									'order'          => 'ASC',
									'post_type'      => 'attachment',
									'post_parent'    => $post->ID,
									'post_mime_type' => 'image',
									'post_status'    => null,
									'numberposts'    => -1,
								);
								$attachments = get_posts($args);
								if ($attachments) {
									foreach ($attachments as $attachment) {
										echo "<a href=\"" . apply_filters('the_permalink', get_permalink()) . "\" title=\"" . apply_filters('the_title', $attachment->post_title) . "\">\n";
										echo "<span class=\"pibfi_pinterest\">\n";
										echo "<img src=\"" . wp_get_attachment_url($attachment->ID) . "\" alt=\"" . apply_filters('the_title', $attachment->post_title) . "\" width=\"100%\" border=\"0\">\n";
										echo "<span class=\"xc_pin\" onclick=\"pin_this(event, 'http://pinterest.com/pin/create/button/?url=" . get_permalink() . "&amp;media=" . wp_get_attachment_url($attachment->ID) . "&amp;description=" . get_the_title() . "')\" style=\"left: 610px; display: block; \"></span>\n";
										echo "</span>\n";
										echo "</a>\n";
									}
								}

							?>
						</div>
						<div class="meta">
							<p><span><?php comments_popup_link(__('No Comments &gt;', 'kubrick'), __('1 Comment &gt;', 'kubrick'), __('% Comments &gt;', 'kubrick'), '', __('Comments Closed', 'kubrick') ); ?></span>&nbsp;&nbsp;&nbsp;<?php the_tags(__('<span>Tags:</span>', 'kubrick') . ' ', ', ', '<br />'); ?></p>
							<div class="share">
								<h5>Share This:</h5>
								<span class='st_twitter_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span><span class='st_facebook_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span><span class='st_pinterest_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span><span class='st_instagram_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
							</div>
						</div>
						<div class="btmBar"></div>
					</div>
				<?php endwhile; ?>
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link(__('Back', 'kubrick')) ?></div>
					<div class="alignright"><?php previous_posts_link(__('Next', 'kubrick')) ?></div>
				</div>
			<?php else : ?>
				<h2 class="pagetitle"><?php _e('Not Found', 'kubrick'); ?></h2>
				<p><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'kubrick'); ?></p>
				<?php // get_search_form(); ?>
			<?php endif; ?>
		</div>
	<?php get_sidebar('blog'); ?>
	</div>
<?php get_footer('blog'); ?>

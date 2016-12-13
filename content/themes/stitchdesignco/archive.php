<?php get_header('blog'); ?>

			<div id="main">
				<div id="content" class="narrowcolumn" role="main">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php printf(__('Archive for the &#8216;%s&#8217; Category', 'kubrick'), single_cat_title('', false)); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'kubrick'), single_tag_title('', false) ); ?></h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php printf(_c('Archive for %s|Daily archive page', 'kubrick'), get_the_time(__('F jS, Y', 'kubrick'))); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php printf(_c('Archive for %s|Monthly archive page', 'kubrick'), get_the_time(__('F, Y', 'kubrick'))); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php printf(_c('Archive for %s|Yearly archive page', 'kubrick'), get_the_time(__('Y', 'kubrick'))); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><?php _e('Author Archive', 'kubrick'); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e('Blog Archives', 'kubrick'); ?></h2>
 	  <?php } ?>

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

	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='pagetitle'>".__("Sorry, but there aren't any posts in the %s category yet.", 'kubrick').'</h2>', single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo('<h2 class="pagetitle">'.__("Sorry, but there aren't any posts with this date.", 'kubrick').'</h2>');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='pagetitle'>".__("Sorry, but there aren't any posts by %s yet.", 'kubrick')."</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='pagetitle'>".__('No posts found.', 'kubrick').'</h2>');
		}
	  // get_search_form();
	endif;
?>

				</div>

<?php get_sidebar('blog'); ?>

			</div>

<?php get_footer('blog'); ?>

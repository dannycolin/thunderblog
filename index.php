<?php
/**
 * The main template file
 *
 * Bringing header, content and footer together.
 *
 * @package WordPress
 * @subpackage Thunderblog
 * @since 0.0.1
 */

get_header();
?>
<main>
<section class="featured">
	<?php 
		$latest_posts = get_posts(['numberposts' => 1]);
		$post = count($latest_posts) > 0 ? $latest_posts[0] : null;
	?>
	<?php if ($post): ?>
	<article>
		<div class="content">
			<span class="category"><?php _e('Latest Article', 'thunderblog'); ?></span>
			<h1><?= $post->post_title ?></h1>
			<div class="meta">
				<time>
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-s" viewBox="0 0 24 24">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<rect x="4" y="5" width="16" height="16" rx="2" />
						<line x1="16" y1="3" x2="16" y2="7" />
						<line x1="8" y1="3" x2="8" y2="7" />
						<line x1="4" y1="11" x2="20" y2="11" />
						<rect x="8" y="15" width="2" height="2" />
					</svg>
					<?= $post->post_date ?>
				</time>
				<span class="author">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-s" viewBox="0 0 24 24">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<circle cx="12" cy="7" r="4" />
						<path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
					</svg>
					<?= $post->post_author ?>
				</span>
				<span class="responses">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-s" viewBox="0 0 24 24">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />
						<path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
					</svg>
					<?= $post->comment_count ?> <?php _e('responses', 'thunderblog'); ?>
				</span>
			</div>
			<div class="description"><?= $post->post_excerpt ?></div>
			<a class="btn btn-neutral-light" href="./article.html"><?php _e('Read more', 'thunderblog'); ?></a>
		</div>
		<img class="show-xl" src="./thumb_00.png" alt="featured article title image">
		<?php endif; ?>
	</article>
</section>
<h2 class="text-center"><?php _e('Latest Posts', 'thunderblog'); ?></h2>
<section class="articles">
<?php
if (have_posts()) {
	while (have_posts()) {
		the_post(); ?>
		<article>
			<?php if (has_post_thumbnail()): ?>
				<div class="thumb" style="background-image: url(<?php get_the_post_thumbnail_url(); ?>);"></div>
			<?php endif; ?>
			<?php the_category(); ?>
			<a href="<?php wp_get_shortlink(the_ID()); ?>">
				<h3><?php the_title(); ?></h3>
			</a>
			<div class="summary"><?php the_excerpt(); ?></div>
			<a class="btn btn-link" href="<?php wp_get_shortlink(the_ID()); ?>"><?php _e('Read more', 'thunderblog'); ?></a>
		</article>
		<?php
	}
} else {
	echo 'No posts available';
}
?>
</section>
</main>
<?php get_footer(); ?>

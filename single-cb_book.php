<?php get_header(); ?>
<div class="row">
	<div class="small-12 large-8 columns" role="main">

	<?php do_action('foundationPress_before_content'); ?>

	<h1>single-cb_book.php</h1>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php FoundationPress_entry_meta(); ?>
			</header>
			<?php do_action('foundationPress_post_before_entry_content'); ?>
			<div class="entry-content">

			<?php if ( has_post_thumbnail() ): ?>
				<div class="row">
					<div class="column">
						<?php the_post_thumbnail('', array('class' => 'th')); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>

			<?php 

				$posts = get_field('related_book');

				if( $posts ): ?>
					<div class="related-books">
				    <ul>
				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>
				        <li>
				            <?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			  the_post_thumbnail("thumbnail");
			}
			?>
				            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				            <span>Custom field from $post: <?php the_field('author'); ?></span>
				        </li>
				    <?php endforeach; ?>
				    </ul>
				    </div>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>

			<?php do_action('foundationPress_post_before_comments'); ?>
			<?php comments_template(); ?>
			<?php do_action('foundationPress_post_after_comments'); ?>
		</article>
	<?php endwhile;?>

	<?php do_action('foundationPress_after_content'); ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

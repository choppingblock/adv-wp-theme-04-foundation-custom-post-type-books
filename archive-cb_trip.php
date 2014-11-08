<?php get_header(); ?>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">

		<h1>archive-cb_trip</h1>

		<!-- map loop -->

		<?php if ( have_posts() ) : ?>
			<div class="acf-map">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post();
					$location = get_field('destination');
				?>
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
				<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
<?php the_title(); ?></a></h4>
				<p class="address"><?php echo $location['address']; ?></p>
				<p><?php the_sub_field('description'); ?></p>
			</div>
			<?php endwhile; ?>
			</div>
		<?php else : ?>
			<p>you have nothin</p>

	<?php endif; // end have_posts() check ?>

		<!-- main loop -->
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php 

			$location = get_field('destination');

			if( !empty($location) ):
			?>
			<div class="acf-map map-small">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
			<?php endif; ?>


			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; // end have_posts() check ?>

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

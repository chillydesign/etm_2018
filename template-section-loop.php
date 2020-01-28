<?php /* Template Name: Section Loop Page Template */ get_header(); ?>

	<main role="main">
		<!-- section -->
		

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<section class="pagetitle"><div class="wrapper">
				<div class="breadcrumb"><?php echo get_field('breadcrumb'); ?> </div>
				<h1><?php the_title(); ?></h1>
			</div></section>
				<?php include('section-loop.php'); ?>
				
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php endif; ?>

	</main>


<?php get_footer(); ?>

<?php get_header(); ?>

<main role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php if (!post_password_required($post)) : ?>

				<?php $banner_image_field = get_field('banner_image'); ?>
				<?php if (!empty($banner_image_field)) { ?>
					<section class="banner">
						<img style="width:100%; height:auto;" src="<?php echo $banner_image_field['url']; ?>">
					</section>
				<?php } ?>
				<?php $google_map_field = get_field('google_map'); ?>
				<?php if (!empty($google_map_field)) { ?>
					<?php $coordinates = strval(get_field('google_map'));
					$google_map = '[chilly_map location="' . $coordinates . '"]'; ?>
					<section class="gm_fullwidth">
						<?php echo do_shortcode($google_map); ?>
					</section>
				<?php } ?>
				<section class="pagetitle">
					<div class="wrapper">
						<div class="breadcrumb"><?php echo get_field('breadcrumb'); ?> </div>
						<h1><?php the_title(); ?></h1>
					</div>
				</section>
			<?php endif; ?>
	<?php endwhile;
	endif; ?>
	<?php if (!post_password_required($post)) : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php $category = get_field('category'); ?>
			<?php include('section-loop.php'); ?>
			<div class="clear"></div>
		</article>
		<!-- /article -->
	<?php else : ?>
		<div class="container">
			<div style="padding:80px 0">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endif; ?>

</main>


<?php get_footer(); ?>
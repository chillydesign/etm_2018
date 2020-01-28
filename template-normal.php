<?php /* Template Name: Normal Page Template */ get_header(); ?>

	<main role="main">
		<!-- section -->
		

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if(get_field('banner_image')['url']!=''){ ?>
					<!-- <section class="banner" style="background-image: url(<?php //echo get_field('banner_image')['url']; ?>);" ></section> -->
					<section class="banner"><img style="width:100%; height:auto;" src="<?php echo get_field('banner_image')['url']; ?>"></section>
				<?php } ?>
				
				<section class="pagetitle"><div class="wrapper"><h1><?php the_title(); ?></h1></div></section>
				<section>
					<div class="wrapper">
						<?php the_content(); ?>
					</div>
				</section>
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php endif; ?>

	</main>


<?php get_footer(); ?>

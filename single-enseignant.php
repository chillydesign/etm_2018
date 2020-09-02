<?php get_header(); ?>

<main role="main">
	<!-- section -->


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section class="pagetitle">
				<div class="wrapper">
					<div class="breadcrumb" style="font-size:1.12em;">
						<a href="<?php echo home_url(); ?> "><?php _e('Home', 'webfactor'); ?></a>
						> ETM >
						<a href="<?php echo home_url('enseignants'); ?>"><?php _e('Enseignants', 'webfactor'); ?></a>
						> <?php the_title(); ?>
					</div>
				</div>
			</section>


			<section style="padding:30px 0;">

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="wrapper">
						<?php $url = get_field('photo'); ?>
						<?php $url = $url['url']; ?>
						<div class="row">
							<div class="col-sm-4"><img src="<?php echo $url; ?>"></div>
							<div class="col-sm-8">
								<h1 style="margin-top:0;"><?php the_title(); ?></h1>
								<h5><?php the_field('discipline'); ?></h5>
								<h5 style="margin-top:-10px;"><?php the_field('titre'); ?></h5>
								<p><?php the_field('description'); ?></p>
							</div>

						</div>
				</article>
				<!-- /article -->

			<?php endwhile; ?>

		<?php endif; ?>

			</section>
			<!-- /section -->
</main>

<?php get_footer(); ?>
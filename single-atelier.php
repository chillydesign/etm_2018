<?php get_header(); ?>

<main role="main">
	<!-- section -->


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<!-- <section class="banner" style="background-image: url(<?php //echo get_field('banner_image')['url']; 
																		?>);" ></section> -->
			<?php $banner_image_field =  get_field('banner_image'); ?>
			<section class="banner"><img style="width:100%; height:auto;" src="<?php echo $banner_image_field['url']; ?>"></section>
			<section class="pagetitle">



				<div class="wrapper">
					<div class="breadcrumb" style="font-size:1.12em;"><a href="<?php echo home_url(); ?> "><?php _e('Home', 'webfactor'); ?></a> > <?php _e('Cours collectifs et Ateliers', 'webfactor'); ?> > <a href="<?php echo home_url(); ?>/ateliers-par-style"> <?php _e('Ateliers par style', 'webfactor'); ?> </a> > <?php the_title(); ?></div>
					<h1><?php the_title(); ?></h1>
				</div>
			</section>
			<section>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="wrapper">

						<?php while (have_rows('ateliers')) : the_row(); ?>
							<div class="row atelier">
								<div class="col-sm-6" style="padding-right : 30px;">
									<h3><?php if (get_sub_field('new')) {
											echo '<strong>New</strong> - ';
										} ?><?php echo get_sub_field('title'); ?></h3>
									<p><?php the_sub_field('description'); ?></p>
								</div>
								<div class="col-sm-6">
									<div class="pricing"><?php the_sub_field('pricing'); ?></div>
								</div>
							</div>
							<div class="<?php echo $col; ?>"><?php the_sub_field('texte'); ?></div>
						<?php endwhile ?>
						<!-- <p class="asterix">* Tarif d’un cours collectif associé à un cours instrumental</p> -->
						<p><a href="<?php echo home_url(); ?>/inscription">> <?php _e('En savoir plus sur les inscriptions', 'webfactor'); ?></a></p>

					</div>
				</article>
				<!-- /article -->

			<?php endwhile; ?>

		<?php endif; ?>

			</section>
			<!-- /section -->
</main>

<?php get_footer(); ?>
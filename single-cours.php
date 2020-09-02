<?php get_header(); ?>

<main role="main">
	<!-- section -->


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<!-- <section class="banner" style="background-image: url(<?php //echo get_field('banner_image')['url']; 
																		?>);" ></section> -->
			<?php $banner_image_field = get_field('banner_image'); ?>
			<section class="banner"><img style="width:100%; height:auto;" src="<?php echo $banner_image_field['url']; ?>"></section>
			<section class="pagetitle">
				<div class="wrapper">
					<div class="breadcrumb" style="font-size:1.12em;"><a href="<?php echo home_url(); ?> "><?php _e('Home', 'webfactor'); ?></a> > <a href="<?php echo home_url('les-instruments-enseignes-dans-tous-les-styles'); ?>"><?php _e('Filière instrumentale', 'webfactor'); ?></a> > <?php the_title(); ?> </div>
					<h1><?php the_title(); ?></h1>
				</div>
			</section>
			<section>





				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="wrapper">

						<div><?php echo get_field('description'); ?></div>
						<!-- <p><a href="<?php //echo home_url(); 
											?>/tarifs">> Voir les tarifs</a></p>
				  <p><a href="<?php //echo home_url('inscription'); 
								?>">> En savoir plus sur les inscriptions</a></p> -->

					</div>
				</article>
				<!-- /article -->

			<?php endwhile; ?>

		<?php endif; ?>

			</section>
			<!-- /section -->
</main>

<?php get_footer(); ?>
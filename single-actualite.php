<?php get_header(); ?>

<main role="main">
	<!-- section -->


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $post_id = get_the_ID(); ?>
			<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
			<section class="pagetitle">
				<div class="wrapper">
					<div class="breadcrumb" style="font-size:1.12em;"><a href="<?php echo home_url(); ?> "><?php _e('Home', 'webfactor'); ?></a> > <?php _e('Events', 'webfactor'); ?> > <?php the_title(); ?> </div>
				</div>
			</section>
			<section style="padding:30px 0;">

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="wrapper">
						<div class="row">
							<div class="col-md-9 col-md-push-3">
								<h2><?php the_title(); ?></h2>
								<?php $date_field = get_field('date'); ?>
								<?php if (!empty($date_field)) { ?><h2 style="font-weight:300; margin:-30px 0 30px; font-size:1.2em;"><?php the_field('date'); ?></h2><?php } ?>
								<?php the_content(); ?>



								<?php
								$inscription_form = get_field('inscription_form');
								$number_of_possible_applicants = get_field('number_of_possible_applicants');
								$current_inscriptions = get_posts(array('post_parent' => get_the_id(), 'post_type'  => 'inscription', 'posts_per_page' => -1, 'post_status' => 'publish'));
								?>




								<?php if ($inscription_form != 'none') : ?>
									<div class="inscription_box">
										<p><strong> Formulaire de réservation</strong></p>
										<?php if (sizeof($current_inscriptions)  <  intval($number_of_possible_applicants)) : ?>
											<?php get_template_part('inscription-form');    // INSCRIPTION FORM 
											?>
										<?php else : ?>
											<p>Plus de places disponibles</p>
										<?php endif; ?>
									</div>
								<?php endif; ?>



							</div>
							<div class="col-md-3 col-md-pull-9" style="padding: 0px 60px 0 0;"><a href="<?php the_permalink(); ?>">

									<img src="<?php echo $url; ?>" <?php if (get_field('photo_circulaire')) { ?> style="border-radius:50%;" <?php } ?>></a></div>

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
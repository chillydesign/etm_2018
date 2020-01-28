<?php /* Template Name: Eleves Page Template */ get_header(); ?>

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

				<?php $letters = array('A'=>false, 'B'=>false, 'C'=>false, 'D'=>false, 'E'=>false, 'F'=>false, 'G' =>false , 'H'=>false, 'I'=>false, 'J'=>false, 'K'=>false, 'L'=>false, 'M'=>false, 'N'=>false, 'O'=>false, 'P'=>false, 'Q'=>false, 'R'=>false, 'S'=>false, 'T'=>false, 'U'=>false, 'V'=>false, 'W'=>false, 'X'=>false, 'Y'=>false, 'Z'=>false); ?>
				<?php $first_letter ="";?>
				<?php $eleve_loop = new WP_Query(
							 array(
								 'post_type' => 'eleve', 
								 'posts_per_page' => -1,
								 'meta_key'	=> 'last_name',
								 'orderby' => 'meta_value',
								 'order' => 'ASC')
							 ); ?>

							<section class="eleves">
								<div class="wrapper">
										<?php while ( $eleve_loop->have_posts() ) : $eleve_loop->the_post() ?>
										<?php 
											$post_id = get_the_ID();
											$first_name = get_field('first_name');
											$last_name = get_field('last_name');
											$instrument = get_field('instrument');
											$website = get_field('website');

											$new_first_letter = strtoupper(substr($last_name, 0, 1));
										?>

										<?php if($new_first_letter != $first_letter): ?>
											<h3 class="letterhead"><?php echo $new_first_letter; ?></h3>
											<div class="clear"></div>
											<?php $first_letter = $new_first_letter; ?>
										<?php endif; ?>
										<div class="student_info">
											<p class="student_name">
												<?php if($first_name != ''){echo $first_name . ' ';} ?>
												<?php echo $last_name; ?>
												<?php if($instrument != ''){echo ' <span class="student_instrument">(' . $instrument . ')</span>';} ?>
											</p>
											<div class="student_links">
											<?php if( have_rows('sites') ): ?>
											<?php while ( have_rows('sites') ) : the_row(); ?>
												<?php $website = get_sub_field('link'); ?>
												<?php if (strpos($website, 'http') === false) {$website = '//' . $website;} ?>
												<?php if (strpos($website, 'linkedin') !== false) { 
														echo '<a href="' . $website . '" target="_blank" class=linkedin><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
													} elseif (strpos($website, 'facebook.') !== false) { 
														echo '<a href="' . $website . '" target="_blank" class="facebook"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>';
													} elseif (strpos($website, 'twitter.') !== false) { 
														echo '<a href="' . $website . '" target="_blank" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
													} elseif (strpos($website, 'youtu') !== false) { 
														echo '<a href="' . $website . '" target="_blank" class="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>';
													} elseif (strpos($website, 'soundcloud') !== false) { 
														echo '<a href="' . $website . '" target="_blank" class="soundcloud"><i class="fa fa-soundcloud" aria-hidden="true"></i></a>';
													} elseif (strpos($website, 'instagram') !== false) { 
														echo '<a href="' . $website . '" target="_blank" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
													} elseif (strpos($website, 'bandcamp') !== false) { 
														echo '<a href="' . $website . '" target="_blank" class="bandcamp"><i class="fa fa-bandcamp" aria-hidden="true"></i></a>';
													} elseif (strpos($website, 'mx3') !== false) { 
														echo '<a href="' . $website . '" target="_blank" class="mx3">';  include('mx3.svg'); echo '</a>';
													} else { echo '<a href="' . $website . '" target="_blank" class="site"><i class="fa fa-link" aria-hidden="true"></i></a>';
													} ?>
											<?php endwhile; endif; ?>

											</div>
											<div class="clear"></div>
										</div>

										<?php endwhile; ?>
									</div>
								</section>		
							
			<!-- /article -->

		<?php endwhile; ?>

		<?php endif; ?>

	</main>


<?php get_footer(); ?>

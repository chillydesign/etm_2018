<?php /* Template Name: Enseignants Page Template */ get_header(); ?>

	<main role="main">
	<!-- section -->


	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<section class="pagetitle">
				<div class="wrapper">
					<div class="breadcrumb"><?php echo get_field('breadcrumb'); ?> </div>
					<h1><?php the_title(); ?></h1>
				</div>
			</section>
	<?php include('section-loop.php'); ?>
	<section>
		<div class="wrapper">


			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php $atelier_loop = new WP_Query(
					 array(
						 'post_type' => 'enseignant',
						 'posts_per_page' => -1,
						 'orderby' => 'title',
						 // 'orderby' => 'meta_value',
						 // 'meta_key' => 'nom_de_famille',
						 'order' => 'ASC')
					 ); ?>

					 <?php while ( $atelier_loop->have_posts() ) : $atelier_loop->the_post(); ?>
					 	<a style="width:24%;min-width:180px; display:inline-block; padding:0 20px; margin-bottom:30px; vertical-align:top" href="<?php the_permalink(); ?>">
					 		<?php $id = get_post_thumbnail_id( $post->id ); ?>
					 		<?php $url = get_field('photo')['sizes']['medium']; ?>
					 		<?php //$url = $url['url']; ?>
						 	<div class="enseignant_img" style="background-image: url(<?php echo $url; ?>);"></div>
						 	<!-- <div style="width:100%; padding: 50%; background-image: url(<?php //echo get_field('banner_image')['url']; ?>); background-size: cover; border-radius:50%; margin-bottom:20px;"></div> -->
						 	<h4><?php the_title(); ?></h4>
						 	<p style="text-align:center; text-transform:uppercase; font-size:1.1em;"><?php the_field('discipline'); ?></p>
						 </a>
					 <?php endwhile; ?>
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php endif; ?>

		</div>
	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>

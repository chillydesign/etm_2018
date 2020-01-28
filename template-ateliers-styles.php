<?php /* Template Name: Ateliers par styles Page Template */ get_header(); ?>

	<main role="main">
	<!-- section -->
	

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<section class="pagetitle"><div class="wrapper">
				<div class="breadcrumb"><?php echo get_field('breadcrumb'); ?> </div>
				<h1><?php the_title(); ?></h1>
			</div></section>
	<section>
		<div class="wrapper">
			

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php $atelier_loop = new WP_Query(
					 array(
						 'post_type' => 'atelier', 
						 'posts_per_page' => -1,
						 'orderby' => 'menu_order',
						 'order' => 'ASC'
						 )
					 ); ?>

					 <?php while ( $atelier_loop->have_posts() ) : $atelier_loop->the_post(); ?>
					 	<a class="atelier_link" href="<?php the_permalink(); ?>">
					 		<?php $id = get_post_thumbnail_id( $post->id ); ?>
					 		<?php $url = wp_get_attachment_image_src( $id ,  'large' ); ?>
					 		<?php $url = $url[0]; ?>
						 	<div style="background-image: url(<?php echo $url; ?>); width:100%; padding: 50%; background-size: cover; border-radius:50%; margin-bottom:20px;"></div>
						 	<!-- <div style="width:100%; padding: 50%; background-image: url(<?php //echo get_field('banner_image')['url']; ?>); background-size: cover; border-radius:50%; margin-bottom:20px;"></div> -->
						 	<h4><?php the_title(); ?></h4>
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

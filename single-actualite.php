<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<?php $post_id = get_the_ID(); ?>
	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	<section class="pagetitle">
		<div class="wrapper">
			<div class="breadcrumb" style="font-size:1.12em;"><a href="<?php echo home_url(); ?> ">Home</a> > Events > <?php the_title(); ?> </div>
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
						<?php if(!empty( $date_field )){ ?><h2 style="font-weight:300; margin:-30px 0 30px; font-size:1.2em;"><?php the_field('date'); ?></h2><?php } ?>
						<?php the_content(); ?>
					</div>
					<div class="col-md-3 col-md-pull-9" style="padding: 0px 60px 0 0;"><a href="<?php the_permalink(); ?>"><!-- <div style="width:100%; padding: 37%; background:url(<?php //echo $url;?>) no-repeat; background-size: cover; margin-bottom:20px; margin-top:6px;"></div> --><img src="<?php echo $url; ?>"  <?php if(get_field('photo_circulaire')){?> style="border-radius:50%;" <?php } ?>></a></div>
			 	
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

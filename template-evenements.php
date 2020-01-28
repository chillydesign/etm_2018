<?php /* Template Name: Evenements Page Template */ get_header(); ?>

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
				<?php  $current_date = date('Ymd'); ?>
				<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
				<?php echo $paged; ?>
				<?php $actualite_loop = new WP_Query(
					 array(
						 'post_type' => 'actualite', 
						 'posts_per_page' => -1,
						 'paged' => $paged,
						 'meta_query' => array(
						 	array(
						 		'key' =>'end_date',
							 	'value' => $current_date,
							 	'compare' => '>'
							 	),
						 	),
						 'meta_key'	=> 'end_date',
						 'orderby' => 'meta_value_num',
						 'order' => 'ASC')
				); ?>
							<?php while ( $actualite_loop->have_posts() ) : $actualite_loop->the_post(); ?>
							<?php $post_id = get_the_ID(); ?>
							<?php $url = wp_get_attachment_url( get_post_thumbnail_id( $post_id) ); ?>
								<section class="event">
									<div class="wrapper">
										<div class="row">
											<div class="col-md-8 col-md-push-3">
												<?php $permalink = get_the_permalink(); ?>
												<?php $title = get_the_title(); ?>
												<h2><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h2>
												<?php $date_field = get_field('date'); ?>
												<?php if(!empty($date_field)){ ?><h2 style="font-weight:300; margin:-30px 0 30px; font-size:1.2em;"><?php the_field('date'); ?></h2><?php } ?>
												<p><?php the_excerpt(); ?>&hellip; <a href="<?php echo $permalink; ?>; ?>">Lire la suite</a></p>

												<?php generate_social_links($permalink, $title); ?>
											</div>
											<div class="col-md-3 col-md-pull-8" style="padding: 0px 60px 0 0;"><a href="<?php echo $permalink; ?>"><!-- <div style="width:100%; padding: 37%; background:url(<?php //echo $url;?>) no-repeat; background-size: cover; margin-bottom:20px; margin-top:6px;"></div> --><img src="<?php echo $url; ?>" <?php if(get_field('photo_circulaire')){?> style="border-radius:50%;" <?php } ?>></a></div>
									 	
										</div>
									</div>
								</section>
								<?php endwhile; ?>
								<?php
								$pagination_args = array(
								  'base'            => get_pagenum_link(1) . '%_%',
								  'format'          => 'page/%#%',
								  'total'           => $actualite_loop->max_num_pages,
								  'current'         => $paged,
								  'show_all'        => False,
								  'end_size'        => 1,
								  'mid_size'        => 2,
								  'prev_next'       => True,
								  'prev_text'       => __('&laquo;'),
								  'next_text'       => __('&raquo;'),
								  'type'            => 'plain',
								  'add_args'        => false,
								  'add_fragment'    => ''
								);
								$paginate_links = paginate_links($pagination_args);
								if ($paginate_links) {
								  echo "<section><div class='wrapper'><nav style='background:none' class='custom-pagination'>";
								    
								    echo $paginate_links;
								  echo "</nav></div></section>";
								}
								 ?>
							
							<section></section>
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php endif; ?>

	</main>


<?php get_footer(); ?>

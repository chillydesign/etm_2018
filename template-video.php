<?php /* Template Name: Video Page Template */ get_header(); ?>

	<main role="main">
		<!-- section -->
		

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<section class="pagetitle"><div class="wrapper">
				<div class="breadcrumb"><?php echo get_field('breadcrumb'); ?> </div>
				<h1><?php the_title(); ?></h1>
			</div></section>
				<?php //include('section-loop.php'); ?>
				<?php $category=get_field('category'); ?>

				<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
				<?php $video_loop = new WP_Query(
							 array(
								 'post_type' => 'video', 
								 'posts_per_page' => 10,
								 'paged' => $paged,
								 'meta_query' => array(
								 	array(
								 		'key' =>'category',
									 	'value' => $category,
									 	'compare' => '='
								 	),
								 		),
								 'meta_key'	=> 'date',
								 'orderby' => 'meta_value_num',
								 'order' => 'DSC')
							 ); ?>

							<section class="video">
								<div class="wrapper">
									<div class="row">
										<?php $i=1; ?>
										<?php while ( $video_loop->have_posts() ) : $video_loop->the_post() ?>
										<?php $post_id = get_the_ID(); ?>
										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
											
														<div class="col-sm-6" style="margin-bottom:40px;">
															<?php the_content(); ?>
															<h5><?php the_title(); ?></h5>
														</div>
										<?php if($i%2==0){?></div><div class="row"> <?php } ?>	
										<?php $i++; ?>	
										<?php endwhile; ?>
									</div>
								</section>		
							<section></section>
							<?php
								$pagination_args = array(
								  'base'            => get_pagenum_link(1) . '%_%',
								  'format'          => 'page/%#%',
								  'total'           => $video_loop->max_num_pages,
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
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php endif; ?>

	</main>


<?php get_footer(); ?>

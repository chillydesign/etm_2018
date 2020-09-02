<?php
if (have_rows('sections')) {
	while (have_rows('sections')) : the_row();
		if (get_row_layout() == 'section_type') { ?>
			<?php
			$backgroundclass = get_sub_field('background');
			$borderclass = get_sub_field('bordure');
			$section_template = get_sub_field('section_template');
			?>
			<section class="<?php echo $backgroundclass . ' ' . $borderclass; ?> section_type">
				<div class="wrapper">
					<?php if (get_sub_field('contenu_toute_largeur')) {
						the_sub_field('content');
					} ?>
				</div>

				<?php


				// Photo + Texte
				if ($section_template == "2columns_photo_text") {
					$image_position = get_sub_field('image_position');
					$image = get_sub_field('image');
					$url = $image['url'];
					$text = get_sub_field('text');
					if ($image_position == "left") { ?>
						<div class="wrapper">
							<div class="row">
								<div class="col-sm-6 col-sm-push-6"><?php echo $text; ?></div>
								<div class="col-sm-6 col-sm-pull-6">
									<div style="width:100%; padding: 40%; background: url(<?php echo $url; ?>) no-repeat; background-size: 100% auto; margin-bottom:10px;;"></div>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="wrapper">
							<div class="row">
								<div class="col-sm-6"><?php echo $text; ?></div>
								<div class="col-sm-6">
									<div style="width:100%; padding: 40%; background: url(<?php echo $url; ?>) no-repeat; background-size: 100% auto; margin-bottom:10px;;"></div>
								</div>
							</div>
						</div>
					<?php }
				}

				// 2 Columns
				elseif ($section_template == "2columns") {
					$proportion = get_sub_field('proportions');
					$column1 = get_sub_field('column1');
					$column2 = get_sub_field('column2');

					if ($proportion == "half") { ?>
						<div class="wrapper">
							<div class="row">
								<div class="col-sm-6"><?php echo $column1; ?></div>
								<div class="col-sm-6"><?php echo $column2; ?></div>
							</div>
						</div>
						<? } elseif ($proportion == "onetwo") { ?>
						<div class="wrapper">
							<div class="row">
								<div class="col-sm-4"><?php echo $column1; ?></div>
								<div class="col-sm-8"><?php echo $column2; ?></div>
							</div>
						</div>
					<?php } else { ?>
						<div class="wrapper">
							<div class="row">
								<div class="col-sm-8"><?php echo $column1; ?></div>
								<div class="col-sm-4"><?php echo $column2; ?></div>
							</div>
						</div>
					<?php } ?>

				<?php }

				// 2 Columns with Photo on top
				elseif ($section_template == "2columns_photo") {
					$image1 = get_sub_field('image1');
					$column1 = get_sub_field('column1');
					$image2 = get_sub_field('image2');
					$column2 = get_sub_field('column2');
				?>
					<div class="wrapper">
						<div class="row">
							<div class="col-sm-6">
								<div style="width:100%; padding: 40%; background: url(<?php echo $image1['url']; ?>) no-repeat; background-size: cover; margin-bottom:10px;;"></div>
								<div><?php echo $column1; ?></div>
							</div>
							<div class="col-sm-6">
								<div style="width:100%; padding: 40%; background: url(<?php echo $image2['url']; ?>) no-repeat; background-size: cover; margin-bottom:10px;;"></div>
								<div><?php echo $column2; ?></div>
							</div>
						</div>
					</div>
				<?php }

				// 3 Columns
				elseif ($section_template == "3columns") {
					$column1 = get_sub_field('column1');
					$column2 = get_sub_field('column2');
					$column3 = get_sub_field('column3');
				?>
					<div class="wrapper">
						<div class="row">
							<div class="col-sm-4"><?php echo $column1; ?></div>
							<div class="col-sm-4"><?php echo $column2; ?></div>
							<div class="col-sm-4"><?php echo $column3; ?></div>
						</div>
					</div>
				<?php }

				// 3 Columns with Photo on top
				elseif ($section_template == "3columns_photo") {
					$image1 = get_sub_field('image1');
					$column1 = get_sub_field('column1');
					$image2 = get_sub_field('image2');
					$column2 = get_sub_field('column2');
					$image3 = get_sub_field('image3');
					$column3 = get_sub_field('column3');
				?>
					<div class="wrapper">
						<div class="row">
							<div class="col-sm-4">
								<div style="width:100%; padding: 40%; background: url(<?php echo $image1['url']; ?>) no-repeat; background-size: cover; margin-bottom:30px;;"></div>
								<div><?php echo $column1; ?></div>
							</div>
							<div class="col-sm-4">
								<div style="width:100%; padding: 40%; background: url(<?php echo $image2['url']; ?>) no-repeat; background-size: cover; margin-bottom:30px;;"></div>
								<div><?php echo $column2; ?></div>
							</div>
							<div class="col-sm-4">
								<div style="width:100%; padding: 40%; background: url(<?php echo $image3['url']; ?>) no-repeat; background-size: cover; margin-bottom:30px;;"></div>
								<div><?php echo $column3; ?></div>
							</div>
						</div>
					</div>
				<?php }

				// 6 Columns with Photo on top
				elseif ($section_template == "6columns_photo") {
					$image1 = get_sub_field('image1');
					$column1 = get_sub_field('column1');
					$image2 = get_sub_field('image2');
					$column2 = get_sub_field('column2');
					$image3 = get_sub_field('image3');
					$column3 = get_sub_field('column3');
					$image4 = get_sub_field('image4');
					$column4 = get_sub_field('column4');
					$image5 = get_sub_field('image5');
					$column5 = get_sub_field('column5');
					$image6 = get_sub_field('image6');
					$column6 = get_sub_field('column6');
				?>
					<div class="wrapper">
						<div class="row specialli">
							<div class="col-sm-2">
								<div style="width:100%; padding: 50%; background: url(<?php echo $image1['url']; ?>) no-repeat; background-size: cover; margin-bottom:30px; border-radius:50%;"></div>
								<div style="margin-left:30px;"><?php echo $column1; ?></div>
							</div>
							<div class="col-sm-2">
								<div style="width:100%; padding: 50%; background: url(<?php echo $image2['url']; ?>) no-repeat; background-size: cover; margin-bottom:30px; border-radius:50%;"></div>
								<div style="margin-left:30px;"><?php echo $column2; ?></div>
							</div>
							<div class="col-sm-2">
								<div style="width:100%; padding: 50%; background: url(<?php echo $image3['url']; ?>) no-repeat; background-size: cover; margin-bottom:30px; border-radius:50%;"></div>
								<div style="margin-left:30px;"><?php echo $column3; ?></div>
							</div>
							<div class="col-sm-2">
								<div style="width:100%; padding: 50%; background: url(<?php echo $image4['url']; ?>) no-repeat; background-size: cover; margin-bottom:30px; border-radius:50%;"></div>
								<div style="margin-left:30px;"><?php echo $column4; ?></div>
							</div>
							<div class="col-sm-2">
								<div style="width:100%; padding: 50%; background: url(<?php echo $image5['url']; ?>) no-repeat; background-size: cover; margin-bottom:30px; border-radius:50%;"></div>
								<div style="margin-left:30px;"><?php echo $column5; ?></div>
							</div>
							<div class="col-sm-2">
								<div style="width:100%; padding: 50%; background: url(<?php echo $image6['url']; ?>) no-repeat; background-size: cover; margin-bottom:30px; border-radius:50%;"></div>
								<div style="margin-left:30px;"><?php echo $column6; ?></div>
							</div>
						</div>
					</div>
				<?php }

				//Derniers Projets
				elseif ($section_template == "projects") {
					$projet_loop = new WP_Query(
						array(
							'post_type' => 'projet',
							'posts_per_page' => 4
						)
					); ?>
					<div class="wrapper-sm">
						<div class="row">
							<?php while ($projet_loop->have_posts()) : $projet_loop->the_post(); ?>
								<div class="col-md-3 col-sm-6" style="margin-bottom:30px;">
									<a href="<?php the_permalink(); ?>">
										<?php $id = get_post_thumbnail_id($post_id); ?>
										<?php $url = wp_get_attachment_image_src($id,  'large'); ?>
										<?php $url = $url[0]; ?>
										<div style="width:100%; padding: 40%; background: url(<?php echo $url; ?>) no-repeat; background-size: cover;"></div>
										<h4><?php the_title(); ?></h4>
									</a>
								</div>
							<?php endwhile;
							wp_reset_query(); ?>
						</div>
					</div>
				<?php }

				// Tous les Projets
				elseif ($section_template == "all_projects") { ?>
					<div class="project-gallery">
						<?php $projet_loop = new WP_Query(
							array(
								'post_type' => 'projet',
								'posts_per_page' => -1,
								'orderby' => 'date'
							)
						); ?>
						<div class="wrapper-sm">
							<div class="row">
								<?php while ($projet_loop->have_posts()) : $projet_loop->the_post(); ?>
									<div class="col-md-3 col-sm-6" style="margin-bottom:30px;">
										<a href="<?php the_permalink(); ?>">
											<?php $id = get_post_thumbnail_id($post_id); ?>
											<?php $url = wp_get_attachment_image_src($id,  'large'); ?>
											<?php $url = $url[0]; ?>
											<div style="width:100%; padding: 40%; background: url(<?php echo $url; ?>) no-repeat; background-size: cover;"></div>
											<h4><?php the_title(); ?></h4>
										</a>
									</div>
								<?php endwhile;
								wp_reset_query(); ?>
							</div>
						</div>
					<?php } elseif ($section_template == "gmap") { ?>
						<div class="wrapper">
							<?php $coordinates = strval(get_sub_field('google_map'));
							$google_map = '[chilly_map location="' . $coordinates . '"]'; ?>
							<div class="row">
								<?php if (get_sub_field('map_side') == 'left') { ?>
									<div class="col-sm-6">
										<?php echo do_shortcode($google_map); ?>
									</div>
									<div class="col-sm-6">
										<?php echo get_sub_field('address'); ?>
									</div>
								<?php } else { ?>
									<div class="col-sm-6 col-pull-sm-6">
										<?php echo do_shortcode($google_map); ?>
									</div>
									<div class="col-sm-6 col-push-sm-6">
										<?php echo get_sub_field('address'); ?>
									</div>
								<?php }
								unset($coordinates);
								unset($google_map); ?>
							</div>

						<?php } elseif ($section_template == 'accordion') { ?>
							<div class="wrapper">
								<div id="accordion">
									<?php while (have_rows('accordion')) : the_row(); ?>
										<div class="accordion_section">
											<div class="accordion_button">
												<h2><?php echo get_sub_field('title'); ?></h2>
												<?php if (get_sub_field('subtitle')) { ?><h5><?php echo get_sub_field('subtitle'); ?></h5><?php } ?>
												<div class="accordion_arrow"></div>
											</div>
											<div class="accordion_content"><?php echo get_sub_field('content'); ?></div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php } ?>

			</section>

			<?php } elseif (get_row_layout() == 'section_speciale') {  //Slider
			$type_de_section = get_sub_field('type_de_section');

			if ($type_de_section == 'slider') {
				$caption = get_sub_field('is_caption');
				$nombre_de_slides = get_sub_field('nombre_de_slides'); ?>


				<div id="slideshow" class="slideshow">
					<ul class="bjqs">

						<?php for ($i = 1; $i < $nombre_de_slides + 1; $i++) { ?>

							<?php
							$slidename = "slide" . $i;
							$slide = get_sub_field($slidename);
							$textname = "text" . $i;
							$text = get_sub_field($textname);
							?>


							<li>
								<div style="width:100%; padding: 20%; background: url(<?php echo $slide['url']; ?>) no-repeat; background-size: cover; background-position:bottom; margin-bottom:10px;"></div>
								<?php if ($caption == true) { ?>
									<div class="slidetextcontainer">
										<div class="wrapper"><?php echo $text; ?></div>
									</div>
								<?php } ?>
							</li>
						<?php } ?>
					</ul>
				</div>
			<?php } elseif ($type_de_section == 'video') {
				$videoimage = get_sub_field('videoimage');
				$video = get_sub_field('video'); ?>
				<section class="nopadd">
					<a href="#" data-featherlight="#mylightbox">
						<div class="videosection" style="background-image: url(<?php echo $videoimage['url']; ?>); ">
							<div class="playicon"><?php _e('Lire la vidéo', 'webfactor'); ?></div>
						</div>
					</a>
					<div id="mylightbox"><iframe width="800" height="240" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe></div>
				</section>
			<?php } elseif ($type_de_section == '2fullwidth') {

				$colonne1txt = get_sub_field('colonne1txt');
				$colonne1img = get_sub_field('colonne1img');
				$colonne2txt = get_sub_field('colonne2txt');
				$colonne2img = get_sub_field('colonne2img'); ?>
				<section class="container-fluid whitetext nopadd section2cols">
					<div class="row row-eq-height">
						<div class="col-sm-6 col2fullwidth" style="background-image: url(<?php echo $colonne1img['url']; ?>);"><?php echo $colonne1txt; ?></div>
						<div class="col-sm-6 col2fullwidth" style="background-image: url(<?php echo $colonne2img['url']; ?>); border-right:none;"><?php echo $colonne2txt; ?></div>
					</div>
				</section>
			<?php } elseif ($type_de_section == '3fullwidth') {
				$colonne1txt = get_sub_field('colonne1txt');
				$colonne1img = get_sub_field('colonne1img');
				$colonne2txt = get_sub_field('colonne2txt');
				$colonne2img = get_sub_field('colonne2img');
				$colonne3txt = get_sub_field('colonne3txt');
				$colonne3img = get_sub_field('colonne3img');
				$colonne4txt = get_sub_field('colonne4txt');
				$colonne4img = get_sub_field('colonne4img'); ?>

				<?php if ($colonne4img) : ?>
					<section class="container-fluid whitetext nopadd">
						<div class="row row-eq-height ">
							<div class="col-sm-6 col-md-3 col3fullwidth" style="background-image: url(<?php echo $colonne1img['url']; ?>);"><?php echo $colonne1txt; ?></div>
							<div class="col-sm-6 col-md-3 col3fullwidth col3fullwidthweird" style="background-image: url(<?php echo $colonne2img['url']; ?>);"><?php echo $colonne2txt; ?></div>
							<div class="col-sm-6 col-md-3 col3fullwidth" style="background-image: url(<?php echo $colonne3img['url']; ?>); "><?php echo $colonne3txt; ?></div>
							<div class="col-sm-6 col-md-3 col3fullwidth" style="background-image: url(<?php echo $colonne4img['url']; ?>); border-right:none;"><?php echo $colonne4txt; ?></div>
						</div>
					</section>
				<?php else : ?>
					<section class="container-fluid whitetext nopadd">
						<div class="row row-eq-height ">
							<div class="col-sm-4 col3fullwidth" style="background-image: url(<?php echo $colonne1img['url']; ?>);"><?php echo $colonne1txt; ?></div>
							<div class="col-sm-4 col3fullwidth" style="background-image: url(<?php echo $colonne2img['url']; ?>);"><?php echo $colonne2txt; ?></div>
							<div class="col-sm-4 col3fullwidth" style="background-image: url(<?php echo $colonne3img['url']; ?>); border-right:none;"><?php echo $colonne3txt; ?></div>
						</div>
					</section>
				<?php endif; ?>

			<?php } elseif ($type_de_section == 'news') { ?>
				<section class="hidden-xss">
					<div class="wrapper">
						<h1 style="margin: 40px 0 40px 70px;"><?php _e('Events', 'webfactor'); ?></h1>
						<div id="slideshows" class="slideshows">
							<ul class="bxslider">
								<?php $current_date = date('Ymd'); ?>
								<?php $actualite_loop = new WP_Query(
									array(
										'post_type' => 'actualite',
										'posts_per_page' => 5,
										'meta_query' => array(
											array(
												'key' => 'end_date',
												'value' => $current_date,
												'compare' => '>'
											),
										),
										'meta_key'	=> 'end_date',
										'orderby' => 'meta_value_num',
										'order' => 'ASC'
									)
								); ?>
								<?php $i = 1; ?>
								<?php while ($actualite_loop->have_posts()) : $actualite_loop->the_post(); ?>
									<?php $post_id = get_the_ID(); ?>
									<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>

									<li>
										<div class="eventbox">
											<div class="eventboxwhite">
												<div class="row">
													<div class="col-md-8">
														<h2><?php the_title(); ?></h2>
														<?php $date_field = get_field('date'); ?>
														<?php if (!empty($date_field)) { ?><h2 style="font-weight:300; margin:-30px 0 30px 3px; font-size:1.2em;"><?php echo $date_field; ?></h2><?php } ?>
														<?php //the_content(); 
														?>
														<div class="excerpt"><?php the_excerpt(); ?>...</div>
														<div style="margin:10px 0;"><a href="<?php the_permalink(); ?>">> <?php _e('Read more', 'webfactor'); ?> </a></div>
													</div>
													<div class="col-md-4 hidden-sm hidden-xs"><a href="<?php the_permalink(); ?>">
															<!-- 
																<div style="width:100%; padding: 37%; background:url(
																<?php //echo $url;
																?>) no-repeat; background-size: cover; margin-bottom:20px; margin-top:6px;"></div>
															-->
															<?php if (!empty($url)) { ?><img src="<?php echo $url; ?>"><?php } ?></a></div>

												</div>
											</div>
										</div>
									</li>
								<?php endwhile; ?>
								<!-- <div class="outside">
							  <p><span id="slider-prev"></span><span id="slider-next"></span></p>
							</div> -->
								<?php wp_reset_postdata(); ?>
							</ul>
						</div>
					</div>
				</section>
			<?php } elseif ($type_de_section == "gmap_fullwidth") { ?>
				<?php $coordinates = strval(get_sub_field('google_map'));
				$google_map = '[chilly_map location="' . $coordinates . '"]'; ?>
				<section class="gm_fullwidth">
					<?php echo do_shortcode($google_map); ?>
				</section>



			<?php }
		} elseif (get_row_layout() == 'gallery') { ?>

			<section class="gallery">
				<div class="wrapper">

					<?php $count = 1; ?>
					<?php $i = 1; ?>
					<ul class="album_titles">
						<?php while (have_rows('album')) : the_row(); ?>

							<?php $liclass =  str_replace(' ', '', get_sub_field('title')); ?>
							<?php if ($count == 1) {
								$liclass .= ' current_title';
							} ?>
							<li class="<?php echo $liclass; ?>"><?php the_sub_field('title'); ?></li>
							<?php $count++; ?>
						<?php endwhile ?>
					</ul>
					<?php while (have_rows('album')) : the_row(); ?>
						<?php $images = get_sub_field('photos'); ?>
						<?php $ulclass = str_replace(' ', '', get_sub_field('title')) .  ' album '; ?>
						<?php if ($i == 1) {
							$ulclass .= ' current_album';
						} ?>
						<ul class="<?php echo $ulclass; ?>">

							<?php foreach ($images as $image) : ?>
								<li>

									<a class="gallery" href="<?php echo $image['url']; ?>">
										<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
									</a>
									<p><?php echo $image['caption']; ?></p>
								</li>
							<?php endforeach; ?>
						</ul>

						<?php $i++; ?>
					<?php endwhile ?>



				</div>

			</section>

<?php }





	endwhile;
}
?>
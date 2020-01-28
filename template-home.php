<?php /* Template Name: Accueil */ include('head.php');  ?>

<?php if(get_field('promotion')) : ?>

	<?php $image = get_field('image'); ?>
	<?php if(get_field('mobile_image')):
		$image_mobile = get_field('mobile_image');
	else:
		$image_mobile=$image;
	endif; ?>
	<?php $image_position = get_field('image_position'); ?>
	<?php if($image_position=='top_left' OR $image_position=='bottom_left'){
		$text_center = 'right';
		$left_right = 'left';
	} else {
		$text_center='left';
		$left_right = 'right';
	} ?>
	<?php if($image_position=='top_left' OR $image_position=='top_right'){
		$vertical_text = 'bottom';
		$top_bottom = 'top';
	} else {
		$vertical_text='top';
		$top_bottom = 'bottom';
	} ?>
	<?php $bpos = $top_bottom . ' ' . $left_right; ?>
	<?php $tpos_class = $vertical_text . ' ' . $text_center; ?>
	<?php $title = get_field('title'); ?>
	<?php $button = get_field('bouton'); ?>
	<?php $link = get_field('link'); ?>

	<div class="promotion_banner" style="background-image:url('<?php echo $image['url']; ?>'); background-position:<?php echo $bpos; ?>">
		<div class="promotion_banner_mobile" style="background-image:url('<?php echo $image_mobile['url']; ?>'); background-position:<?php echo $bpos; ?>"></div>
		<div class="promotion_text <?php echo $tpos_class; ?>">
			<div class="container">
				<h2><?php echo $title; ?></h2>
				<div class="clear"></div>
				<h6><a href="<?php echo $link; ?>"><?php echo $button; ?></a></h6>
			</div>
		</div>
	</div>

<?php endif; ?>



<?php include('header_nav.php'); ?>

<main role="main">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<?php $banner_image_field = get_field('banner_image'); ?>
		<?php if(!empty($banner_image_field)) { ?>
			<section class="banner">
				<img style="width:100%; height:auto;" src="<?php echo $banner_image_field['url']; ?>">
			</section>
		<?php } ?>
		<?php $google_map_field = get_field('google_map'); ?>
		<?php if(!empty($google_map_field)) { ?>
			<?php $coordinates = strval(get_field('google_map'));
			$google_map = '[chilly_map location="' . $coordinates . '"]'; ?>
			<section class="gm_fullwidth">
				<?php echo do_shortcode($google_map); ?>
			</section>
		<?php } ?>
		<section class="pagetitle">
			<div class="wrapper">
				<div class="breadcrumb"><?php echo get_field('breadcrumb'); ?> </div>
				<h1><?php the_title(); ?></h1>
			</div>
		</section>
	<?php endwhile; endif; ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $category = get_field('category'); ?>
		<?php include('section-loop.php'); ?>
		<div class="clear"></div>
	</article>
	<!-- /article -->

</main>


<?php get_footer(); ?>

<?php /* Template Name: Under Construction */  ?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if (wp_title('', false)) {
										echo ' :';
									} ?> <?php bloginfo('name'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
	<link href="<?php echo get_template_directory_uri(); ?>/bootstrap.css" rel="stylesheet">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
	<link href="//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.css" type="text/css" rel="stylesheet" />
	<link href="//cdn.rawgit.com/noelboss/featherlight/1.4.0/release/featherlight.gallery.min.css" type="text/css" rel="stylesheet" />

	<link href="<?php echo get_template_directory_uri(); ?>/bjqs.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/jquery.bxslider.css" rel="stylesheet" />


</head>

<body <?php body_class(); ?>>

	<div class="wrapper">

		<div class="logo" style="float:none"></div>
		<h1><?php _e('Site en construction', 'webfactor'); ?></h1>

	</div>

</body>

</html>
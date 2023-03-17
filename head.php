<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if (wp_title('', false)) {
										echo ' :';
									} ?> <?php bloginfo('name'); ?></title>
	<?php $tdu = get_template_directory_uri(); ?>
	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo $tdu; ?>/img/ema_favicon.png" rel="shortcut icon">
	<link href="<?php echo $tdu; ?>/img/ema_favicon.png" rel="apple-touch-icon-precomposed">


	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv=”Pragma” content=”no-cache”>
	<meta http-equiv=”Expires” content=”-1″>
	<meta http-equiv=”CACHE-CONTROL” content=”NO-CACHE”>

	<?php wp_head(); ?>

	<script src="https://use.fontawesome.com/188c7a83eb.js"></script>

	<!-- Facebook Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '232205004307363');
		fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" src="https://www.facebook.com/tr?id=232205004307363&ev=PageView
&noscript=1" />
	</noscript>
	<!-- End Facebook Pixel Code -->


</head>

<body <?php body_class(); ?>>
	<?php header('X-Frame-Options: GOFORIT'); ?>
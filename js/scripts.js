(function ($, root, undefined) {

	$(function () {

		'use strict';

		if (navigator.userAgent.match(/iPad/i) != null) {
			$('.videosection').css({ 'background-attachment': 'scroll' });
		};

		function homevideo() {
			var $lightbox_iframe_height = $('#mylightbox iframe').width() * 0.5;
			console.log($lightbox_iframe_height);
			$('#mylightbox iframe').css({ 'height': $lightbox_iframe_height });
		}
		homevideo();
		$(window).on('resize', function () {
			homevideo();
		})


		var $mobile_nav_button = $('#mobile_nav_button');
		var $nav_cont = $('	.nav .cdwrapper > ul');

		$mobile_nav_button.on('click', function () {
			$nav_cont.slideToggle();
		});



		$('#menu-item-299 > a').click(false);
		// $('p:empty').remove();
		// DOM ready, take it away
		$('.searchbar').on('click', function () {
			$('.searchbar .search-input').animate({
				'width': 150
			}, 500);
			$('.searchbar').addClass('expanded');
		})
		$('.album_titles li').on('click', function () {
			$('.album_titles li').removeClass('current_title');
			var $classname = $(this).attr('class');
			$(this).addClass('current_title');
			$('.current_album').removeClass('current_album');
			var $class_to_change = ".album.";
			$class_to_change += $classname;
			console.log($class_to_change);
			$($class_to_change).addClass('current_album');

		})


		$('.gallery').featherlightGallery();


		// IF CLICK ON PAGE, SLIDE UP SLIDEABLE MENUS
		$(document).on('mouseup', function (event) {
			var $togglableThings = ['.searchbar'];
			for (var i = 0; i < $togglableThings.length; i++) {
				var $node = $togglableThings[i];
				if (!$(event.target).closest($node).length &&
					!$(event.target).is($node)) {
					if ($($node).hasClass("expanded")) {

						$('.searchbar .search-input').animate({
							'width': 30
						}, 500);
						$('.searchbar').removeClass('expanded');

					}
				}

			};
		})

		// function menuitempadding(){
		// 	var $menuitemswidth = $('.menu-item-27').width() + $('.menu-item-26').width() + $('.menu-item-25').width() + $('.menu-item-24').width() + $('.menu-item-23').width() + $('.menu-item-22').width() + $('.menu-item-21').width();

		// 	var $screenwidth = $('.nav').width();
		// 	var $menuitempaddingtotes = $screenwidth - $menuitemswidth;
		// 	var $menuitempadding = $menuitempaddingtotes*0.1-20;
		// 	$('.menu-item a').css({
		// 			'padding-left' : $menuitempadding, 
		// 			'padding-right' : $menuitempadding 
		// 		})

		// 	$('.menu-item.menu-item-has-children a').each(function(){
		// 		$(this).css({
		// 			'padding-right' : $menuitempadding*0.5 + 30
		// 		})
		// 	})
		// }
		// menuitempadding();

		// $(window).on('resize', function(){
		// 	menuitempadding();
		// })


		$('.eventboxwhite').matchHeight();
		$('.col3fullwidth').matchHeight();
		$('.col2fullwidth').matchHeight();



		$('.bxslider').bxSlider();




		var $height = $('.bjqs-slide').height();


		$('.slideshow').each(function (e) {
			addSlider($(this));
		});

		function addSlider(element) {
			var $screenwidth = window.screen.width;


			element.bjqs({
				// width and height need to be provided to enforce consistency
				// if responsive is set to true, these values act as maximum dimensions
				width: 1280,
				height: $height,

				// animation values
				animtype: 'slide', // accepts 'fade' or 'slide'
				animduration: 1000, // how fast the animation are
				animspeed: 4000, // the delay between each slide
				automatic: true, // automatic

				// control and marker configuration
				showcontrols: true, // show next and prev controls
				centercontrols: false, // center controls verically
				nexttext: '', // Text for 'next' button (can use HTML)
				prevtext: '', // Text for 'previous' button (can use HTML)
				showmarkers: false, // Show individual slide markers
				centermarkers: true, // Center markers horizontally

				// interaction values
				keyboardnav: false, // enable keyboard navigation
				hoverpause: true, // pause the slider on hover

				// presentational options
				usecaptions: false, // show captions for images using the image title tag
				randomstart: false, // start slider at random slide
				responsive: true // enable responsive capabilities (beta)
			});
		}
	});





	$('.accordion_button').on('click', function () {
		var $this = $(this);
		var $section = $this.parent('.accordion_section');
		if ($section.hasClass('active')) {
			$section.children('div.accordion_content').slideUp();
			$section.removeClass('active');
		} else {
			$('.active').children('div.accordion_content').slideUp();
			$('.active').removeClass('active');
			$section.children('div.accordion_content').slideDown();
			$section.addClass('active');
		}
	});



	function detectmob() {
		if (navigator.userAgent.match(/Android/i)
			|| navigator.userAgent.match(/webOS/i)
			|| navigator.userAgent.match(/iPhone/i)
			|| navigator.userAgent.match(/iPad/i)
			|| navigator.userAgent.match(/iPod/i)
			|| navigator.userAgent.match(/BlackBerry/i)
			|| navigator.userAgent.match(/Windows Phone/i)
		) {
			return true;
		}
		else {
			return false;
		}
	}

	// hide whatsapp social links
	if (detectmob() == false) {
		$('.social_link_whatsapp').hide();
	}


	$('.copy_email_button').on('click', function (e) {
		e.preventDefault();
		var $this = $(this);
		var $parent = $this.parent();
		var $input = $parent.find('input');
		$input.select();
		document.execCommand("copy");
		$this.find('em').addClass('visible');
	});





})(jQuery, this);

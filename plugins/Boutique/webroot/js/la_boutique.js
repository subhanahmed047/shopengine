var boutique = {
	animate_nivo: function($progress, speed) {
		$progress.find('span').animate({
				'width': '100%'
		}, speed, 'linear');
	},
	reset_nivo: function($progress) {
		$progress.find('span').stop().css('width', '0%');
	}
};

$(document).ready(function() {
	"use strict";

	var base = $('base').attr('href');
	var share_url = base + 'sharrre/';
	var screen_width = $(window).width();

	/* Options Panel / Colour Scheme Picker for theme demo */
	(function() {
		var options_panel = $('.options-panel');
		options_panel.find('.options-panel-toggle').on('click', function(event) {
			options_panel.toggleClass('active');
			if (options_panel.hasClass('active')) {
				options_panel.animate({
					'left': 0
				}, 600, 'easeInOutBack');
			} else {
				options_panel.animate({
					'left': '-' + options_panel.find('.options-panel-content').outerWidth()
				}, 600, 'easeInOutBack');
			}
			event.preventDefault();
		});
		options_panel.find('#option_color_scheme').on('change', function() {
			var new_scheme = $(this).attr('value');
			$.get(new_scheme, function(css) {
				$('#color_scheme').addClass('delete_style');
				$('<link rel="stylesheet" href="'+new_scheme+'" id="color_scheme">').appendTo("head", function() {
					$('.delete_style').remove();
				});
				
				$.cookie('color_scheme', new_scheme);
				
			});
			
			/*
			var stylesheet = $('#color_scheme');
			stylesheet.attr('href', $(this).attr('value'));
			$.cookie('color_scheme', $(this).attr('value'));
			*/
		});
	})();

	/* Click .box selects radio button on shipping methods and payment methods pages */
	(function() {
		$('#checkout-content').on('click', '.shipping-methods .box, .payment-methods .box', function(e) {
			var radio = $(this).find(':radio');
			radio.prop('checked', true);
		});
	})();
	
	/* Slider on home page */
	(function() {
		var slider = $('#slider');
		slider.slider({
			range: true,
			min: 0,
			max: slider.data('max'),
			values: [0, slider.data('max')],
			step: slider.data('step'),
			animate: 200,
			slide: function(event, ui) {
				$('#slider-label').find('strong').html(slider.data('currency') + ui.values[0] + ' &ndash; ' + slider.data('currency') + ui.values[1]);
			},
			change: function(event, ui) {
				var products = $('.product-list').find('li').filter(function() {
					return ($(this).data('price') >= ui.values[0]) && $(this).data('price') <= ui.values[1] ? true : false;
				});
				var $product_list = $('.product-list.isotope');
				$product_list.isotope({
					filter: products
				});
			}
		});
	})();
	
	/* Isotope on shop pages */
	(function() {
		var $product_list = $('.product-list.isotope');
		$product_list.addClass('loading');
		$product_list.imagesLoaded(function() {
			$product_list.isotope({
				itemSelector: 'li',
			}, function($items) {
				this.removeClass('loading');
			});
		});
	})();
	
	/* ImagesLoaded script on blog page */
	(function() {
		imagesLoaded($('.post-list img'), function(){
			
			var $post_list = $('.post-list');
			$post_list.isotope({
				itemSelector: 'article.post-grid'
			});
		});
	
	})();

	/* tooltip on product page */
	$("[rel='tooltip']").tooltip();
	
	/* Social share buttons on product page */
	$('#sharrre .twitter').sharrre({
		template: '<button class="btn btn-xs btn-twitter"><i class="fa fa-twitter"></i> &nbsp; {total}</button>',
		share: {
			twitter: true
		},
		enableHover: false,
		enableTracking: true,
		click: function(api, options) {
			api.simulateClick();
			api.openPopup('twitter');
		}
	});
	$('#sharrre .facebook').sharrre({
		template: '<button class="btn btn-xs btn-facebook"><i class="fa fa-facebook"></i> &nbsp; {total}</button>',
		share: {
			facebook: true
		},
		enableHover: false,
		enableTracking: true,
		click: function(api, options) {
			api.simulateClick();
			api.openPopup('facebook');
		}
	});
	$('#sharrre .pinterest').sharrre({
		template: '<button class="btn btn-xs btn-pinterest"><i class="fa fa-pinterest"></i> &nbsp; {total}</button>',
		share: {
			pinterest: true
		},
		enableHover: false,
		enableTracking: true,
		click: function(api, options) {
			api.simulateClick();
			api.openPopup('pinterest');
		},
		urlCurl: share_url
	});
	
	/* ElevateZoom effect on product page */
	$('.product-images .primary img').elevateZoom({
		zoomType: "inner",
		cursor: "crosshair",
		easing: true,
		zoomWindowFadeIn: 300,
		zoomWindowFadeOut: 300,
		gallery: 'gallery',
		galleryActiveClass: 'active'
	});
	
	/* Header search bar auto complete popup */
	$('#query').keyup(function(){
		$('#autocomplete-results').css({display:'block'});
		setTimeout(function(){
			$('#autocomplete-results').css({display:'none'});
		},3000);
	});
	
	/* Options Panel / Colour Scheme Picker */
	if (typeof($.cookie('color_scheme'))!=undefined && $.cookie('color_scheme') != ''){
		
		/*var stylesheet = $('#color_scheme');
		stylesheet.attr('href', $.cookie('color_scheme'));
		$('.options-panel #option_color_scheme').val($.cookie('color_scheme'));*/
		
		var new_scheme = $.cookie('color_scheme');
		$.get(new_scheme, function(css) {
			$('#color_scheme').addClass('delete_style');
			$('<link rel="stylesheet" href="'+new_scheme+'" id="color_scheme">').appendTo("head", function() {
				$('.delete_style').remove();
			});
			
			$('.options-panel #option_color_scheme').val(new_scheme);
		});
		
	}
	
});
/*$(window).smartresize(function() {
	"use strict";	
	
	var screen_width = $(window).width();
	
	var $product_list = $('.product-list.isotope');
	if (typeof($product_list.isotope)!='undefined'){
		$product_list.isotope('reLayout');
	}	

	
	boutique.resize_menu(screen_width);
});*/
$(window).load(function() {
	"use strict";

	$('html').removeClass('no-js').addClass('js');
	$('.flexslider').flexslider({
		animation: 'fade',
		easing: 'swing',
		smoothHeight: true,
		slideshowSpeed: 10000,
		animationSpeed: 500,
		pauseOnAction: false,
		controlNav: true,
		directionNav: true,
		start: function($slider) {
			var $this = $(this)[0];
			$('<div />', {
				'class': $this.namespace + 'progress'
			}).append($('<span />')).appendTo($slider);
			$('.' + $this.namespace + 'progress').find('span').animate({
				'width': '100%'
			}, $this.slideshowSpeed, $this.easing);
		},
		before: function($slider) {
			var $this = $(this)[0];
			$('.' + $this.namespace + 'progress').find('span').stop().css('width', '0%');
		},
		after: function($slider) {
			var $this = $(this)[0];
			$('.' + $this.namespace + 'progress').find('span').animate({
				'width': '100%'
			}, $this.slideshowSpeed, $this.easing);
		}
	});







	var menu_class='.main-menu.selected';

	function reset_mega(){
		$('.main-menu').css('right',0).removeClass('selected');			
		$('.main-menu li').removeClass('selected');
		$('.main-menu li.back').remove();
		$('.megamenu_container').attr('style','');		


		$('.megamenu-sub-menu').css({position:'absolute'});
	}

	$('.main-menu-button').click(function(){


		if (!$('#menu-main-navigation',$(this).parents(':first')).hasClass('selected'))
			reset_mega();
		else 
			$('.megamenu_container').attr('style','');		
;		

		$('#menu-main-navigation',$(this).parents(':first')).attr('style','').toggleClass('selected');						
		

		if ($('#menu-main-navigation',$(this).parents(':first')).hasClass('selected')){

			$(menu_class+' li').each(function(){


				if ($('>ul',$(this)).length>0){
					if ($('.back',$('>ul',$(this))).length<=0)
						$('>ul',$(this)).prepend('<li class="back"><a href="#">Back</a></li>');
				}
			});
		}

		return false;
	});

	$(window).resize(function(){
		reset_mega();

		$('.zoomContainer').remove();

		if (typeof(zoomConfig)!='undefined'){
			$('.product-images .primary img').elevateZoom(zoomConfig);	
		}
		
	});



	$(menu_class+' a').live('click',function(){

		$(menu_class).css({overflow:'visible'});

		if ($(this).parents('li:first').hasClass('back')){
			

			var level=$(this).parentsUntil(menu_class).parents('ul').length-2;

			var obj=$(this);

			$(this).parents(menu_class).animate({
				'right':(100*level)+'%'					
			},250,function(){

				$(obj).parents('li:first').parents('ul:first').parents('li:first').removeClass('selected');
			});

			var height=parseInt($(obj).parents('li:first').parents('ul:first').parents('li:first').parents('ul:first').outerHeight());
		
			$(menu_class).parents('.megamenu_container:first').css('height',height);


			return false;

		} else if ($('>ul',$(this).parents('li:first')).length>0){

			$(this).parents('li:first').addClass('selected');

			var level=$(this).parentsUntil(menu_class).parents('ul').length;
			

			$(this).parents(menu_class).animate({
				'right':(100*level)+'%'					
			},250,function(){

			});

			var height=parseInt($('>ul',$(this).parents('li:first')).outerHeight());
		
			$(menu_class).parents('.megamenu_container:first').css('height',height);
			
			return false;
		}
		
		
	});
});
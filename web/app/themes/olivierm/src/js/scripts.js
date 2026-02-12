/*include /libs/jquery.core.js*/

(function($) { 
	var Master = {
		onready : function(){

			//////////////// LANGUAGE SWITCHER ////////////////
			$('header .languages-switcher').on('click', function(){
				$('.languages-switcher').toggleClass('active');
			});


			/////////////////// Burger menu - Accessibilité ///////////////////
			var burger = document.querySelector('.burger-menu');
			var nav = document.querySelector('.header-nav');
			if (burger && nav) {
				burger.addEventListener('click', function () {
					var expanded = burger.getAttribute('aria-expanded') === 'true';
					burger.setAttribute('aria-expanded', !expanded);
					burger.classList.toggle('is-active');
					nav.classList.toggle('is-open');
				});
			}


			/////////////////// SMARTPHONE NAVIGATION ///////////////////
			$('header .burger-menu').on('click', function(){
				$('.header-nav').toggleClass('nav--open');
				$('.burger-menu').toggleClass('burger-menu-cross');
				$('html').toggleClass('html--hidden');
			});


			/////////////////// ARTICLES FILTERS ///////////////////
			// Ouverture / fermeture du sommaire
			$('.textpicture-summary .summary-title').on('click', function (event) {
				event.stopPropagation();
				$('.summary-list').toggleClass('list--open');
				$('.summary-title').toggleClass('summary-title-click');
			});

			// Fermer le sommaire au clic extérieur
			$(document).on('click', function (event) {
				if (!$(event.target).closest('.summary-inner').length) {
					$('.summary-list').removeClass('list--open');
					$('.summary-title').removeClass('summary-title-click');
				}
			});

			// Empêcher la fermeture lors du clic dans le sommaire
			$('.summary-inner').on('click', function (event) {
				event.stopPropagation();
			});


			// Active link au clic
			$('.summary-inner a').on('click', function () {
				$('.summary-inner a').removeClass('active');
				$(this).addClass('active');

				// Ferme le sommaire après clic
				$('.summary-list').removeClass('list--open');
				$('.summary-title').removeClass('summary-title-click');
			});


			// ScrollSpy (lien actif au scroll)
			var headerOffset = 150;
			$(window).on('scroll', function () {
				var scrollPos = $(document).scrollTop();

				$('.textpicture-box').each(function () {
					var topOffset = $(this).offset().top - headerOffset;
					var bottomOffset = topOffset + $(this).outerHeight();
					var id = $(this).attr('id');

					if (scrollPos >= topOffset && scrollPos < bottomOffset) {
						$('.summary-inner a').removeClass('active');
						$('.summary-inner a[href="#' + id + '"]').addClass('active');
					}
				});
			});


			// Lien actif au chargement si #hash
			if (window.location.hash) {
				$('.summary-inner a[href="' + window.location.hash + '"]').addClass('active');
			}

		},
			
		onload : function(){},
		onresize : function(){},
		onscroll : function(){},
	};
	$(document).ready( function(){
		Master.onready();
	});


	$(window).resize( function(){
		Master.onresize();
	});

	$(window).on('scroll', function(){
		Master.onscroll();
	});

})(jQuery);
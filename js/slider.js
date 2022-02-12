let myImageSlider = new Swiper('.image-slider', {
	
	simulateTouch: true,
	touchRatio: 1,
	touchAngle: 45,
	grabCursor: true,
	slideToClickedSlide: false,
	hashNavigation: {
		watchState: true,
	},

	slidesPerView: 3,
	watchOverflow: true,
	spaceBetween: 30,
	slidesPerGroup: 1,
	centeredSlides: false,
	initialSlide: 0,
	slidesPerColumn: 1,
	loop: true,
	loopedSlides: 0,
	freeMode: true,

	autoplay: {
		delay: 5000,
		stopOnLastSlide: true,
		disableOnInteraction: false
	},

	speed: 1200,
	direction: 'horizontal',

	effect: 'slide',
	effect: 'coverflow',

	coverflowEffect: {
		rotate: 20,
		stretch: 50,
		slideShadows: true,
	},

	breakpoints: {
		320: {
			slidesPerView: 1,
		},
		480: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 3,
		}
	},
	
	preloadImages: false,

	lazy: {
		loadOnTransitionStart: false,
		loadPrevNext: false,
	}
	
});

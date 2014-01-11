$(function() {

	hungryMenu.init();
	slideMenu.init();
	clearFields.init();
	sliderOverlay.init();

	$("a[rel=external]").click(function(event) {
		event.preventDefault();
		window.open(this.href);
	});

	// handle button rollovers
	$(".rollo").each(function() {
		this.src_over = this.src.replace(/(\.[^.]+)$/, '_over$1');
		this.src_out = this.src;
	}).hover(function() {
		this.src = this.src_over;
	}, function() {
		this.src = this.src_out;
	});

	$("div.share-container a").click(function(event) {
		event.preventDefault();
		window.open(this.href);
	});

	$(window).on("scroll", function () {
		var headerHeight = 176,
			scrollPos = $(this).scrollTop(),
			$gluey = $(".gluey"),
			$regular = $(".site-nav").not(".gluey");
			
		if (scrollPos >= headerHeight) {
			$gluey.addClass("active");
			$regular.addClass("inactive");
		} else {
			$gluey.removeClass("active");
			$regular.removeClass("inactive");
		}
	});

	$(window).load(function () {
		var $imgs = $(".slider img");
		$imgs.fadeIn("fast");
		$(".slider").mCustomScrollbar({
			horizontalScroll:true,
			autoDraggerLength: false,
			mouseWheel: false,
			theme: "dark-2",
			advanced: {
				autoExpandHorizontalScroll: true
			}
		});
		$(".slider").mCustomScrollbar("update");
	});
});

var sliderOverlay = {
	targets: ".slider .target",
	init: function () {
		$(sliderOverlay.targets).each(function(index) {
			var $el = $(this),
				title = $el.data("title"),
				linkTo = $el.data("link-to");
				
				$el.on("click", function (e) {
					e.preventDefault();
					window.location.href = linkTo;
				})
				
			$('<div class="overlay"><div class="overlay_inset">' + title + '</div></div>').appendTo($el);
		});
	}
};

var hungryMenu = {
	divs: "div.hungry",
	init: function() {
		hungryMenu.showHide($(hungryMenu.divs));
		hungryMenu.handleClick($(hungryMenu.divs));
	},
	showHide: function(els) {
		els.hover(function() {
			$(this).children("div").fadeIn("fast");
		}, function() {
			$(this).children("div").fadeOut("fast");
		});
	},
	handleClick: function(els) {
		els.click(function(event) {
			event.preventDefault();
			location.href = $(this).find("a").attr("href");
		});
	}
};

var clearFields = {
	field: ".clear_default",
	init: function() {
		var input = $(clearFields.field);
		input.focus(function(event) {
			if (!this.defaultValue) return;
			if ($(this).val() == this.defaultValue) {
				$(this).val('');
			};
		});
		input.blur(function(event) {
			if (!this.defaultValue) return;
			if (this.value == '') {
				this.value = this.defaultValue;
			};
		});
	}
};

var slideMenu = {
	headers: "h3.subcat_header",
	childLists: "ul.subcats",
	init: function() {
		$(slideMenu.childLists).hide();
		slideMenu.headerClick($(slideMenu.headers));
	},
	headerClick: function(elem) {
		elem.click(function(event) {
			event.preventDefault();
			elem.find("a").removeClass("highlighted");
			$(slideMenu.childLists).hide();
			var link = $(this).children("a");
			link.addClass("highlighted");
			$(this).next("ul").show();
		});
	}
};
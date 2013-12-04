$(function() {
	hungryMenu.init();
	slideMenu.init();
	clearFields.init();	
	
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
});

var hungryMenu = {
	divs: "div.hungry", 
	init: function() {
		hungryMenu.showHide($(hungryMenu.divs));
		hungryMenu.handleClick($(hungryMenu.divs));
	},
	showHide: function(els) {
		els.hover(function() {
			$(this).children("div").show();
		}, function() {
			$(this).children("div").hide();
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
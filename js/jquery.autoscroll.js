/*
 * AutoScroll Plugin for jQuery
 *
 * Copyright (c) 2006 Jonathan Sharp (jdsharp.us)
 * Licensed under the GPL license.
 *
 * http://jdsharp.us/code/AutoScroll/
 *
 * Date: 2006-09-19
 * Rev: 001
 *
 * Modified by Jonathan Vingiano to allow for scrolling w/o a mouse event
 */

$.autoscroll = {
	settings: 	{},
	interval: 	0,
	event: 		null,

	init: function(opts) {
		$.autoscroll.settings = {
			step: 		80,
			trigger:	75,
			interval: 	80,

		};
		
		if (opts) {
			for (o in opts) {
				$.autoscroll.settings[o] = opts[o];
			}
		}
		document.onmousemove= $.autoscroll.setMouseEvent;
	},

	setMouseEvent: function(e) {
		var e	= e || window.event;
		var de	= document.documentElement;
		var b	= document.body;
      if ($.autoscroll.interval == 0) {
			$.autoscroll.interval = setInterval($.autoscroll.step, $.autoscroll.settings.interval);
		}
		$.autoscroll.event = {
			cursor: {
				x: e.pageX || (e.clientX + (de.scrollLeft || b.scrollLeft) - (de.clientLeft || 0)),
			},
	
			win: {
				w: window.innerWidth  || (de.clientWidth && de.clientWidth != 0 ? de.clientWidth : b.offsetWidth),
			},
	
			scroll: {
				x: (document.all ? 
						(!de.scrollLeft ? b.scrollLeft : de.scrollLeft)
						:
						(window.pageXOffset ? window.pageXOffset : window.scrollX)
						),
			}
		};
	},
	
	step: function() {
		var e = $.autoscroll.event;
		if (!e) {
			return;
		}

		var hot_l 	= e.scroll.x;
		var hot_r 	= e.scroll.x + e.win.w;
		var x		= e.cursor.x;
	
		if (hot_l <= x && x <= (hot_l + $.autoscroll.settings.trigger)) {
			var ratio 	= (1 - ((x - hot_l) / $.autoscroll.settings.trigger));
			var step	= Math.round(ratio * $.autoscroll.settings.step, 0);
			e.scroll.x += -step;
			e.cursor.x += -step;
		} else if ((hot_r - $.autoscroll.settings.trigger) <= x && x <= hot_r) {
			var ratio 	= (1 - ((hot_r - x) / $.autoscroll.settings.trigger));
			var step	= Math.round(ratio * $.autoscroll.settings.step, 0);
			e.scroll.x += step;
			e.cursor.x += step;
		}
	
		if (e.scroll.x < 0) {
			e.scroll.x = 0;
			e.cursor.x = 0;
		}

		window.scrollTo(e.scroll.x, e.scroll.y);
	}
};
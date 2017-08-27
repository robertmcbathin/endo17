// Comment out the following function call to manually use the menu toggle grippy
 
 $(document).ready(function() {

	var bp = new BehindPixels();
	bp.Init();
});


function BehindPixels () {

	this.Init = function() {
		this.AnimateLogo('logo', 100);
	}

	this.AnimateLogo = function(id, count) {
		var obj = $('#' + id),
		sqSize = obj.outerWidth() / count;

		objHeight = ( Math.floor(obj.outerHeight() / sqSize) + 1 ) * sqSize;
		obj.css({'height' : objHeight, 'line-height' : objHeight + 'px'});
		console.log( objHeight / sqSize);

		for (var i = 0; i < count; i++) {
			for ( var j = 0; j < objHeight / sqSize; j++ ) {
				var square = document.createElement('div');

				$(square).css({
					'width' : sqSize,
					'height' : sqSize,
					'top' : j * sqSize,
					'left' : i * sqSize,
					'position' : 'absolute',
					'display' : 'block',
					'background-color' : '#fff',
					'padding' : 0
				});
				obj.append($(square));

			}
		}

		$(document).ready(function() {
			$('h1 div').each(function() {
				var num = Math.random() * 200;
				var delay = Math.random() * 1500;
				$(this).delay(delay).fadeOut(num, function() {
					$(this).remove();
				});
			});
		});

	}

};
/*jslint strict:false, browser:true*/
/*global MBTIC:false, window:false*/

(function () {
	var setup, render, drawBackground;

	setup = function () {
		MBTIC.simpleLoader({
			rgb: 'rgb.jpg',
			alpha: 'inverse_alpha_mask.png'
		}, function (images) {
			render(images);
		});
	};

	drawBackground = function (ctx) {
		var w = ctx.canvas.width, h = ctx.canvas.height, x, y;
		ctx.fillStyle = '#fff';
		ctx.fillRect(0, 0, w, h);
		ctx.fillStyle = '#ccc';
		for (x = 0; x < w; x += 16) {
			for (y = 0; y < h; y += 16) {
				ctx.fillRect(x, y, 8, 8);
				ctx.fillRect(x + 8, y + 8, 8, 8);
			}
		}
	};

	render = function (images) {
		var ctx = document.getElementById('canvas').getContext('2d'),
			rgba = MBTIC.toRgbaFromInverseAlphaMask(images.rgb, images.alpha);
		drawBackground(ctx);
		ctx.drawImage(rgba, 0, 0);
	};

	window.onload = setup;
}());
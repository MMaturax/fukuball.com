/*jslint strict:false, plusplus:false*/
/*global window:false*/

var MBTIC = window.MBTIC || {};

MBTIC.toRgbaFromInverseAlphaMask = function (rgbImage, inverseAlphaMask) {
	var width = rgbImage.width, height = rgbImage.height;
	return MBTIC.renderToCanvas(width, height, function (ctx) {
		ctx.drawImage(rgbImage, 0, 0);
		ctx.globalCompositeOperation = 'xor';
		ctx.drawImage(inverseAlphaMask, 0, 0);
	});
};

MBTIC.toRgbaFromAlphaChannel = function (rgbImage, alphaChannelImage) {
	var width = rgbImage.width, height = rgbImage.height;
	return MBTIC.renderToCanvas(width, height, function (ctx) {
		var alpha = MBTIC.renderToCanvas(width, height, function (ctx) {
			var id, data, i;
			ctx.drawImage(alphaChannelImage, 0, 0);
			id = ctx.getImageData(0, 0, width, height);
			data = id.data;
			for (i = data.length - 1; i > 0; i -= 4) {
				data[i] = 255 - data[i - 3];
			}
			ctx.clearRect(0, 0, width, height);
			ctx.putImageData(id, 0, 0);
		});
		ctx.drawImage(rgbImage, 0, 0);
		ctx.globalCompositeOperation = 'xor';
		ctx.drawImage(alpha, 0, 0);
	});
};

MBTIC.toRgbaFromSvgClippingPathData = function (rgbImage, svgClippingPathData) {
	var width = rgbImage.width, height = rgbImage.height;
	return MBTIC.renderToCanvas(width, height, function (ctx) {
		var p, i, len;
		p = svgClippingPathData.split(/,| /);
		ctx.beginPath();
		for (i = 0, len = p.length; i < len; i++) {
			switch (p[i]) {
			case 'M':
				ctx.moveTo(p[i + 1], p[i + 2]);
				i += 2;
				break;
			case 'L':
				ctx.lineTo(p[i + 1], p[i + 2]);
				i += 2;
				break;
			case 'C':
				ctx.bezierCurveTo(p[i + 1], p[i + 2], p[i + 3], p[i + 4], p[i + 5], p[i + 6]);
				i += 6;
				break;
			case 'z':
			case 'Z':
				ctx.closePath();
				break;
			default:
				if (window.console) {
					window.console.log(p[i]);
				}
				break;
			}
		}
		ctx.clip();
		ctx.drawImage(rgbImage, 0, 0);
	});
};
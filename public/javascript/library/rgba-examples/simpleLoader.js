/*jslint strict:false, browser:true, plusplus:false*/
/*global window:false*/

var MBTIC = window.MBTIC || {};

MBTIC.simpleLoader = function (files, callback) {
	var toLoad = 0, images = {}, id, image, loaded;

	loaded = function () {
		--toLoad;
		if (!toLoad) {
			callback(images);
		}
	};

	for (id in files) {
		if (files.hasOwnProperty(id)) {
			image = new Image();
			++toLoad;
			image.onload = loaded;
			image.src = files[id];
			images[id] = image;
		}
	}
};
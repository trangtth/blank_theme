$(document).ready(function() {
	$("#carousel-inner .item").each(function() {
		var dataSlideTo = $(this).index();
		var indicator = '';

		if (dataSlideTo == 0) {
			indicator = '<li data-target="#myCarousel" data-slide-to="' + dataSlideTo + '" class="active"></li>';
		} else {
			indicator = '<li data-target="#myCarousel" data-slide-to="' + dataSlideTo + '"></li>';
		}

		$("#carousel-indicators").append(indicator);
	});
});
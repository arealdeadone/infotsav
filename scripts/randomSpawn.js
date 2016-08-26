var main = function() {
	var topPos = Math.floor((Math.random()*2000) + 60);
	var leftPos = Math.floor((Math.random()*100) + 0);
	$('.r16').css('top', topPos+'px');
	$('.r16').css('left', leftPos+'px');
	$('.r16').hide();
}

$(document).ready(main);
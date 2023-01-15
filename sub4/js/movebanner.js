// JavaScript Document

$(document).ready(function () {
	var position = 0; //최초위치
	var movesize = 6; //이동 크기 // 2씩 이동시킬것
	var timeonoff;

	$('.partnerBox ul').after($('.partnerBox ul').clone()); //복제
	// $('가져다 놓을 태그').after('기준태그'); //바로 다음에 두어라

	function partnerMove() {
		position -= movesize; // 150씩 감소
		$('.partnerBox').css('left', position);

		if (position < -2160) { //position < -945
			$('.partnerBox').css('left', 0); //0
			position = 0; //0
		}

	};

	timeonoff = setInterval(partnerMove, 100);

	$('.partnerBox').hover(function () {
		clearInterval(timeonoff);
	}, function () {
		timeonoff = setInterval(partnerMove, 100);
	});


});
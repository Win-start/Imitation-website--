// function stop() {
// 	return false;
// }
// document.oncontextmenu = stop;
//	首页向下圆圈
setInterval(function () {
	$(".arrow").animate({
		bottom: '20px',
		opacity: '1'
	}, 400).animate({
		bottom: '30px',
		opacity: '.6'
	}, 400)
}, 400);
//内页导航
$(window).scroll(function () {
	if ($(window).scrollTop() > 0) {
		$('.ml-nav').addClass("curr")
		$('.ml-nav').find(".ml-logo img").attr("src", "imgs/logo_didu.png");
		$('.ml-nav').find(" li div").css("background", "#ffffff")
	} else {
		$('.ml-nav').removeClass("curr");
		$('.ml-nav').find(".ml-logo img").attr("src", "imgs/logo_didu.png");
		$('.ml-nav').find(" li div").css("background", "#fff")
	}
})

//内页导航
$(window).scroll(function () {
	if ($(window).scrollTop() > 0) {
		$('.ml-nav1').addClass("curr")
		$('.ml-nav1').find(".ml-logo img").attr("src", "imgs/logo_didu.png");
		$('.ml-nav1').find(" li div").css("background", "#ffffff")
	} else {
		$('.ml-nav1').removeClass("curr");
		$('.ml-nav1').find(".ml-logo img").attr("src", "imgs/logo_didu.png");
		$('.ml-nav1').find(" li div").css("background", "#ffffff")
	}
})
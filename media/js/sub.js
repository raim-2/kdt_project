$('.down').click(function () {
    screenHeight = $(window).height() - 90;
    $('html,body').animate({
        'scrollTop': screenHeight
    }, 1000);
});

let screenSize, screenHeight;

function screen_size() {
    screenSize = $(window).width(); //스크린의 너비
    screenHeight = $(window).height(); //스크린의 높이

    $("#content").css("margin-top", screenHeight);
}

screen_size(); //최초 실행시 호출

$(window).resize(function () {
    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
    screen_size();
});

$(".down").click(function () {
    screenHeight = $(window).height() - 95;
    $("html,body").animate({
        scrollTop: screenHeight
    }, 1000);
});

//sub1 
// var plotHeight = $('.plot div.img').height();
// $(".plot div.text").css('height', plotHeight);

// $(window).resize(function () {
//     plotHeight = $('.plot div.img').height();
//     $(".plot div.text").css('height', plotHeight);
// });


//sub2 이미지 변경 

function screenW() {
    if (screenSize > 768) {
        $('.sub .img1').attr('src', './images/sub2/design6.jpg');
        $('.sub .img2').attr('src', './images/sub2/design5.jpg');
        $('.sub .img3').attr('src', './images/sub2/design7.jpg');
        $('.plot1 .img img').attr('src', './images/sub1/plot7.jpg');
        $('.plot2 .img img').attr('src', './images/sub1/plot9.jpg');
        $('.part1 .main img').attr('src', './images/sub2/design3.jpg');
    } else if (screenSize <= 768) {
        $('.sub .img1').attr('src', './images/sub2/design6_1.jpg');
        $('.sub .img2').attr('src', './images/sub2/design5_1.jpg');
        $('.sub .img3').attr('src', './images/sub2/design7_1.jpg');
        $('.plot1 .img img').attr('src', './images/sub1/plot4.jpg');
        $('.plot2 .img img').attr('src', './images/sub1/plot5.jpg');
        $('.part1 .main img').attr('src', './images/sub2/design9.jpg');
    }
}


screenW(); //함수호출    

$(window).resize(function () {
    screenSize = $(window).width();
    screenW(); //함수호출
});

//sub 3
//시디 회전
var ind = 0;

$('.click_box .playBtn').click(function (e) {
    e.preventDefault();
    ind = $(this).parents('li').index();
    $('.tab_menu li').find('img').removeClass();
    $('.tab_menu li:eq(' + ind + ')').find('img').addClass('rotationImg' + (ind + 1));
    
    $('.click_box .stopBtn').css('opacity', '.7')
    $('.click_box .playBtn').css('opacity', '.7')
    $('.tab_menu li:eq(' + ind + ')').find('.playBtn').css('opacity', '1')
    $('.music ul.tab_menu li:eq(0)').removeClass('on')
    $('.music ul.tab_menu li:eq(0)').addClass('on')

});

$('.click_box .stopBtn').click(function (e) {
    e.preventDefault();
    ind = $(this).parents('li').index();
    $('.tab_menu li').find('img').removeClass();
    $('.tab_menu li:eq(' + ind + ')').find('img').removeClass();

    $('.click_box .stopBtn').css('opacity', '.7')
    $('.click_box .playBtn').css('opacity', '.7')
    $('.tab_menu li:eq(' + ind + ')').find('.stopBtn').css('opacity', '1')
    $('.music ul.tab_menu li::before').css('display', 'none')
    $('.music ul.tab_menu li:eq(0)').removeClass('on')
});


/* music*/
let audio; 
let audioAll = document.querySelectorAll('.testAudio'); 
let cnt;

$('.tab_menu .playBtn').click(function(e){
    cnt = $('.tab_menu').find('.playBtn').index(this);
    //0, 1, 2

    audioAll.forEach(function(audio, index) {
        if (index !== cnt) {
            audio.pause(); // 클릭한 인덱스가 아닌 경우 일시 중지
        }
    });

    audio = document.getElementById('testAudio'+(cnt+1));
    audio.play();
})

$('.tab_menu .stopBtn').click(function(e){
    cnt = $('.tab_menu').find('.stopBtn').index(this);

    audio = document.getElementById('testAudio'+(cnt+1)) 
    audio.pause();
})


$(window).resize(function () {
    screenSize = $(window).width();
    $('.tab_menu li').find('img').removeClass();
    $('.music ul.tab_menu li:eq(0)').removeClass()
});
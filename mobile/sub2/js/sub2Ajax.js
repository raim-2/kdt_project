//제이쿼리에서 json파일을 불러오는 코드
$.ajax({
    method: 'GET',
    url: '../sub2/sub2Ajax.json',
    dataType: 'json',
    success: function (data) {
        var product = data.main;

        function dataPrint() {
            var txt = '<ul class="pop_menu">';

            for (var i in product) {
                var $Name = product[i].Name;
                var $Image = product[i].Image;

                txt += '<li>';
                txt += '<a href="#">';
                txt += '<img src="' + $Image + '" alt="' + $Name + '">';
                txt += '</a>';
            }

            txt += '</ul>';
            $('.product_list').html(txt);
        };

        //초기실행, 함수호출
        dataPrint();
    }
});
    

$(".pop .pop_menu a").click(function (e) {
    e.preventDefault();
    ind = $(this).index(".pop .pop_menu a"); // 0 1 2 3

    $(".pop .modal_box").fadeIn("fast");
    $(".pop .popup").fadeIn("slow");

    $.ajax({
        method: 'GET',
        url: '../sub2/sub2Ajax.json',
        dataType: 'json',
        success: function (data) {
            var memo = data.memo;
            
            function popchange() {
                var txt = "";

                $(".pop .popup img").attr(
                    "src",
                    "./images/content4/product0" + (ind + 1) + "_2.png"
                );
                txt = "";
                txt += "<dl>";
                txt += "<dt><span>제품명</span>" + memo[ind].title + "</dt>";
                txt += "<dd><span>성분</span>" + memo[ind].component + "</dd>";
                txt += "<dd><span>효능</span>" + memo[ind].sub1 + "</dd>";
                txt += "<dd><span>용법</span>" + memo[ind].sub2 + "</dd>";
                txt += "</dl>";
                $(".pop .popup .txt").html(txt);
            }

            //함수 호출
            popchange();
        }
    });
});

$(".close_btn,.pop .modal_box").click(function (e) {
    e.preventDefault();
    $(".pop .modal_box").fadeOut("fast");
    $(".pop .popup").fadeOut("fast");
});
function login_cancel() {
  history.go(-1);
}

//login 창 icon_focus

$(".login_input, .find_input").keydown(function () {
  $(this).prev("span").css("color", "#01abce");
});

$(".login_input, .find_input").focus(function () {
  $(this).prev("span").css("color", "#01abce");
});

$(".login_input, .find_input").blur(function () {
  $(this).prev("span").css("color", "#333");
});


//find 창 loadtext 모달

 $('#col2 input.find').click(function (e) {
   e.preventDefault();
   let inputVal = $('#col2 input.find_input').val()

   if (inputVal.length == 0 || inputVal == '') {
    $('#col2 .popup').hide();
   } else if (inputVal.length > 0 || inputVal != '') {
    $('#col2 .popup').show();
     $('#col2 .modal_box').fadeIn('fast');
     $('#col2 .popup').fadeIn('slow');
   }
 });

 $('#col2 .modal_box').click(function (e) {
   e.preventDefault();
   $('#col2 .modal_box').hide();
   $('#col2 .popup').hide();
 });
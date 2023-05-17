<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="ko">
<head> 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>동아ST-회원가입수정</title>
<link rel="stylesheet" href="../common/css/common.css">
<link href="./css/member_check.css" rel="stylesheet" type="text/css" media="all">

<script src="./js/jquery-1.12.4.min.js"></script>
<script src="./js/jquery-migrate-1.4.1.min.js"></script>
	<script>
        $(document).ready(function() {
            //pw-pw_confirm 중복검사
            $("#pass, #pass_confirm").keyup(function() {    
                var pass = $('#pass').val(); 
                var pass_confirm = $('#pass_confirm').val();

                $.ajax({
                    type: "POST",
                    url: "check_pw.php",
                    data: {"pass_confirm": pass_confirm,
                    "pass": pass},
                    cache: false, 
                    success: function(data)
                    {
                        $("#loadtext").html(data);
                    }
                });
            });

            //nick 중복검사		 
            $("#nick").keyup(function() {   
                var nick = $('#nick').val();

                $.ajax({
                    type: "POST",
                    url: "check_nick.php",
                    data: "nick="+ nick,  
                    cache: false, 
                    success: function(data)
                    {
                        $("#loadtext2").html(data);
                    }
                });
            });	
        });
	</script>
<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=800,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=800,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";

      let loadtext = document.querySelector('#loadtext');
      let loadtext2 = document.querySelector('#loadtext2');

      loadtext.innerHTML = "";
      loadtext2.innerHTML = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'"; //세션변수 활용
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]); //split - php는 explode
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
    <header>
        <h1>
            <a class="logo" href="../index.html">
                동아ST
            </a>
        </h1>
    </header>
    <article id="content">
        <h2>회원정보수정</h2>
        <form  name="member_form" method="post" action="modify.php" class="inform modify"> 

            <ul>
                <li>
                    <dl>
                        <dt><label for="id">아이디</label></dt>
                        <dd>
                            <input type="text" name="id" id="id" value="<?= $row[id] ?>" readonly>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><label for="pass">비밀번호</label></dt>
                        <dd><input type="password" name="pass" id="pass" value=""></dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><label for="pass_confirm">비밀번호 확인</label></dt>
                        <dd class="pass_box">
                            <input type="password" name="pass_confirm" id="pass_confirm" value="">
                            <span id="loadtext"></span>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><label for="name">이름</label></dt>
                        <dd><input type="text" name="name" id="name" value="<?= $row[name] ?>"></dd>
                    </dl>
                </li>
                <li class="nick">
                    <dl>
                        <dt><label for="nick">닉네임</label></dt>
                        <dd class="nick_box">
                            <div id="nick1">
                                <input type="text" name="nick" id="nick" value="<?= $row[nick] ?>"></div>
                            <span id="loadtext2"></span>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt>휴대폰</dt>
                        <dd>
                            <label class="hidden" for="hp1">전화번호앞3자리</label>
                            <select class="hp" name="hp1" id="hp1"> 
                                <option value='010' <? if($hp1=='010') echo 'selected'; ?>>010</option>
                                <option value='011' <? if($hp1=='011') echo 'selected'; ?>>011</option>
                                <option value='016' <? if($hp1=='016') echo 'selected'; ?>>016</option>
                                <option value='017' <? if($hp1=='017') echo 'selected'; ?>>017</option>
                                <option value='018' <? if($hp1=='018') echo 'selected'; ?>>018</option>
                                <option value='019' <? if($hp1=='019') echo 'selected'; ?>>019</option>
                            </select>
                            <span> - </span>
                            <label class="hidden" for="hp2">전화번호중간4자리</label>
                            <input type="text" id="hp2" class="hp" name="hp2" value="<?= $hp2 ?>">
                            <span> - </span>
                            <label class="hidden" for="hp3">전화번호끝4자리</label>
                            <input type="text" id="hp3" class="hp" name="hp3" value="<?= $hp3 ?>">
                        </dd>
                    </dl>
                </li>
                <li class="email">
                    <dl>
                        <dt>이메일</dt>
                        <dd>
                            <label class="hidden" for="email1">이메일아이디</label>
                            <input type="text" id="email1" name="email1" value="<?= $email1 ?>">
                            <span> @ </span>  
                            <label class="hidden" for="email2">이메일주소</label>
                            <input type="text" id="email2" name="email2" value="<?= $email2 ?>">
                        </dd>
                    </dl>
                </li>
            </ul>

            <div id="button">
                <a href="#" onclick="check_input()" class="ok">
                    정보수정
                </a>&nbsp;&nbsp;
                <a href="#" onclick="reset_form()" class="cancel">
                    취소하기
                </a>
            </div>
        </form>
    </article>
</body>
</html>

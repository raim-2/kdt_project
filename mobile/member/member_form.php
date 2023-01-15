<? 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="./css/member_check.css">
	
    <script src="https://kit.fontawesome.com/7a47db0dc1.js" crossorigin="anonymous"></script>
    <script src="./js/jquery-1.12.4.min.js"></script>
    <script src="./js/jquery-migrate-1.4.1.min.js"></script>

	<script>
        $(document).ready(function() {
            //id 중복검사
            $("#id").keyup(function() {    // id입력 상자에 id값 입력시
                var id = $('#id').val(); //aaa

                $.ajax({
                    type: "POST",
                    url: "check_id.php",
                    data: "id="+ id,  
                    cache: false, 
                    success: function(data)
                    {
                        $("#loadtext").html(data);
                    }
                });
            });
                
            //nick 중복검사		 
            $("#nick").keyup(function() {    // id입력 상자에 id값 입력시
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

             //pw-pw_confirm 중복검사
            $("#pass_confirm").keyup(function() {    
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
                        $("#loadtext3").html(data);
                    }
                });
            }); 
        });
	</script>
	<script>
        function check_input()
        {
            if (!document.member_form.id.value)
            {
                alert("아이디를 입력하세요");    
                document.member_form.id.focus();
                return;
            }

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
                // insert.php 로 변수 전송
        }

        function reset_form()
        {
            document.member_form.id.value = "";
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
            let loadtext3 = document.querySelector('#loadtext3');

            loadtext.innerHTML = "";
            loadtext2.innerHTML = "";
            loadtext3.innerHTML = "";

            document.member_form.id.focus();

            return;
        }
    </script>
</head>
<body>
    <div id="wrap">
        <header>
            <div class="topMenu">
                <span><a href="../login/login_form.php"><i class="fa-solid fa-arrow-left-long"></i></a></span>
                <span><a href="../index.html"><i class="fa-solid fa-house"></i></a></span>
            </div>  
            <h1 class="hidden">
                <a class="logo" href="../index.html">
                    동아ST
                </a>
            </h1>
        </header>
        <article id="content">  
        
        <h2 class="hidden">회원가입</h2>
        <form name="member_form" method="post" action="insert.php" class="inform"> 
            <div class="inform_tit">
                <h3 class="insertDetail">회원가입 정보</h3>
                <p><span>*</span> 는 필수 입력항목입니다.</p>
            </div>
            <dl>
                <dt><label for="id">아이디</label></dt>
                <dd>
                    <input type="text" name="id" id="id" placeholder="아이디를 입력하세요." required>
                    <span id="loadtext"></span>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="pass">비밀번호</label>
                </dt>
                <dd>
                    <input type="password" name="pass" id="pass" placeholder="비밀번호를 입력하세요." required>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="pass_confirm">비밀번호 확인</label>
                </dt>
                <dd>
                    <input type="password" name="pass_confirm" id="pass_confirm" placeholder="비밀번호를 입력하세요." required>
                    <span id="loadtext3"></span>
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="name">이름</label>
                </dt>
                <dd>
                    <input type="text" name="name" id="name" placeholder="이름을 입력하세요." required> 
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="nick">닉네임</label>
                </dt>
                <dd>
                    <input type="text" name="nick" id="nick" placeholder="닉네임을 입력하세요." required>
                    <span id="loadtext2"></span>
                </dd>
            </dl>
            <dl>
                <dt>휴대폰</dt>
                <dd>
                    <label class="hidden" for="hp1">전화번호앞3자리</label>
                    <select class="hp" name="hp1" id="hp1"> 
                        <option value='010'>010</option>
                        <option value='011'>011</option>
                        <option value='016'>016</option>
                        <option value='017'>017</option>
                        <option value='018'>018</option>
                        <option value='019'>019</option>
                    </select>
                    <span class="divide">-</span>
                    <label class="hidden" for="hp2">전화번호중간4자리</label>
                    <input type="text" class="hp" name="hp2" id="hp2" placeholder="0000" required>
                    <span class="divide">-</span>
                    <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3" placeholder="0000" required>
                </dd>
            </dl>
            <dl>
                <dt>이메일</dt>
                <dd>
                    <label class="hidden" for="email1">이메일아이디</label>
                    <input type="text" id="email1" name="email1" required>
                    <span class="divide">@</span>
                    <label class="hidden" for="email2">이메일주소</label>
                    <input type="text" name="email2" id="email2" required>
                </dd>
            </dl>
            <div class="button">
                    <a href="#" onclick="check_input()" class="ok">
                    회원가입
                    </a>
                    <a href="#" onclick="reset_form()" class="cancel">
                    취소하기
                    </a>
            </div>
        </form>
        
        </article>
    </div>
</body>
</html>



<? session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>동아ST-로그인</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/7a47db0dc1.js" crossorigin="anonymous"></script>
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    
</head>
<body>
<header>
        <h1>
            <a class="logo" href="../index.html">
                동아ST
            </a>
        </h1>
    </header>
    <article id="content">
    <h2>로그인</h2>
        <form  name="member_form" method="post" action="login.php"> 
            <div id="id_pw_input">
                <ul>
                    <li>
                        <span><i class="fa-solid fa-user"></i></span>
                        <label for="id" class="hidden">아이디</label>
                        <input type="text" id="id" name="id" class="login_input" placeholder="아이디를 입력하세요." required>
                    </li>
                    <li>
                        <span><i class="fa-solid fa-lock"></i></span>
                        <label for="pass" class="hidden">비밀번호</label>
                        <input type="password" id="pass" name="pass" class="login_input" placeholder="비밀번호를 입력하세요." required>
                    </li>
                </ul>						
            </div>
            <div id="login_button">
                <button type="submit" class="hvr-sweep-to-right">로그인</button>
            </div>

            <ul class="find">
                <!-- <li><i class="fas fa-lock"></i>보안접속</li> -->
                <li>
                     <span><a href="id_find.php">아이디 찾기</a></span>
                    <span><a href="pw_find.php">비밀번호 찾기</a></span>
                </li>
            </ul>
            
            <ul class="join">
                <li>
                    <div id="join_button">
                        <a href="../member/join.html">회원가입</a>
                    </div>
                </li>
                <li>
                    <div id="cancel_button">
                        <a href="#" onclick="login_cancel()" class="cancel">취소</a>                  
                        <!-- <button type="button" onclick="login_cancel()" class="cancel">취소</button> -->
                    </div>
                </li>
            </ul>
        </form>
</article>
<footer>
    <p>Copyright © DONG-A ST. All Rights Reserved.</p>
</footer>
<script src="./js/login.js"></script>
</body>
</html>
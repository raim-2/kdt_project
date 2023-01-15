<? session_start(); ?>
<meta charset="utf-8">
<?

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	/*
		새글저장 => post 방식
		$html_ok = 'y'
		$subject = '제목글'
		$content  = '본문글'
	*/

	/*
		글수정 
		get 방식
		$mode= modify //이게 안넘어와도
		$num = 2 //num이 넘어오면 수정되도록 할수도 있다.

		post 방식
		$subject = '제목글'
		$content = '본문글'
	*/

	if(!$userid) { //로그인 안하면, 글쓰기 버튼자체가 노출이 안되므로 없어도 상관없음
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}

	if(!$subject) {
		echo("
	   <script>
	     window.alert('제목을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	if(!$content) {
		echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
	include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

	if ($mode=="modify") //수정글쓰기
	{
    	$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);

		$sql = "update greet set subject='$subject', content='$content' where num=$num";
	}
	else
	{
		if ($html_ok=="y")
		{
			$is_html = "y";
		}
		else
		{
			$is_html = "";
			
		}
		
		// 함수 htmlspecialchars(); - 
		$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);
	 //  "(&quot;) '(&#039;) &(&amp;) <(&lt;) >(&gt;)

		$sql = "insert into greet (id, name, nick, subject, content, regist_day, hit, is_html) ";
		$sql .= "values('$userid', '$username', '$usernick', '$subject', '$content', '$regist_day', 0, '$is_html')";
	}

	mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	mysql_close();                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'list.php?page=$page&scale=$scale';
	   </script>
	";
?>

  

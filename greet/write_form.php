<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
?>

<!DOCTYPE HTML>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>공지사항-글쓰기</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
	 <link rel="stylesheet" href="./css/greet.css">

	 <script src="https://kit.fontawesome.com/7a47db0dc1.js" crossorigin="anonymous"></script>
</head>

<body>
	<? include "../common/sub_header.html" ?>

	<div class="visual">
		<img src="../sub6/common/images/main.jpg" alt="">
		<h3>고객지원</h3>
  	</div>

	<div class="subNav">
		<ul>
		<li><a href="../sub6/sub6_1.html">FAQ</a></li>
		<li>
			<a class="current" href="../greet/list.php">공지사항</a>
		</li>
		<li>
       	 <a href="./sub6_3.html">동아위드</a>
      	</li>
		<li><a href="../sub6/sub6_3.html">문의하기</a></li>
		</ul>
	</div>

  <article id="content">
		<div class="titleArea">
			<div class="lineMap">
				<i class="fa-solid fa-house"></i>
				<span>home</span>&gt;<span>고객지원</span>&gt;<strong>공지사항</strong>
			</div>
			<h2>공지사항</h2>
		</div>
		<div class="contentArea">
			<!-- 본문 콘텐츠 영역 -->
			<p>동아ST의 공지사항을 알려드립니다.</p>
			<div id="col2">        
				<form name="board_form" method="post" action="insert.php?page=<?=$page?>&scale=<?=$scale?>" > 
				<div id="write_form">
					<dl id="write_row1">
						<dt class="col1"> 닉네임 </dt>
						<dd class="col2"><?=$usernick?></dd>
					</dl>
					<!-- <div class="write_line"></div> -->
					<dl id="write_row2">
						<dt class="col1"> 제목   </dt>
						<dd class="col2"><input type="text" name="subject"></dd>
					</dl>
					<!-- <div class="write_line"></div> -->
					<dl id="write_row3">
						<dt class="col1"> 내용   </dt>
						<dd class="col2">
							<!-- html_ok는 checked가 되었을 때만 value 값인 y가 넘어감 -->
							<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
							<textarea rows="15" cols="79" name="content"></textarea>
						</dd>
					</dl>
					<!-- <div class="write_line"></div> -->
				</div>

				<div id="write_button">
					<!-- type = "image" >> submit -->
					<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>
					<button type="submit">완료</button>&nbsp; 
					
				</div>
				</form>

			</div> <!-- end of col2 -->	
		</div>
</article> <!-- end of content -->

<? include "../common/sub_footer.html" ?>
</body>
</html>
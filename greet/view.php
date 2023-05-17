<? 
	session_start(); 

	/*
	 $num = 1  → 게시글 번호
	 $page / $scale
	
	 */


	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  //필드값 변수에 담기
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]); //공백문자를 엔티티로 변경

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1; 

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE HTML>
<html lang="ko">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>공지사항-본문</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
	 <link rel="stylesheet" href="./css/greet.css">

<script src="https://kit.fontawesome.com/7a47db0dc1.js" crossorigin="anonymous"></script>
<script>
    function del(href)  //delete.php?num=1 넘겨줌
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
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
      	  <a href="../free/list.php">동아위드</a>
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
				<!-- content area -->
				<p>동아ST의 공지사항을 알려드립니다.</p>

	<div id="col2">
		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div>
			<div id="view_title2"><?= $item_nick ?><span>/</span><?= $item_date ?><span>/</span>조회 : <?= $item_hit ?></div>	
		</div>

		<div id="view_content">
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	{
?>              
				<!-- 수정버튼 -->
				<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">수정</a>&nbsp;
				<!-- 삭제버튼 - 현재 보고있는 페이지의 db num -->
				<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp; 
<?
	}
?>
<? 
	if($userid )
	{
?>
				<a href="write_form.php?page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
<?
	}
?>
		</div>
	</div> <!-- end of col2 -->
	</div>
  </article> <!-- end of article -->

  <? include "../common/sub_footer.html" ?>
</body>
</html>

<? 
	session_start(); 
?>
<!DOCTYPE HTML>
<html lang="ko">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>고객지원-공지사항</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
	 <link rel="stylesheet" href="./css/greet.css">

	<script src="https://kit.fontawesome.com/7a47db0dc1.js" crossorigin="anonymous"></script>
</head>
<?

   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);

	include "../lib/dbconn.php";

	if(!$scale) $scale=10;			// 한 화면에 표시되는 글 수

	//1. 다 보이는 것 하나 2. 페이지네이션 클릭했을 때 보이는 것 하나 3. 검색을 통해 보이는 것(mode=search)
	
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc"; //최신글이 맨 위에 있기 때문에(내림차순으로 배열)
	}
	else
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>

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
				<!-- mode=search는 get방식으로 -->
				<form name="board_form" method="post" action="list.php?mode=search">
					<div id="list_search">
						<div id="list_search1">총
							<?
							if($total_record==0) {
								echo ("<span>0</span>");
							} else {
								echo("<span>$total_record</span>");
							}
							?>
							 개의 게시물이 있습니다.
						</div>
					</div>
					<div class="list_count"> 
						<label for="scale" class="hidden">리스트개수</label>
						<select id="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
							<option value=''>보기</option>
							<option value='5'>5개씩</option>
							<option value='8'>8개씩</option>
							<option value='10'>10개씩</option>
							<option value='12'>12개씩</option>
						</select>
					</div>
				</form>
				
				

				<div class="clear"></div>

				<div id="list_top_title">
					<ul>
						<li id="list_title1">번호</li>
						<li id="list_title2">제목</li>
						<li id="list_title3">글쓴이</li>
						<li id="list_title4">등록일</li>
						<li id="list_title5">조회</li>
					</ul>
				</div>

				<div id="list_content">
					<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

?>
					<div class="list_item">
						<div class="list_item1">
							<?= $number ?>
						</div>
						<div class="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>">
								<?= $item_subject ?>
							</a></div>
						<div class="list_item3">
							<?= $item_nick ?>
						</div>
						<div class="list_item4">
							<?= $item_date ?>
						</div>
						<div class="list_item5">
							<?= $item_hit ?>
						</div>
					</div>
					<?
   	   $number--;
   }
?>
						<div id="button">
							<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
							<? 
							if($userid) //세션변수 userid값이 들어오면 로그인 
							{
						?>
							<a href="write_form.php?page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
							<?
							}
						?>
						</div>
						<div id="page_button">
						<div id="page_num"> 
							<span class="arrow"><i class="fa-solid fa-chevron-left"></i></span>
							<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<span> $i </span>";
		}
		else
		{ 
			echo "<a href='list.php?page=$i&scale=$scale'> $i </a>"; //페이지 번호랑, 스케일도 같이 넘겨줘야함
		}      
   }
?>
							<span class="arrow"><i class="fa-solid fa-chevron-right"></i></span>
						</div>
					</div> <!-- end of page_button -->

				</div> <!-- end of list content -->

				<div class="clear"></div>
				<div class="searchBox">
					<form name="board_form" method="post" action="list.php?mode=search">
					<div id="list_search3">
						<label for="find" class="hidden">선택</label>
						<select name="find" id="find">
							<option value='subject'>제목</option>
							<option value='content'>내용</option>
							<option value='nick'>별명</option>
							<option value='name'>이름</option>
						</select>
					</div>
					<div id="list_search4">
						<label for="search" class="hidden">검색창</label>
						<input id="search" type="text" name="search">
					</div>
					<!-- 역할은 submit -->
					<div id="list_search5"><button type="submit">검색</button></div>
					</form>
				</div>

			</div> <!-- end of col2 -->
		</div> <!--contentarea 끝-->
	</article>

	<? include "../common/sub_footer.html" ?>
</body>

</html>
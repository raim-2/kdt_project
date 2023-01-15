<? 
	session_start();
	//테이블 2개  
	$table = "free";
	$ripple = "free_ripple";
?>
<!DOCTYPE HTML>
<html lang="ko">
<head> 
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>고객지원-동아위드</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
	 <link rel="stylesheet" href="./css/free.css">

	 <script src="https://kit.fontawesome.com/7a47db0dc1.js" crossorigin="anonymous"></script>
</head>
<?

@extract($_POST);
@extract($_GET);
@extract($_SESSION);

	include "../lib/dbconn.php";
	if(!$scale) $scale=10;
	

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
		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
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
			<a href="../greet/list.php">공지사항</a>
		</li>
		<li>
      	  <a class="current" href="../free/list.php">동아위드</a>
      	</li>
		<li><a href="../sub6/sub6_3.html">문의하기</a></li>
		</ul>
	</div>

  <article id="content">
  <div class="titleArea">
		<div class="lineMap">
			<i class="fa-solid fa-house"></i>
			<span>home</span>&gt;<span>고객지원</span>&gt;<strong>동아위드</strong>
		</div>
		<h2>동아위드</h2>
		</div>
		<div class="contentArea">
			<!-- 본문 콘텐츠 영역 -->
			<p>동아ST의 최신 소식 및 뉴스를 알려드립니다.</p>

	<div id="col2">        
		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
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
							<!-- <option value='5'>5</option> -->
						</select>
					</div>
		</form>
		<!-- <div class="clear"></div>

		<div id="list_top_title">
					<ul>
						<li id="list_title1">번호</li>
						<li id="list_title2">제목</li>
						<li id="list_title3">글쓴이</li>
						<li id="list_title4">등록일</li>
						<li id="list_title5">조회</li>
					</ul>
				</div> -->

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);     // 포인터 이동        
      $row = mysql_fetch_array($result); // 하나의 레코드 가져오기	      
      
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
	  $item_content = $row[content];	
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	  if($row[file_copied_0]){ //file_copied_0에 뭐라도 있으면
		$item_img = './data/'.$row[file_copied_0];
	 } else if($row[file_copied_1]){
		$item_img = './data/'.$row[file_copied_1];
	 } else if($row[file_copied_2]){
		$item_img = './data/'.$row[file_copied_2];
	 } else{
		$item_img = './data/default.jpg';
	 }

	  $sql = "select * from $ripple where parent=$item_num";
	  $result2 = mysql_query($sql, $connect);
	  $num_ripple = mysql_num_rows($result2); //해당 게시글의 댓글

?>
			<div class="list_item">
				<div class="list_img">
					<img src="<?= $item_img ?>" alt="">
				</div>
				<div class="list_text">
					<span class="hidden"><?= $number ?>.</span>
					<p class="list_sub"><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></p>
<?
		if ($num_ripple) //해당 게시글에 댓글이 있다면,
				echo " <span class='list_ripple'>[$num_ripple]</span>";
?>
					<p class="list_con"><?= $item_content?></p>				
					<div class="list_info">
						<p>
							<?= $item_nick ?>
							<span>/</span>
							<?= $item_date ?>
							<span>/</span>
							<span><i class="fa-solid fa-eye"></i></span>
							<?= $item_hit ?>
						</p>
					</div>
				</div>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
			<div id="button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
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
			echo "<a href='list.php?table=$table&page=$i&scale=$scale'> $i </a>";
		}      
   }
?>			
					<span class="arrow"><i class="fa-solid fa-chevron-right"></i></span>
				</div>
				
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
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
</div> <!--contentarea-->
</article> <!-- end of article -->

<? include "../common/sub_footer.html" ?>
</body>
</html>
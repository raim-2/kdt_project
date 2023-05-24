<? 
	session_start(); 
	$table = "concert"; //이부분만 변경해주면 됨(테이블 만든 후 테이블명만 바꿔줌)
	//$type_list = "list"; //board type
	//$type_grid = "grid";
?>
<!DOCTYPE HTML>
<html lang="ko">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>사업분야-제품검색</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub2/common/css/sub2common.css">
	 <link rel="stylesheet" href="./css/concert.css">
	 

	 <script src="https://kit.fontawesome.com/7a47db0dc1.js" crossorigin="anonymous"></script>
	 <script src="../common/js/prefixfree.min.js"></script>
</head>
<?
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../lib/dbconn.php";
	
	if(!$scale)
	$scale=6;	
	
	// 한 화면에 표시되는 글 수

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
    <img src="../sub2/common/images/main.jpg" alt="">
    <h3>사업분야</h3>
  </div>

  <div class="subNav">
    <ul>
      <li><a class="current" href="./list.php">제품검색</a></li>
      <li><a href="../sub2/sub2_2.html">의료기기사업</a></li>
      <li><a href="../sub2/sub2_3.html">진단사업</a></li>
      <li><a href="../sub2/sub2_4.html">해외사업</a></li>
    </ul>
  </div>

  <article id="content">
  <div class="titleArea">
      <div class="lineMap">
        <i class="fa-solid fa-house"></i>
        <span>home</span>&gt;<span>사업분야</span>&gt;<strong>제품검색</strong>
      </div>
      <h2>제품검색</h2>
    </div>
	<div class="contentArea">
      <!-- content area -->
      <p>인류 건강 증진을 위한 동아ST의 혁신적 제품</p>
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
			<ul class="list_count list_style"> 
				<li>
					<button type="button" class="radio_btn btn-list" onclick="location.href='list.php?num=<?=$item_num?>&list_style=list&page=<?=$page?>&scale=<?=$scale?>'">
						<span class="hidden">리스트</span>
						<img src="./images/list.png" alt="리스트 게시판 버튼">
					</button>
				</li>
				<li>
					<button type="button" class="radio_btn btn-grid" onclick="location.href='list.php?num=<?=$item_num?>&list_style=grid&page=<?=$page?>&scale=<?=$scale?>'">
						<span class="hidden">그리드</span>
						<img src="./images/grid.png" alt="그리드 게시판 버튼">
					</button>
				</li>
				<li>
					<label for="scale" class="hidden">리스트개수</label>
					<select id="scale" name="scale" onchange="location.href='list.php?list_style=<?=$list_style?>&scale='+this.value">
						<option value=''>보기</option>
						<option value='6'>6개씩</option>
						<option value='8'>8개씩</option>
						<option value='10'>10개씩</option>
						<option value='12'>12개씩</option>
					</select>
				</li>
			</ul>
		</form>

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
	  //$item_subject = $row[subject];
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

?>
			<!-- 리스트 게시판 -->
			<div class="list_item">
				<div class="list_img">
					<img src="<?= $item_img ?>" alt="<?= $item_subject?>">
				</div>
				<div class="list_text">
					<p class="list_sub">
						<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&list_style=<?=$list_style?>&page=<?=$page?>&scale=<?=$scale?>"><?= $item_subject ?></a>
					</p>
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
					<a href="list.php?table=<?=$table?>&list_style=<?=$list_style?>&scale=<?=$scale?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<!-- 테이블 이름만 넘김 -->
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
			echo "<a href='list.php?list_style=$list_style&page=$i&scale=$scale'> $i </a>";
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
<?
	if (!$list_style){
		$list_style = 'list';	// 리스트 스타일
		echo "
			<script>
				$('.list_style li').removeClass('active');
				$('.list_style li:eq(0)').addClass('active');
			</script>
		";
	} else if($list_style == 'grid'){	// 그리드 스타일
		echo "
			<script>
				$('.list_style li').removeClass('active');
				$('.list_style li:eq(1)').addClass('active');
				$('#list_content, #page_button, #page_num').addClass('grid');
        		$('#list_content .list_item').addClass('grid_item');
			</script>
		";

	}
?>
</body>
</html>

<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	//null값 허용
	//image_name 배열안에 담아둠
	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];

	//image_copied 배열안에 담아둠
	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}

	//첨부된 이미지 가져오기
	for ($i=0; $i<3; $i++) //0,1,2
	{
		if ($image_copied[$i]) //존재 여부는 그냥 변수자체를 넣어주면됨 //첨부된 이미지가 있으면
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			 //배열로 사이즈 리턴([0] 이미지너비, [1] 이미지높이, [2] 이미지타입/종류(jpg..))
			 //왜 사이즈를 가져오나?

			$image_width[$i] = $imageinfo[0]; //이미지너비
			$image_height[$i] = $imageinfo[1]; //이미지높이
			$image_type[$i]  = $imageinfo[2]; //이미지종류

			if ($image_width[$i] > 785) //785를 max-width로 쓰겠다.(이미지 너비 제한)
				$image_width[$i] = 785;
		}
		else //첨부된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
<script>
    function del(href) 
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
		<!-- 본문 콘텐츠 영역 -->
		<p>인류 건강 증진을 위한 동아ST의 혁신적 제품</p>

	<div id="col2">
		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div>
			<div id="view_title2"><?= $item_nick ?><span>/</span><?= $item_date ?><span>/</span><i class="fa-solid fa-eye"></i> : <?= $item_hit ?></div>		
		</div>

		<div id="view_content">
<?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];  //2022_11_21_10_20_15_0.jpg
			$img_name = "./data/".$img_name; // ./data/2022_11_21_10_20_15_0.jpg (경로생성)
			$img_width = $image_width[$i];
			
			
			echo "<img src='$img_name' width='$img_width' alt='$item_subject'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userid=="admin" || $userlevel==1 )
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<!-- 테이블 넘기고 삭제할 넘버값 전달 -->
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp; 
<?
	}
?>
<? 
	if($userid)
	{
?>
				<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
		</div>

	</div> <!-- end of col2 -->
	</div>
</article> <!-- end of content -->

   <? include "../common/sub_footer.html" ?>
</body>
</html>

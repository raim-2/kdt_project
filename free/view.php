<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	
	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);       
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];
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

	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
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
	<title>고객지원-동아위드</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
	 <link rel="stylesheet" href="./css/free.css">

	 <script src="https://kit.fontawesome.com/7a47db0dc1.js" crossorigin="anonymous"></script>
	<script>
	function check_input()
	{
		if (!document.ripple_form.ripple_content.value)
		{
			alert("내용을 입력하세요!");    
			document.ripple_form.ripple_content.focus();
			return false;
		}
		document.ripple_form.submit();
    }
	function login_input()
	{
		if (!document.ripple_form.ripple_content.value)
		{
			alert("로그인 후 작성하세요!");   
			document.location.href="../login/login_form.php" 
			return false;
		}
		document.ripple_form.submit();
    }

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
			<!-- content area -->
			<p>동아ST의 최신 소식 및 뉴스를 알려드립니다.</p>
	
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
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width' alt=''>"."<br><br>";
		}
	}
?>
			<div class="view_txt"><?= $item_content ?></div>
		</div>

		<!-- 댓글 처리 -->
		<div id="ripple"> 
<?
	    $sql = "select * from free_ripple where parent='$item_num'";
	    $ripple_result = mysql_query($sql);

		while ($row_ripple = mysql_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num]; //댓글번호
			$ripple_id      = $row_ripple[id];
			$ripple_nick    = $row_ripple[nick];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]); //댓글
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
?>
			<div id="ripple_writer_title">
			<ul>
			<li id="writer_title1"><?=$ripple_nick?></li>
			<li id="writer_title2"><?=$ripple_date?></li>
			<li id="writer_title3"> 
		      <? 
					if($userid=="admin" || $userid==$ripple_id) //로그인아이디와 댓글아이디가 같으면 삭제버튼 노출
			          echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>
					  <i class='fa-solid fa-trash-can'></i></a>"; 
			  ?>
			</li>
			</ul>
			</div>
			<div id="ripple_content"><?=$ripple_content?></div>
			<div class="hor_line_ripple"></div>
<?
		}
?>			
			<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">  
			<div id="ripple_box">
				<div><?=$usernick?></div>
				<div id="ripple_box1">
					<label for="ripple_input" class="hidden">댓글 입력창</label>
					<?
					if($userid) {
						?>
						<textarea rows="5" cols="65" name="ripple_content" id="ripple_input"></textarea>
						</div>
						<div id="ripple_box2">
							<a href="#" onclick="check_input()">댓글쓰기</a>
						</div>
						<?
					} else {
					?>
						<textarea rows="5" cols="65" name="ripple_content" id="ripple_input" placeholder="로그인 후 작성해주세요." readonly></textarea>
						</div>
						<div id="ripple_box2">
							<a href="#" onclick="login_input()">댓글쓰기</a>
						</div>
						<?
					}
					?>
			</div>
			</form>
		</div> <!-- end of ripple -->

		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid && ($userid==$item_id))
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
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
		<div class="clear"></div>

	</div> <!-- end of col2 -->
	</div> <!--contentarea-->
</article> <!-- end of article -->

<? include "../common/sub_footer.html" ?>
</body>
</html>

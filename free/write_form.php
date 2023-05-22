<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
	include "../lib/dbconn.php";

	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);
		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];
		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요1");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
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
<?
	if($mode=="modify")
	{
?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
					<dl id="write_row1">
						<dt class="col1"> 별명 </dt>
						<dd class="col2"><?=$usernick?></dd>					
					</dl>
					<dl id="write_row2">
						<dt class="col1"> 제목   </dt>
						<dd class="col2">
							<input type="text" name="subject" value="<?=$item_subject?>" >
						</dd>
					</dl>
					<dl id="write_row3">
						<dt class="col1"> 내용   </dt>
						<dd class="col2">
<?
	if( $userid && ($mode != "modify"))
	{
?>
				<div class="col3">
					<input type="checkbox" name="html_ok" value="y">
					HTML 쓰기</div>
<?
	}
?>			
				<textarea rows="15" cols="79" name="content"><?=$item_content?></textarea>
				</dd>
			</dl>
			<dl id="write_row4">
				<dt class="col1"> 이미지파일1   </dt>
				<dd class="col2">
					<input type="file" name="upfile[]">
<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. 
				<input type="checkbox" name="del_file[]" value="0"> 삭제
				<!-- 배열로 처리 -->
			</div> 
<?
	}
?>
			</dd> 
				<!-- 배열로 처리, for문 돌리려고 -->
			</dl>

			<dl id="write_row5">
				<dt class="col1"> 이미지파일2  </dt>
				<dd class="col2">
					<input type="file" name="upfile[]">
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
		<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. 
				<input type="checkbox" name="del_file[]" value="1"> 삭제</div>
<?
	}
?>
				</dd>
			</dl>

			<dl id="write_row6">
				<dt class="col1"> 이미지파일3   </dt>
				<dd class="col2">
					<input type="file" name="upfile[]">
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. 
			<input type="checkbox" name="del_file[]" value="2"> 삭제</div>
<?
	}
?>
				</dd>
			</dl>
		</div>

		<div id="write_button">
		<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
			<a href="#" onclick="check_input()">완료</a>
		</div>

		</form>

		</div> <!-- end of col2 -->
	</div> <!--contentarea-->
</article> <!-- end of article -->

<? include "../common/sub_footer.html" ?>

</body>
</html>

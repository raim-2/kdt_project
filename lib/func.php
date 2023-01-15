<?
   function latest_article($table, $loop, $char_limit, $char_limit2)    //테이블명, 게시물 개수, 문자개수, 컨텐츠개수
   {
		include "./lib/dbconn.php";    //디비열결//얘를 여는 index 기준으로 처리

		$sql = "select * from $table order by num desc limit $loop";  
                                        // $table 테이블에서 num필드를 기준으로 $loop 개수 만큼만  내림차순 정렬 
		$result = mysql_query($sql, $connect); // 검색 쿼리 적용

		while ($row = mysql_fetch_array($result))   //읽어드린 레코드 만큼..
		{
			$num = $row[num];    // 번호를 저장
			$len_subject = strlen($row[subject]);  // 제목의 길이를 구한다.
			$subject = $row[subject];    // 제목을 저장한다\
			$content  = $row[content];
			$len_content  = strlen($row[content]);
		

			if ($len_subject > $char_limit)   //제목의 길이가 지정한 길이보다 크면
			{
				$subject = mb_substr($row[subject], 0, $char_limit, 'utf-8');   // 첫번째 문자부터 $char_limit만큼 잘라낸다.
                                                  //mb_substr 은 입력받은 문자열을 정해진 길이만큼 잘라서 리턴하는데 
                                                  //2byte 문자인 한글에 대해서도 처리가 가능한 함수입니다. 

				$subject = $subject."...";   // 잘라낸 문자열에 ...을 추가한다.
			}
			if ($len_content > $char_limit2)   //제목의 길이가 지정한 길이보다 크면
			{
				$content = mb_substr($row[content], 0, $char_limit2, 'utf-8');   // 첫번째 문자부터 $char_limit만큼 잘라낸다.
                                                  //mb_substr 은 입력받은 문자열을 정해진 길이만큼 잘라서 리턴하는데 
                                                  //2byte 문자인 한글에 대해서도 처리가 가능한 함수입니다. 

				$content = $content."...";   // 잘라낸 문자열에 ...을 추가한다.
			}

			$regist_day = substr($row[regist_day], 0, 10);  // 2015-04-29 날짜만 잘라내서 저장한다.
?>
			<li>
			<?
			echo"	<a href='./$table/view.php?table=$table&num=$num'> ";
				?>
<?
			if($table=='free') {
				$file_copied_0 = $row[file_copied_0];

				if($file_copied_0) {
					echo "
						<img class='newsImg' src='./$table/data/$file_copied_0' alt='$subject 바로가기'>
					";
				} else {
					echo "
						<img class='newsImg' src='./$table/data/default.jpg' alt='기본 이미지'>
					";
				}
			}
			
			echo "     
						<dl class='col1'>
							<dt>
								$subject
							</dt>
							<dd>
								$content
								<span>$regist_day</span>
							</dd>
						</dl>
					</a>
				</li>
			";
		}
		mysql_close();  
   }
?>
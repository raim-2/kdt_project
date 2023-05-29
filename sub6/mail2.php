<meta charset="UTF-8">

<?php

 $name_01=$_POST['name'];
 $mail_02=$_POST['email'];
 $phone_03=$_POST['tel'];
 $type_04=$_POST['type'];
 $msg_05=$_POST['message'];
 $file_06=$_FILES['file']; //전달될 때 이진형태로 전달
 $agree_07=$_POST['agree'];

 $file_name=$_FILES['file']['name'];
 $file_size=$_FILES['file']['size'];
 $file_type=$_FILES['file']['type'];
 $file_tmp=$_FILES['file']['tmp_name']; //임시명 - 임시경로(서버 저장전)

// 파일 첨부가 없는 경우 기본 MIME 유형을 설정
if (empty($file_type)) {
    $file_type = "application/octet-stream";
}

 // 이미지 파일을 이동시킬 경로 - data 파일에 이미지 저장됨
 $target_path = './data/'.$file_name;
 // move_uploaded_file(임시경로,목적지)- 임시경로 사용은 보안을 위해
 move_uploaded_file($file_tmp, $target_path); 

 // 이미지를 base64로 인코딩 -> 줄바꿈처리
 $encoded_image = chunk_split(base64_encode(file_get_contents($target_path)));
 //$image_tag = '<img src="data:'. $file_type .';base64,'. $encoded_image .'" alt="첨부파일 이미지">';

 $to='earnestga@naver.com'; //master mail
 $subject='동아ST사이트에서 관리자에게 보낸 메일';
 $msg="보낸사람:$name_01<br>".
     "보낸사람 메일주소:$mail_02<br>".
     "보낸사람 전화번호:$phone_03<br>".
     "문의유형:$type_04<br>".
     "내용:$msg_05<br>".
     "개인정보 수집 및 이용동의:$agree_07<br>";

$attach_msg="<hr>첨부파일 이름:$file_name<br>".
        "첨부파일 크기:$file_size<br>".
        "첨부파일 타입:$file_type<br>";

$boundary = md5(uniqid(microtime()));

if (!empty($file_tmp)) {
   $headers = "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

   $bodytext = "--$boundary\r\n"; // 구분선
   $bodytext .= "Content-Type: text/html; charset=UTF-8\r\n";
   $bodytext .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
   $bodytext .= $msg . "\r\n\r\n";
   $bodytext .= $attach_msg . "\r\n\r\n";
   $bodytext .= "--$boundary\r\n";
   $bodytext .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
   $bodytext .= "Content-Transfer-Encoding: base64\r\n";
   $bodytext .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n\r\n";  //첨부파일 형태로 보여준다.
   $bodytext .=  $encoded_image . "\r\n";
   $bodytext .= "--$boundary--";

   //$bodytext .= "Content-Type: text/html; charset=UTF-8\r\n";
   //$bodytext .= "Content-Transfer-Encoding: 8bit\r\n\r\n"; // 이거까지 있어야 html형태로 전달해줌
   // $bodytext .= "Content-Transfer-Encoding: base64\r\n"; // html 형식으로 작성해서 얘로 작성하면, 이미지가 안뜸(메일은 옴)
   // $bodytext .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n\r\n"; //html형태로 작성했다는 것과 같이 쓰면 오류 - 메일안옴
   //$bodytext .=  $image_tag . "\r\n";
   //$bodytext .= "--$boundary--";
} else {
   $headers = "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
   $headers .= "Content-Transfer-Encoding: 8bit\r\n\r\n";

   $bodytext = $msg;
}

 mail($to, $subject, $bodytext, $headers, $mail_02);   
// var_dump($target_path); //./data/email.png
// var_dump($file_tmp); // tmp/php8fhfWG
// var_dump($encoded_image); // base64 인코딩
// var_dump($image_tag); //html

echo "<script>
        alert('성공적으로 메일이 전송되었습니다.');
        //history.go(-1);
        location.href='./sub6_3.html' ;
</script>
"
?>




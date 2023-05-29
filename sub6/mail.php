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
if ($file_type == "") {
    $file_type = 'application/octet-stream';
};

//별도로 data 파일에 이미지 저장 안됨
$filename = basename($file_name);
$fp = fopen($file_tmp, "r"); // 임시 경로($file_tmp)를 사용합니다.
$file = fread($fp, $file_size);
fclose($fp);

$attach = chunk_split(base64_encode($file));

 // 이미지 파일을 이동시킬 경로
 //$target_path = './data/'.$file_name;
 // move_uploaded_file(임시경로,목적지)- 임시경로 사용은 보안을 위해
 //move_uploaded_file($file_tmp, $target_path); 

 // 이미지를 base64로 인코딩
//$file_path = base64_encode(file_get_contents($file_path));
$image_tag = "<img src=\"data:$file_type;base64,$attach\" alt=\"첨부파일 이미지\" style=\"width: 100%;\">";

 $to='earnestga@naver.com'; //master mail
 $subject='동아ST사이트에서 관리자에게 보낸 메일';
 $msg="<br>보낸사람: $name_01<br>".
     "보낸사람 메일주소: $mail_02<br>".
     "보낸사람 전화번호: $phone_03<br>".
     "문의유형: $type_04<br>".
     "내용: $msg_05<br>".
     "개인정보 수집 및 이용동의: $agree_07<br>";

$attach_msg="<hr>첨부파일 이름: {$file_name}<br>".
        "첨부파일 크기: {$file_size}<br>".
        "첨부파일 타입: {$file_type}<br>".
        "첨부파일 이미지:";

$boundary = md5(uniqid(microtime()));

if ($file_tmp == "") {
   $headers = "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
   $headers .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
   $headers .= "From: $mail_02" . "\r\n";

   $bodytext = $msg;
} else {
   $headers = "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
   $headers .= "From: $mail_02" . "\r\n";

   $bodytext = "--$boundary\r\n";
   $bodytext .= "Content-Type: text/html; charset=UTF-8\r\n";
   $bodytext .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
   $bodytext .= $msg . "\r\n\r\n";
   $bodytext .= $attach_msg . "\r\n\r\n";
   $bodytext .= "<div class=\"attach\" style=\"width:30%; height: auto; margin-top: 30px;\">$image_tag</div>" . "\r\n";
   $bodytext .= "--$boundary--";
};

mail($to, $subject, $bodytext, $headers);   

// if ($result) {
//     echo "<script>
//         alert('성공적으로 메일이 전송되었습니다.');
//         location.href='./sub6_3.html' ;
//     </script>";
// } else {
//     $error_message = error_get_last()['message'];
//     error_log("메일 전송 오류: " . $error_message);
//     echo "<script>
//         alert('메일 전송 중 오류가 발생했습니다.');
//         location.href='./sub6_3.html' ;
//         </script>";
// }

echo "<script>
        alert('성공적으로 메일이 전송되었습니다.');
        //history.go(-1);
        location.href='./sub6_3.html' ;
</script>
";
?>

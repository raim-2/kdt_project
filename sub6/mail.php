<meta charset="UTF-8">

<?php
 
 $name_01=$_POST['name'];
 $mail_02=$_POST['email'];
 $phone_03=$_POST['tel'];
 $type_04=$_POST['type'];
 $msg_05=$_POST['message'];
 $file_06=$_FILES['file'];
 $agree_07=$_POST['agree'];
 
 $to='earnestga@naver.com'; //master mail
 $subject='동아ST사이트에서 관리자에게 보낸 메일';
 $msg="보낸사람:$name_01\n".
      "보낸사람메일주소:$mail_02\n".
      "보낸사람전화번호:$phone_03\n".
      "문의유형:$type_04\n".
      "내용:$msg_05\n".
      "첨부파일:$file_06\n".
      "개인정보 수집 및 이용동의:$agree_07";
      
 
 mail($to,$subject,$msg,'보낸사람메일주소:'.$mail_02);   

echo "<script>
        alert('성공적으로 메일이 전송되었습니다.');
        //history.go(-1);
        location.href='../index.html' ;
</script>
"
 

 /*
 echo '이름:'.$name_01.'<br />';
 echo '메일:'.$mail_02.'<br />';
 echo '메일:'.$phone_03.'<br />';
 echo '내용:'.$msg_04.'<br />';
 echo '메일이 성공적으로 전송되었습니다<br />';
 */
?>




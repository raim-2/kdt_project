<meta charset="utf-8">
<?
   
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);

    $pass = $_POST['pass'];
    $pass_confirm = $_POST['pass_confirm'];
   

    if(!$pass_confirm) 
   {
      echo("비밀번호를 한 번 더 입력하세요.");
      exit;
   };


    if($pass != $pass_confirm) {
             echo "<span style='color:red'>비밀번호가 일치하지 않습니다.</span>";
             exit;
      }
      else 
      {
        echo "<span style='color:green'>비밀번호가 일치합니다.</span>";
            exit;
      }



?>

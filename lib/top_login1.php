    <div id="logo"><a href="index.php"><img src="./img/logo.gif" border="0"></a></div>
	<div id="moto"><img src="./img/moto.gif"></div>
	<div id="top_login">
<?
  @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 

  //$userid = $_SESSION['userid'] 정규

    if(!$userid) //세션변수가 아니면,
	{
?>
          <a href="./login/login_form.php">로그인</a> | <a href="./member/member_form.php">회원가입</a>
<?
	}
	else
	{
?>
		<?=$usernick?> (level:<?=$userlevel?>) | 
		<a href="./login/logout.php">로그아웃</a> | <a href="./login/member_form_modify.php">정보수정</a>
<?
	}
?>
	 </div>

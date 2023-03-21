<?php
	include "session.php";
	session_destroy();
?>
<script>
	alert("[로그아웃]\n로그인 창으로 이동할까요?");
	document.location.href='login.php'
</script>
<?php
	session_start();
	include "login_head.php";
?>
<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>
<head>
    <title>회원 메뉴</title>
</head>
	<body>
	<div id="wrap">
       <center>
        <table>
			<tr class="buttonset">
				<td align=center>
					<a href="customer_info.php"><input type="button" value=" 회원정보 " /></a>&emsp;
					<a href="purchase_front.php"><input type="button" value="구매" /></a>
				</td>
			</tr>
		</table>
       </center>
        </div>
	</body>
</html>
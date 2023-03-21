<?php
	include "connect_db.php";	
?>
<body>
<div style="background-color:#eee;">
<table border='0' cellpadding='10'>
	<tr>
<?php
		echo "<td>&emsp;&emsp;회원 아이디 : {$_SESSION['CUS_ID']}</td>";
		echo "<td>&emsp;&emsp;회원 권한 : {$_SESSION['CUS_DIV']}</td>";	

		if($_SESSION['CUS_DIV'] == 'user' or $_SESSION['CUS_DIV'] == 'VIP')
		{
			echo "<td>&emsp;&emsp;구매 총액 : {$_SESSION['PURCH_TOTAL']}</td>";
		}
		echo '<td>&emsp;&emsp;<a href="logout.php"><input type="button" value="로그아웃" /></a></td>';
?>
	</tr>
</table>
<?php
	echo "<hr>";
?>
</div>
</body>
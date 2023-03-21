<html>
<body>
<?php
	include "session.php";
	include "login_head.php";

	echo "<br><h2><center> 로그인 성공 </center> </h2><hr>";
	echo "<br><h4><center> 메뉴를 선택하세요 </center> </h4>";

	if($_SESSION['CUS_DIV'] == 'admin')
	{
		echo "<center>";
		echo "<form enctype='multipart/form-data' method='post' action= 'Admin_Menu.php'>";
		echo "<table border=0 width=800>";
		echo "<tr>";
		echo "<td align=center>";
		echo '<a href="Admin_Menu.php"><input type="button" value="어드민 메뉴" /></a>';
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</form>";
	}

	elseif($_SESSION['CUS_DIV'] == 'user' OR $_SESSION['CUS_DIV'] == 'VIP')
	{
		echo "<center>";
		echo "<table border=0 width=800>";
		echo "<tr>";
		echo "<td align=center>";
		echo '<a href="Customer_Menu.php"><input type="button" value="고객 메뉴" /></a>';
		echo "</td>";
		echo "</tr>";
		echo "</table>";
	}
	else
	{
		echo "<center>";
		echo "<table border=0 width=800>";
		echo "<tr>";
		echo "<td align=center>";
		echo '<a href="Provider_Menu.php"><input type="button" value="공급자 메뉴" /></a>';
		echo "</td>";
		echo "</tr>";
		echo "</table>";
	}
	
	mysqli_close($connect);
?>
	</body>
</html>

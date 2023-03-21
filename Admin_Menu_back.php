<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>
<head>
    <title> 발주 목록</title>
</head>
<body>
    <div id="wrap">
        <center>
            <br><br><br>
            <h2>
                <center> 발주 목록 </center>
            </h2>
            <?php			
		
$PROD_ID = $_POST['PROD_ID'];
$PROD_COST = $_POST['PROD_COST'];
$ORDER_AMOUNT = $_POST['ORDER_AMOUNT'];
$PROV_ID = $_POST['PROV_ID'];
			$connect = mysqli_connect ('localhost', 'root', '5953', 'case_shop');
			
			mysqli_query($connect, "set session character_set_connection=utf8;");
			mysqli_query($connect, "set session character_set_results=utf8;");
			mysqli_query($connect, "set session character_set_client=utf8;");

			$today = date("Ymd");
		
			$sql = "INSERT INTO provide VALUES";
			$sql = $sql."('{$PROD_ID}', {$PROV_ID}, {$ORDER_AMOUNT}, '{$PROD_COST}', 0,'{$today}')";
			$result = mysqli_query($connect, $sql);
			
			$sql = "SELECT * FROM provide where PROV_DATE = 0";
			$result = mysqli_query ($connect, $sql);
			$count = mysqli_num_fields ($result);
		?>
            <table class="table">
                <tr class="tr1">
                    <td><B> 제품 ID </B></td>
                    <td><B> 공급자 ID </B></td>
                    <td><B> 발주량 </B></td>
                    <td><B> 공급 단가 </B></td>
                    <td><B> 공급 일자 </B></td>
                    <td><B> 발주 신청 일자 </B></td>
                </tr>

                <?php
				while ($rows=mysqli_fetch_row($result))
				{
					echo "<tr>";
					for ($a = 0; $a < $count; $a++)
					{
						echo "<td align='center'> $rows[$a] </td>";
					}
					echo "</tr>";
				}
			?>
                <?php
				echo "<center>";
				echo '<form enctype="multipart/form-data" method="post" action= "Admin_Menu.php">';
				echo "<table border=0 width=800>";
				echo "<tr>";
				echo "<td align=center>";
				echo '<a href="Admin_Menu.php"><input type="button" value=" 어드민 메뉴 " /></a>';
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "</form>";
			?>
            </table>
            <?php
			mysqli_close($connect);
		?>
        </center>
    </div>
</body></html>
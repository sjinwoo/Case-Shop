
<?php
	session_start();
	include "login_head.php";
?>
<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<head>
    <title> 회원 정보 </title>
</head>

<body>
    <div id="wrap">
        <br>
        <h2>
            <center> 회원 정보 </center>
        </h2>

        <center>
            <?php
			
			mysqli_query($connect, "set session character_set_connection=utf8;");
			mysqli_query($connect, "set session character_set_results=utf8;");
			mysqli_query($connect, "set session character_set_client=utf8;");
			
			
			$sql = "select *from customer where CUS_ID = '{$_SESSION['CUS_ID']}'";
			$result = mysqli_query ($connect, $sql);
			$count = mysqli_num_fields ($result);
		?>

            <table class="table">
                <tr class="tr1">
                    <td><B> 회원ID </B></td>
                    <td><B> 비밀번호 </B></td>
                    <td><B> 이름 </B></td>
                    <td><B> 성별 </B></td>
                    <td><B> 생년월일 </B></td>
                    <td><B> 주소 </B></td>
                    <td><B> 전화번호 </B></td>
                    <td><B> 등급 </B></td>
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
            </table>

            <br><br><br>
            <h2>
                <center> 구매 내역 </center>
            </h2>

            <?php
			$sql = "select purchaselist.* from purchase, purchaselist where purchase.PURCH_NUM = purchaselist.PURCH_NUM and purchase.CUS_ID = '{$_SESSION['CUS_ID']}' order by abs(purchaselist.PURCH_NUM)";
			$result = mysqli_query ($connect, $sql);
			$count = mysqli_num_fields ($result);
			
		?>
            <table class = "table">
                <tr class = "tr1">
                    <td><B> 구매번호 </B></td>

                    <td><B> 제품 ID </B></td>
                    <td><B> 구매한수량 </B></td>
                    <td><B> 구매총액 </B></td>
                    <td><B> 배송지 정보 </B></td>
                    <td><B> 평가 </B></td>
                </tr>

                <?php
				while ($rows=mysqli_fetch_row($result))
				{
					echo "<tr>";
					$temp = abs($rows[0]);
					echo "<td align='center'> $temp </td>";

					for ($a = 2; $a < $count; $a++)
					{
						echo "<td align='center'> $rows[$a] </td>";
					}
					echo "<td align='center'>";
					
					echo '<form enctype="multipart/form-data" method="post" action= "review_front.php">';
					if($rows[0] > 0)
					{
						echo "<input type='hidden' name='PURCH_NUM' value= {$temp}>";
						echo "<input type='hidden' name='PROD_ID' value= {$rows[2]}>";
						echo "<input type='submit' value='리뷰 등록 '>";
					}
					else
					{
						echo "평가완료";
					}
					
				}
			?>
            </table>
            <table>
                <tr class="buttonset">
                    <td>
                        <a href="customer_menu.php"><input type="button" value=" 회원메뉴 로 돌아가기" /></a>
                    </td>
                </tr>
            </table>
            <?php
			mysqli_close($connect);
		?>
        </center>
    </div>
</body>

</html>

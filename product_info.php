<?php
	session_start();
	include "login_head.php";
?>
<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<head>
    <title> 제품 상세 정보 </title>
</head>

<body>
    <div id="wrap">
        <center>
            <br>
            <h2>
                <center> 제품 상세 정보 </center>
            </h2>
            <hr>
            <?php
			mysqli_query($connect, "set session character_set_connection=utf8;");
			mysqli_query($connect, "set session character_set_results=utf8;");
			mysqli_query($connect, "set session character_set_client=utf8;");
		?>
            <form enctype="multipart/form-data" method="post" action="product_purchase.php">
                <table class="table">
                    <tr class="tr1">
                        <td><B> 상품 ID </B></td>
                        <td><B> 카테고리 </B></td>
                        <td><B> 상품명 </B></td>
                        <td><B> 색상 </B></td>
                        <td><B> 기종 </B></td>
                        <td><B> 재고량 </B></td>
                        <td><B> 가격 </B></td>
                    </tr>

                    <?php				
				$sql = "select * from product where PROD_ID = '{$_POST['PROD_ID']}'";
				$result = mysqli_query ($connect, $sql);
				$count = mysqli_num_fields ($result); 
				while ($rows=mysqli_fetch_row($result))
				{
					echo "<tr>";
					for ($a = 0; $a < $count; $a++)
					{
						if($a == 3)
						{
							echo "<td align='center' bgcolor='{$rows[3]}' width=20></td>";
						}
						else
						{
							echo "<td align='center'> $rows[$a] </td>";
						}
					}
					$max = $rows[5];
					if($rows[5] == 0)
					{
						echo "<h3 style='color:red;'><B>품절된 상품입니다.</B></h3>";
					}
					else
					{
						echo "<input type='number' min=1 max=$max name='PURCH_AMOUNT'>";
						echo "<input type='hidden' name='PROD_ID' value= '$rows[0]'>";
						echo "<input type='submit' value='구매'>";
					}
					echo "</td>";
					echo "</tr>";
				}
			?>
                </table>
            </form>
            <br>
            <h2>
                <center> 고객 리뷰 </center>
            </h2>
            <hr>

            <table class="table">
                <tr class="tr1">
                    <td><B> 별점 </B></td>
                </tr>
                <?php				
				$sql = "select avg(PROD_GRADE) from evaluate where PROD_ID = '{$_POST['PROD_ID']}'";
				$result = mysqli_query ($connect, $sql);
				$count = mysqli_num_fields ($result); 
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
            <table class="table">
                <tr class="tr1">
                    <td><B> 회원 ID </B></td>
                    <td><B> 상품 만족도 </B></td>
                    <td><B> 리뷰 </B></td>
                </tr>

                <?php				
				$sql = "select CUS_ID, PROD_GRADE, REVIEW from evaluate where PROD_ID = '{$_POST['PROD_ID']}'";
				$result = mysqli_query ($connect, $sql);
				$count = mysqli_num_fields ($result); 
				while ($rows=mysqli_fetch_row($result))
				{
					echo "<tr class = 'trline'>";
					for ($a = 0; $a < $count; $a++)
					{
						echo "<td align='center'> $rows[$a] </td>";
					}
					echo "</tr>";
				}
			?>
            </table>
            <table>
                <tr class="buttonset">
                    <td><a href="customer_menu.php"><input type="button" value=" 회원메뉴로 돌아가기 " /></a></td>
                </tr>
                <tr class="buttonset">
                    <td><a href="purchase_front.php"><input type="button" value="구매로 돌아가기" /></a></td>
                </tr>
                <?php
			mysqli_close($connect);
		?>
            </table>
        </center>
    </div>
</body>

</html>

<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>
<?php
	$connect = mysqli_connect ('localhost', 'root', '5953', 'case_shop');
	$today = date("Ymd");

	$sql = "INSERT INTO product VALUES";
	$sql = $sql."('{$_POST['PROD_ID']}', '{$_POST['PROD_NAME']}', '{$_POST['PROD_DEVICE']}', '{$_POST['PROD_COLOR']}','{$_POST['PROD_PATTERN']}','{$_POST['PROD_STOCK']}', '{$_POST['PROD_COST']}')";
	$result = mysqli_query($connect, $sql);
	
	
	// $sql = "INSERT INTO provide VALUES";
	// $sql = $sql."('{$_POST['PROD_ID']}', '{$_POST['PROV_ID']}', '{$_POST['ORDER_AMOUNT']}', '{$_POST['ORDER_PROD_COST']}','{$today}','')";
	// $result = mysqli_query($connect, $sql);
	
	mysqli_close($connect);

?>
<head>
    <title> 판매 물품 등록</title>
</head>

<body>
  <div id="wrap">
    <br>
    <h2>
        <center> 판매 물품 등록 화면 </center>
    </h2>
    <center>

        <table border=0 bordercolor="blue" width=700 cellspacing=l cellpadding=5>

            <tr>
                <td width=300 align=right> 제품ID : </td>
                <td width=300>
                    <?php	
					echo "<B>{$_POST['PROD_ID']} </B><br>";
				?>
                </td>

                <td width=200 align=right> 호환 기기 : </td>
                <td width=300>
                    <?php	
					echo "<B>{$_POST['PROD_DEVICE']} </B><br>";
				?>
                </td>
            </tr>

            <tr>
                <td align=right> 제품명 : </td>
                <td>
                    <?php	
					echo "<B>{$_POST['PROD_NAME']} </B><br>";
				?>
                </td>

                <td align=right> 컬러 : </td>
                <td>
                    <?php	
					echo "<B>{$_POST['PROD_COLOR']} </B><br>";
				?>
                </td>
            </tr>

            <tr>
                <td align=right> 패턴 : </td>
                <td>
                    <?php	
					echo "<B>{$_POST['PROD_PATTERN']} </B><br>";
				?>
                </td>

                <td align=right> 재고량 : </td>
                <td>
                    <?php	
					echo "<B>{$_POST['PROD_STOCK']} </B><br>";
				?>
                </td>
            </tr>

            <tr>
                <td align=right> 가격 : </td>
                <td>
                    <?php	
					echo "<B>{$_POST['PROD_COST']} </B><br>";
				?>
                </td>
                <td align=right> 공급자 ID : </td>
                <td>
                    <?php	
					echo "<B>{$_POST['PROV_ID']} </B><br>";
				?>
                </td>
            </tr>

        </table>
        <table>
            <tr class="buttonset">
                <td><a href="Provider_menu.php"><input type="button" value="  공급자 메뉴로 돌아가기 " /></a></td>
            </tr>
        </table>

    </center>
    </div>
</body></html>
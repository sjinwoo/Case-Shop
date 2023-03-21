<?php
	session_start();
	include "login_head.php";
?>
<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<head>
    <title> 제품 구매 완료 </title>
</head>

	<body>
	<div id="wrap">
		<center>
		<br><h2><center> 제품 구매완료 화면 </center> </h2>
		<?php
			mysqli_query($connect, "set session character_set_connection=utf8;");
			mysqli_query($connect, "set session character_set_results=utf8;");
			mysqli_query($connect, "set session character_set_client=utf8;");
			
			$sql1 = "select PURCH_NUM from purchaselist order by abs(PURCH_NUM)";
			$result1 = mysqli_query($connect, $sql1);
			$count1 = mysqli_num_fields($result1);
			$PURCH_NUM = 1;
			while($rows1 = mysqli_fetch_row($result1))
			{
				$a = $count1 - 1;
				$rows1[$a] = $PURCH_NUM;
				$PURCH_NUM = $PURCH_NUM +  + 1;
			}
			
			$sql2 = "select PROD_COST from product where PROD_ID = '{$_POST['PROD_ID']}'";
			$result2 = mysqli_query($connect, $sql2);
			$rows2 = mysqli_fetch_row($result2);
			$total_cost = $rows2[0] * $_POST['PURCH_AMOUNT'];

			$sql3 = "select CUS_ADDR from customer where CUS_ID = '{$_SESSION['CUS_ID']}'";
			$result3 = mysqli_query($connect, $sql3);
			$rows3 = mysqli_fetch_row($result3);
			$deli_info = $rows3[0];
			

			$sql = "INSERT INTO purchaselist VALUES";
			$sql = $sql."('{$PURCH_NUM}', '{$_SESSION['CUS_ID']}','{$_POST['PROD_ID']}', '{$_POST['PURCH_AMOUNT']}', '{$total_cost}','{$deli_info}')";
			$result = mysqli_query($connect, $sql);
			
			if($result)
			{
				$sql4 = "select PROD_STOCK from product where PROD_ID = '{$_POST['PROD_ID']}'";
				$result4 = mysqli_query($connect, $sql4);
				$rows4 = mysqli_fetch_row($result4);
				$stock = $rows4[0] - $_POST['PURCH_AMOUNT'];
				$sql5 = "update product set PROD_STOCK = {$stock} where PROD_ID = '{$_POST['PROD_ID']}'";
				$result5 = mysqli_query($connect, $sql5);

				$sql6 = "insert into purchase values";
				$sql6 = $sql6."('{$_POST['PROD_ID']}', '{$_SESSION['CUS_ID']}', '{$PURCH_NUM}')";
				$result6 = mysqli_query($connect, $sql6);
				
				$sql7 = "select sum(purchaselist.PURCH_TOTAL) from purchase, purchaselist where purchase.PURCH_NUM = purchaselist.PURCH_NUM and purchase.CUS_ID = '{$_SESSION['CUS_ID']}' order by abs(purchaselist.PURCH_NUM)";
				$result7 = mysqli_query($connect, $sql7);
				$rows7 = mysqli_fetch_row($result7);
				$_SESSION['PURCH_TOTAL'] = $rows7[0];
				if($rows7[0] > 100000)
				{
					$_SESSION['CUS_DIV'] = 'VIP';
				}
				$sql8 = "update customer set CUS_DIV = '{$_SESSION['CUS_DIV']}' where CUS_ID = '{$_SESSION['CUS_ID']}'";
				$result8 = mysqli_query($connect, $sql8);
				$_SESSION['PURCH_TOTAL'] = $rows7[0];
			}

			mysqli_close($connect);
		?>
		<table>
		    <tr class="buttonset">
		        <td><a href="customer_menu.php"><input type="button" value=" 회원메뉴로 돌아가기" /></a></td>
		    </tr>
		    <tr class="buttonset">
		        <td><a href="purchase_front.php"><input type="button" value="계속 구매하기" /></a></td>
		    </tr>
		</table>
		
		
		</center>
        </div>
	</body>
</html>
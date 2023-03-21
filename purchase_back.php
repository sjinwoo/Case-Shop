<?php
	session_start();
	include "login_head.php";
?>
<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<head>
    <title>상품 구매</title>
</head>
<body>
    <div id="wrap">
        <center>
            <br>
            <h2>
                <center> 상품 구매 화면 </center>
            </h2>
            <hr>
            <?php
			mysqli_query($connect, "set session character_set_connection=utf8;");
			mysqli_query($connect, "set session character_set_results=utf8;");
			mysqli_query($connect, "set session character_set_client=utf8;");
			
			if($_POST['CATEGORY'] == 'all')
			{
				$sql = "select ProdNAME from product";
			}
			else
			{
				$sql = "select ProdNAME from product where CATEGORY = '{$_POST['CATEGORY']}'";
			}
			$result = mysqli_query ($connect, $sql);
			$count = mysqli_num_fields ($result);
			
		?>
            <table class='table'>
                <tr class="tr1">
                    <td><B> 상품명 </B></td>
                    <td><B> 카테고리 </B></td>
                    <td><B> 가격 </B></td>
                    <td><B> 별점 </B></td>
                    <td><B> 구매 </B></td>
                    <td><B> 공급자 별점 </B></td>
                </tr>

                <?php				
				if($_POST['CATEGORY'] == 'all')
				{
					$sql = "select ProdID, ProdNAME, CATEGORY, Cost from product";
				}
				else
				{
					$sql = "select ProdID, ProdNAME, CATEGORY, Cost from product where CATEGORY = '{$_POST['CATEGORY']}'";
				}	
				$result = mysqli_query ($connect, $sql);
				$count = mysqli_num_fields ($result); 
				while ($rows=mysqli_fetch_row($result))
				{
					echo "<tr>";
					for ($a = 1; $a < $count; $a++)
					{
						echo "<td align='center'> $rows[$a] </td>";
					}
					if($_POST['CATEGORY'] == 'all')
					{
						$sql1 = "select avg(grade.ProdGrade) from grade, product where product.ProdID = grade.ProdID and product.ProdID = '{$rows[0]}'";
					}
					else
					{
						$sql1 = "select avg(grade.ProdGrade) from grade, product where product.ProdID = grade.ProdID and product.ProdID = '{$rows[0]}' and CATEGORY = '{$_POST['CATEGORY']}'";
					}
					$result1 = mysqli_query ($connect, $sql1);
					$rows1=mysqli_fetch_row($result1);
					echo "<td align='center'> $rows1[0] </td>";
					echo "<td align='center' vertical-allign='center'>";
					echo "<br>";
					echo '<form enctype="multipart/form-data" method="post" action= "product_info.php">';
					echo "<input type='submit' value=' 구매하러가기 '>";
					echo "<input type='hidden' name='ProdID' value= '$rows[0]'>";
					echo "</form>";
					echo "</td>";
					
					$sql4 = "select ProvID from provider";
					$result4 = mysqli_query ($connect, $sql4);
					$count4 = mysqli_num_fields ($result4); 
					while ($rows4=mysqli_fetch_row($result4))
					{
						$sql5 = " select provider.ProvGrade from provider, provide where provide.ProdID = '{$rows[0]}' and provide.ProvID = provider.ProvID and provider.ProvID = '{$rows4[0]}'";
						$result5 = mysqli_query ($connect, $sql5);
						$count5 = mysqli_num_fields ($result5); 
						while($rows5=mysqli_fetch_row($result5))
						{
							if($rows5[0] < 5)
							{
								echo "<td align='center' bgcolor='red'> <B>$rows5[0]</B> </td>";
							}
							elseif($rows5[0] > 8.5)
							{
								echo "<td bgcolor='green' align='center'> <B>$rows5[0]</B> </td>";
							}
							else
							{
								echo "<td align='center'> $rows5[0] </td>";
							}
						}
					}
					echo "</tr>";
				}
			?>
            </table>
            <table>
                <tr class="buttonset">
                    <td><a href="customer_menu.php"><input type="button" value="  회원메뉴로 돌아가기  " /></a></td>
                </tr>
            </table>

            <?php
			mysqli_close($connect);
		?>
        </center>
    </div>
</body></html>
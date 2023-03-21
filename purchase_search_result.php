<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>
<?php
    include "connect_db.php";
?>
<head>
    <title> 검색 결과 </title>
</head>


<body>
    <div id="wrap">
        <?php
        $category = $_GET['category'];
        $search_con = $_GET['search'];
        ?>
        <center>
            <h1>'<?php echo $search_con; ?>'로 검색한 결과입니다.</h1>
            <table>
                <tr class="buttonset">
                    <td><a href="purchase_front.php"><input type="button" value=" 메인으로 " /></a></td>
                </tr>
            </table>
            <table class="table">
                <tr class="tr1">
                    <td><B> 상품명 </B></td>
                    <td><B> 호환 기기 </B></td>
                    <td><B> 컬러 </B></td>
                    <td><B> 패턴 </B></td>
                    <td><B> 가격 </B></td>
                    <td><B> 별점 </B></td>
                </tr>

                <?php				
				$sql = "select PROD_ID, PROD_NAME, PROD_DEVICE, PROD_COLOR, PROD_PATTERN, PROD_COST from product where $category like '%$search_con%'";	
				$result = mysqli_query ($connect, $sql);
				$count = mysqli_num_fields ($result); 
				while ($rows=mysqli_fetch_row($result))
				{
					echo "<tr>";
					for ($a = 1; $a < $count; $a++)
					{
						echo "<td align='center'> $rows[$a] </td>";
					}
					$sql1 = "select avg(evaluate.PROD_GRADE) from evaluate, product where product.PROD_ID = evaluate.PROD_ID and product.PROD_ID = '{$rows[0]}'";
					$result1 = mysqli_query ($connect, $sql1);
					$rows1=mysqli_fetch_row($result1);
					echo "<td align='center'> $rows1[0] </td>";
					echo "<td align='center' vertical-allign='center'>";
					echo "<br>";
					echo '<form enctype="multipart/form-data" method="post" action= "product_info.php">';
					echo "<input type='submit' value='구매하러가기 '>";
					echo "<input type='hidden' name='PROD_ID' value= '$rows[0]'>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
			?>
            </table>
        </center>
    </div>
</body>

</html>

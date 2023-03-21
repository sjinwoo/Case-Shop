<?php
	session_start();
	include "login_head.php";
?>
<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<head>
    <title> 상품 구매 </title>
</head>

<body>
    <div id="wrap">
        <div>
            <br>
            <h2>
                <center> 상품 검색 </center>
            </h2>
            <hr>
            <center>
                <div id="search_box" class="textbox">
                    <form action="purchase_search_result.php" method="get">
                        <select name="category">
                            <option value="PROD_DEVICE"> 호환 기기</option>
                            <option value="PROD_COLOR"> 컬러</option>
                            <option value="PROD_PATTERN"> 패턴</option>
                        </select>
                        <input type="text" name="search" size="40" required="required" /> <button>검색</button>
                    </form>
                </div>
            </center>
        </div>
        <div>
            <br>
            <h2>
                <center> 상품 목록 </center>
            </h2>
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
				$sql = "select PROD_ID, PROD_NAME, PROD_DEVICE, PROD_COLOR, PROD_PATTERN, PROD_COST from product";	
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
					echo "<input type='submit' value=' 구매하러가기 '>";
					echo "<input type='hidden' name='PROD_ID' value= '$rows[0]'>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
			?>
            </table>
        </div>
    </div>
</body>

</html>


<?php
	session_start();
	include "login_head.php";
?>

<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<head>
    <title> 발주 신청 목록 </title>
</head>

<body>
    <div id="wrap">
        <br>
        <h2>
            <center> 발주 신청 목록 </center>
        </h2>
        <hr>

        <?php
			$sql = "SELEDT product.* FROM product, provide where product.PROD_ID = provide.PROD_ID AND product.PROD_STOCK <= 10";
			$result = mysqli_query($connect, $sql);
			if($result){
			$count = mysqli_num_fields($result);
			?>

        <center>
            <table class="table">
                <tr class="tr1">
                    <td><B> 제품 ID </B></td>
                    <td><B> 제품명 </B></td>
                    <td><B> 호환 기기 </B></td>
                    <td><B> 컬러 </B></td>
                    <td><B> 패턴 </B></td>
                    <td><B> 재고량 </B></td>
                    <td><B> 가격 </B></td>
                    <td><B> 발주 신청 날짜 </B></td>
                </tr>

                <?php
				while ($rows=mysqli_fetch_row($result))
				{
					echo "<tr>";
					for ($a = 0; $a < $count; $a++)
					{
						$sql5 = "SELECT avg(PROD_GRADE) FROM evaluate where PROD_ID = '{$rows[0]}' order by PROD_ID";
						$result5 = mysqli_query ($connect, $sql5);
						echo "<td align='center'> $rows[$a] </td>";		
					}
					$sql6 = "SELECT provide.ORDERDATE from product, provide where product.PROD_ID = provide.PROD_ID";
					$result6 = mysqli_query($connect, $sql6);
					$rows6=mysqli_fetch_row($result6);
					if($rows6 != NULL)
					{
						echo "<td align='center' vertical-allign='center'>";
						echo "<br>";
						echo '<form enctype="multipart/form-data" method="post" action= "Admin_Menu_back.php">';
						echo "<input type='submit' value=' 발주 '>";
						echo "<input type='hidden' name='PROD_ID' value= '$rows[0]'>";
						echo "<input type='hidden' name='PROD_COST' value= '$rows[6]'>";
						echo "</form>";
						echo "</td>";
						echo "</tr>";
					}
					else
					{
						echo "<td align='center'> 발주 신청 없음. </td>" ;
					}
					
				}
			}

			else
			{
				?>
            </table>

            <table class="table">
                <tr class="tr1">
                    <td><B> 제품 ID </B></td>
                    <td><B> 제품명 </B></td>
                    <td><B> 호환 기기 </B></td>
                    <td><B> 컬러 </B></td>
                    <td><B> 패턴 </B></td>
                    <td><B> 재고량 </B></td>
                    <td><B> 가격 </B></td>
                    <td><B> 발주 신청 날짜 </B></td>
                </tr>

                <?php
			}
				?>

            </table>
            <?php
			mysqli_close($connect);
			?>
        </center>
    </div>
</body></html>
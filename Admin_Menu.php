


<?php
	session_start();
	include "login_head.php";
?>
<html>
<link rel="stylesheet" href="css\style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java\main.js"></script>

<head>
    <title> 쇼핑몰 - 재고 관리 창 </title>
</head>

<body>
    <div id="wrap">
        <br>
        <h2>
            <center> 공급자 관리 </center>
        </h2>

        <center>
            <?php
			$connect = mysqli_connect("localhost", "root", '5953', 'case_shop');
			
			mysqli_query($connect, "set session character_set_connection=utf8;");
			mysqli_query($connect, "set session character_set_results=utf8;");
			mysqli_query($connect, "set session character_set_client=utf8;");	
		?>

            <table class=" table">
                <tr class="tr1">
                    <td><B> 공급자 ID </B></td>
                    <td><B> 사업자번호 </B></td>
                    <td><B> 공급자명 </B></td>
                    <td><B> 공급자 전화번호 </B></td>
                    <td><B> 거래은행코드 </B></td>
                    <td><B> 계좌번호 </B></td>
                    <td><B> 예금주 </B></td>
                </tr>
                <?php
				$sql = "select *from provider";
				$result = mysqli_query ($connect, $sql);
				$count = mysqli_num_fields ($result);
				while ($rows=mysqli_fetch_row($result))
				{
					echo "<tr class = 'trline'>";
					for ($a = 0; $a < $count; $a++)
					{
						echo "<td> $rows[$a] </td>";
					}
					echo "</tr>";
				}	
			?>
            </table>

            <br>
            <h2>
                <center> 재고 관리 </center>
            </h2>

            <center>
                <?php
			$sql = "select *from product";
			$result = mysqli_query ($connect, $sql);
			$count = mysqli_num_fields ($result);
		?>

                <table class="table">
                    <tr class="tr1">
                        <td><B> 제품 ID </B></td>
                        <td><B> 제품명 </B></td>
                        <td><B> 호환 기기 </B></td>
                        <td><B> 컬러 </B></td>
                        <td><B> 패턴 </B></td>
                        <td><B> 재고량 </B></td>
                        <td><B> 가격 </B></td>
                    </tr>

                    <?php
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
                <br>
                <h2>
                    <center> 발주 필요 목록</center>
                </h2>

                <?php
			$sql = "select * from case_shop.product where PROD_STOCK <= 10";
			$result = mysqli_query($connect, $sql);
			if($result){
			$count = mysqli_num_fields ($result);
			?>

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
					$PROD_GRADE = 0;
					echo "<tr class = 'trline'>";
					for ($a = 0; $a < $count; $a++)
					{
						$sql5 = "select avg(PROD_GRADE) from evaluate where PROD_ID = '{$rows[0]}' order by PROD_ID";
						$result5 = mysqli_query ($connect, $sql5);
						while($rows5=mysqli_fetch_row($result5))
						{
							if(0 < $rows5[0] AND $rows5[0] < 5)
							{
								echo "<td align='center' bgcolor='#F5A9A9'> $rows[$a] </td>";
							}
							else
							{
								echo "<td align='center'> $rows[$a] </td>";									
							}
							$PROD_GRADE = $rows5[0];
						}
					}
					
					$sql6 = "select provide.*  from product, provide where product.PROD_ID = provide.PROD_ID";
					$result6 = mysqli_query($connect, $sql6);
					$rows6 = mysqli_fetch_row($result6);
					echo "<td align='center' vertical-allign='center'>";
					echo '<form enctype="multipart/form-data" method="post" action= "Admin_Menu_back.php">';
					echo "<input type='hidden' name='PROD_ID' value= '$rows[0]'>";
					echo "<input type='hidden' name='PROD_COST' value= '$rows[6]'>";
					echo "<br>";
					echo "<input type='number' min=1 max=100000 name='PROV_ID'>";
					echo "</br>";
					echo "<br>";
					echo "<input type='number' min=1 max=100 name='ORDER_AMOUNT'>";
					echo "<input type='submit' value=' ◄ 발주 신청 ► '>";
					echo "</br>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
					
				}
			}
			else
			{
				?>

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
				<br><h2><center> 발주 신청 목록 </center> </h2><hr>
			
				<?php
					$sql = "select provide.* from provide";
					$result = mysqli_query($connect, $sql);
					if($result){
					$count = mysqli_num_fields($result);
				?>
			
			<center><table class = "table">
				<tr class = "tr1">
					<td><B> 제품 ID </B></td>
					<td><B> 공급자 ID </B></td>
					<td><B> 발주량 </B></td>
					<td><B> 공급 단가 </B></td>
					<td><B> 발주 완료 날짜 </B></td>
					<td><B> 발주 신청 날짜 </B></td>
				</tr>
				
				<?php
					while ($rows=mysqli_fetch_row($result))
					{
						echo "<tr class = 'trline'>";
						for ($a = 0; $a < $count; $a++)
						{
							$sql5 = "select avg(PROD_GRADE) from evaluate where PROD_ID = '{$rows[0]}' order by PROD_ID";
							$result5 = mysqli_query ($connect, $sql5);
							echo "<td align='center'> $rows[$a] </td>";		
						}
						$sql6 = "select provide.ORDERDATE from product, provide where product.PROD_ID = provide.PROD_ID";
						$result6 = mysqli_query($connect, $sql6);
						$rows6=mysqli_fetch_row($result6);					
					}
				}

				else
				{
					?>
							
				<table class = "table">
				<tr class = "tr1">
					<td ><B> 제품 ID </B></td>
					<td ><B> 공급자 ID </B></td>
					<td ><B> 발주량 </B></td>
					<td ><B> 공급 단가 </B></td>
					<td><B> 발주 완료 날짜 </B></td>
					<td ><B> 발주 신청 날짜 </B></td>
				</tr>
				
					<?php
				}
					?>
					</table>
                    <br>
                    <h2>
                        <center> 별점 목록 </center>
                    </h2>
                    <h4>
                        <center> 제품별 별점 목록 </center>
                    </h4>

                    <table class="tablestar">
                        <tr class="tr1">
                            <td><B> 제품 ID </B></td>
                            <td><B> 별점 </B></td>
                        </tr>

                        <?php
					$sql = "select PROD_ID from product";
					$result = mysqli_query ($connect, $sql);
					$count = mysqli_num_fields ($result); 
				while ($rows=mysqli_fetch_row($result))
				{
					echo "<tr>";
					for ($a = 0; $a < $count; $a++)
					{
						$sql1 = "SELECT avg(PROD_GRADE) FROM evaluate WHERE PROD_ID = $rows[$a]";
						$result1 = mysqli_query ($connect, $sql1);
						$count1 = mysqli_num_fields ($result1); 
						$rows1=mysqli_fetch_row($result1);
						echo "<td align='center'> $rows[$a] </td>";
						echo "<td align='center'> $rows1[$a] </td>";
					}
					echo "</tr>";
				}
				?>
                        </tr>
                    </table>
                    <?php
			mysqli_close($connect);
			?>
            </center>
        </center>
    </div>
</body>
</html>

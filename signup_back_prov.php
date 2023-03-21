<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>


<?php
	$connect = mysqli_connect("localhost", "root", '5953', 'case_shop');
	
	$sql = "INSERT INTO provider VALUES";
	$sql = $sql."('{$_POST['PROV_ID']}', '{$_POST['PROV_BN']}', '{$_POST['PROV_NAME']}', '{$_POST['PROV_TEL']}','{$_POST['PROV_BANKCODE']}','{$_POST['PROV_ACCNUM']}', '{$_POST['PROV_ACCNAME']}')";
	$result = mysqli_query($connect, $sql);

	mysqli_close($connect);

?>
<heade>

    <title> 공급자 등록 정보 확인</title>
</heade>
<body>
    <div id="wrap">
		<br><h2><center> 공급자 등록 정보 확인 </center> </h2><hr>
			<center>
	
			<table border=0 bordercolor="blue" width=700 cellspacing=l cellpadding=5>
	
			<tr>
				<td width=300 align=right> 공급자 ID : </td>
				<td width=300>
				<?php	
					echo "<B>{$_POST['PROV_ID']} </B><br>";
				?>
				</td>
				
				<td width=200 align=right> 사업자번호 : </td>
				<td width=300>
				<?php	
					echo "<B>{$_POST['PROV_BN']} </B><br>";
				?>
				</td>
			</tr>
		
			<tr>
				<td align=right> 공급자명 : </td>
				<td>
				<?php	
					echo "<B>{$_POST['PROV_NAME']} </B><br>";
				?>
				</td>
	
				<td align=right> 공급자 전화번호 : </td>
				<td>
				<?php	
					echo "<B>{$_POST['PROV_TEL']} </B><br>";
				?>
				</td>
			</tr>
			
			<tr>
				<td align=right> 거래은행코드 : </td>
				<td>
				<?php	
					echo "<B>{$_POST['PROV_BANKCODE']} </B><br>";
				?>
				</td>
	
				<td align=right> 계좌번호 : </td>
				<td>
				<?php	
					echo "<B>{$_POST['PROV_ACCNUM']} </B><br>";
				?>
				</td>
			</tr>
			
			<tr>
				<td align=right> 예금주 : </td>
				<td>
				<?php	
					echo "<B>{$_POST['PROV_ACCNAME']} </B><br>";
				?>
				</td>
			</tr>
			
		</table><br>
		<table border=0 width=800>
			<tr class = "buttonset">
				<td align=center>
					<input type="button" value="로그인" onclick="location.href='login.php'">
				</td>
			</tr>
		</table>
		</center>
    </div>
	</body>
</html>
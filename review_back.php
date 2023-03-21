<?php
	session_start();
	include "login_head.php";
?>
<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<?php
	$connect = mysqli_connect ('localhost', 'root', '5953', 'case_shop');

	$sql = "INSERT INTO evaluate VALUES";
	$sql = $sql."('{$_SESSION['CUS_ID']}', '{$_POST['PROD_ID']}', '{$_POST['PROD_GRADE']}','{$_POST['REVIEW']}')";
	$result = mysqli_query($connect, $sql);
	
	$PURCH_NUM = $_POST['PURCH_NUM'];

	$sql = "UPDATE purchaselist set PURCH_NUM = -{$PURCH_NUM} where PURCH_NUM = {$PURCH_NUM}";
	$result = mysqli_query($connect, $sql);

	$sql = "select * from evaluate";
	$result = mysqli_query ($connect, $sql);
	$count = mysqli_num_fields ($result); 
	while ($rows=mysqli_fetch_row($result))
	{
		$sql1 = " select avg(evaluate.PROD_GRADE) from evaluate, provide where provide.PROD_ID = evaluate.PROD_ID";
		$result1 = mysqli_query ($connect, $sql1);
		$count1 = mysqli_num_fields ($result1); 
	}
	
	mysqli_close($connect);

?>

<head>
    <title> 리뷰 등록 완료 </title>
</head>

<body>
   <div id="wrap">
    <br>
    <h2>
        <center> 리뷰 등록 완료 </center>
    </h2>
 
    <center>

        <table border=0 bordercolor="blue" width=700 cellspacing=l cellpadding=5>
            <tr>
                <td width=300 align=right> 회원 ID : </td>
                <td width=300>
                    <?php	
					echo "<B>{$_SESSION['CUS_ID']} </B>";
				?>
                </td>

                <td width=250 align=right> 제품 ID : </td>
                <td width=300>
                    <?php	
					echo "<B>{$_POST['PROD_ID']} </B>";
				?>
            </tr>
            <tr>

                <td align=right colspan=1> 제품만족도 별점 : </td>
                <td>
                    <?php	
					echo "<B>{$_POST['PROD_GRADE']} </B>";
				?>
                </td>
            </tr>
            <tr>
                <td align=right> 리뷰 : </td>
                <td colspan=4>
                    <?php	
					echo "<B>{$_POST['REVIEW']} </B>";
				?>
                </td>
            </tr>
        </table><br>

        <table>
            <tr class="buttonset">
                <td>
                    <a href="customer_info.php"><input type="button" value=" 회원정보로 돌아가기 ">
                    </a>
                </td>
            </tr>
        </table>
    </center>
    
    </div>
</body>

</html>

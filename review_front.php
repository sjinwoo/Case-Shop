<?php
	session_start();
	include "login_head.php";
?>
<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<head>
    <title> 리뷰 </title>
</head>

<body>
   <div id="wrap">
    <br>
    <h2>
        <center> 리뷰 등록 화면 </center>
    </h2>
    <hr>

    <form enctype="multipart/form-data" method="post" action="review_back.php">
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
					echo "<input type='hidden' name='PROD_ID' value= '{$_POST['PROD_ID']}'>";
				?>
                    </td>
                </tr>

                <tr>

                    <td align=right colspan=1> 제품만족도 별점 : </td>
                    <td>
                        <input type="number" min="0" max="10" name="PROD_GRADE">
                    </td>
                </tr>
                <tr>
                    <td align=right> 리뷰 : </td>
                    <td colspan=4>
                        <textarea rows=4 cols=64 name="REVIEW"></textarea>
                    </td>
                </tr>
            </table><br>

            <table>
                <tr class="buttonset">
                    <td>
                        <input type="submit" value=" 리뷰등록 ">
                    </td>
                </tr>
            </table>
            <?php
			echo "<input type='hidden' name='PURCH_NUM' value= '{$_POST['PURCH_NUM']}'>";
			
		?>
        </center>
    </form>
    </div>
</body>

</html>

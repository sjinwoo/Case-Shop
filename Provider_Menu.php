<?php
	session_start();
	include "login_head.php";
?>
<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>
<head>
    <title>공급자 메뉴</title>
</head>
<body>
   <div id="wrap">
    <center>
        <br><br><br><br>
        <table border=0 width=800>
            <tr class="buttonset">
                <td>
                    <a href="add_product_front.php"><input type="button" value="물품 등록" /></a>&emsp;
                </td>
            </tr>
        </table>
        <br><br><br><br>
        <table border=0 width=800>
            <tr class="buttonset">
                <td>
                    <a href="order_front.php"><input type="button" value="발주 신청 목록 " /></a>&emsp;
                </td>
            </tr>
        </table>
    </center>
    </div>
</body>
</html>

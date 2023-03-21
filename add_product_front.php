<html>
<link rel="stylesheet" href="css/style1.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<head>
    <title>판매 물품 등록 창 </title>
</head>

<body>
    <div id="wrap">
        <br>
        <h2>
            <center> 판매 물품 등록 화면 </center>
        </h2>

        <form enctype="multipart/form-data" method="post" action="add_product_back.php">
            <center>
                <table border=0 bordercolor="blue" width=700 cellspacing=l cellpadding=5>

                    <tr class="textbox">
                        <td width=300 align=right> 제품ID : </td>
                        <td width=300>
                            <input type="text" size=10 maxlength=10 name="PROD_ID">
                        </td>

                        <td width=200 align=right> 호환 기기 : </td>
                        <td width=300>
                            <input type="text" size=10 maxlength=20 name="PROD_DEVICE">
                        </td>
                    </tr>

                    <tr class="textbox">
                        <td align=right> 제품명 : </td>
                        <td>
                            <input type="text" size=10 maxlength=20 name="PROD_NAME">
                        </td>

                        <td align=right> 컬러 : </td>
                        <td>
                            <input type="text" size=10 maxlength=10 name="PROD_COLOR">
                        </td>
                    </tr>

                    <tr class="textbox">
                        <td align=right> 패턴 : </td>
                        <td>
                            <input type="text" size=10 maxlength=10 name="PROD_PATTERN">
                        </td>

                        <td align=right> 재고량 : </td>
                        <td>
                            <input type="text" size=10 maxlength=10 name="PROD_STOCK">
                        </td>
                    </tr>

                    <tr class="textbox">
                        <td align=right> 가격 : </td>
                        <td>
                            <input type="text" size=10 maxlength=10 name="PROD_COST">
                        </td>
                        <td align=right> 공급자 ID : </td>
                        <td>
                            <input type="text" size=10 maxlength=10 name="PROV_ID">
                        </td>
                    </tr>

                </table><br>

                <table >
                    <tr class="buttonset">
                        <td >
                            <input type="submit" value=" 제품등록  ">
                        </td>
                    </tr>
                </table>
            </center>
        </form>
    </div>
</body>

</html>

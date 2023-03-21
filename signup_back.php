<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>
<?php
	$connect = mysqli_connect("localhost", "root", '5953', 'case_shop');
	
	$sql = "INSERT INTO customer VALUES";
	$sql = $sql."('{$_POST['CUS_ID']}', '{$_POST['CUS_PW']}', '{$_POST['CUS_NAME']}', '{$_POST['CUS_SEX']}','{$_POST['CUS_BIRTH']}','{$_POST['CUS_ADDR']}', '{$_POST['CUS_TEL']}', '{$_POST['CUS_DIV']}')";
	$result = mysqli_query($connect, $sql);

	mysqli_close($connect);

?>
<heade>
    <meta charset="UTF-8">
    <title>등록 정보 확인</title>
</heade>

<body>
    <div id="wrap">
        <br>
        <h2>
            <center> 등록 정보 확인 </center>
        </h2>
        <center>

            <table>

                <tr>
                    <td width=300 align=right> 회원 ID : </td>
                    <td width=300>
                        <?php	
					echo "<B>{$_POST['CUS_ID']} </B><br>";
				?>
                    </td>

                    <td width=200 align=right> 비밀번호 : </td>
                    <td width=500>
                        <?php	
					echo "<B>{$_POST['CUS_PW']} </B><br>";
				?>
                    </td>
                </tr>

                <tr>
                    <td align=right> 이름 : </td>
                    <td>
                        <?php	
					echo "<B>{$_POST['CUS_NAME']} </B><br>";
				?>
                    </td>

                    <td align=right> 성별 : </td>
                    <td>
                        <?php if($_POST['CUS_SEX'] == "male") : ?>
                        <input type="radio" name="CUS_SEX" value="male" disabled checked> 남성
                        <input type="radio" name="CUS_SEX" value="female" disabled> 여성
                        <?php else : ?>
                        <input type="radio" name="CUS_SEX" value="male" disabled> 남성
                        <input type="radio" name="CUS_SEX" value="female" disabled checked> 여성
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <td align=right> 생년월일 : </td>
                    <td>
                        <?php	
					echo "<B>{$_POST['CUS_BIRTH']} </B><br>";
				?>
                    </td>

                    <td align=right> 주소 : </td>
                    <td>
                        <?php	
					echo "<B>{$_POST['CUS_ADDR']} </B><br>";
				?>
                    </td>
                </tr>

                <tr>
                    <td align=right> 전화번호 : </td>
                    <td>
                        <?php	
					echo "<B>{$_POST['CUS_TEL']} </B><br>";
				?>
                    </td>

                    <td align=right> 종류 : </td>
                    <td>
                        <?php if($_POST['CUS_DIV'] == "user") : ?>
                        <input type="radio" name="CUS_DIV" value="user" disabled checked> 회원
                        <input type="radio" name="CUS_DIV" value="admin" disabled> 관리자
                        <input type="radio" name="CUS_DIV" value="provider" disabled> 공급자
                        <?php elseif($_POST['CUS_DIV'] == "admin") : ?>
                        <input type="radio" name="CUS_DIV" value="user" disabled> 회원
                        <input type="radio" name="CUS_DIV" value="admin" disabled checked> 관리자
                        <input type="radio" name="CUS_DIV" value="provider" disabled> 공급자
                        <?php else: ?>
                        <input type="radio" name="CUS_DIV" value="user" disabled> 회원
                        <input type="radio" name="CUS_DIV" value="admin" disabled> 관리자
                        <input type="radio" name="CUS_DIV" value="provider" disabled checked> 공급자
                        <?php endif; ?>
                    </td>
                </tr>

            </table><br>
            <table border=0 width=800>
                <tr class="buttonset">
                    <td align=center>
                        <input type="button" value=" 로그인 " onclick="location.href='login.php'">
                    </td>
                </tr>
            </table>
        </center>
        <?php if($_POST['CUS_DIV'] == "provider") : ?>
        <br>
        <form enctype="multipart/form-data" method="post" action="signup_back_prov.php">
            <center>
                <table border=0 bordercolor="blue" width=700 cellspacing=l cellpadding=5>

                    <tr class="textbox">
                        <td width=300 align=right> 공급자 ID : </td>
                        <td width=300>
                            <input type="text" size=10 maxlength=10 name="PROV_ID">
                            <input type="hidden" name="CUS_ID" value="{$_POST['CUS_ID']}">
                        </td>

                        <td width=200 align=right> 사업자번호 : </td>
                        <td width=300>
                            <input type="text" size=10 maxlength=10 name="PROV_BN">
                        </td>
                    </tr>

                    <tr class="textbox">
                        <td align=right> 공급자명 : </td>
                        <td>
                            <input type="text" size=10 maxlength=12 name="PROV_NAME">
                        </td>

                        <td align=right> 공급자 전화번호 : </td>
                        <td>
                            <input type="text" size=10 maxlength=11 name="PROV_TEL">
                        </td>
                    </tr>

                    <tr class="textbox">
                        <td align=right> 거래은행코드 : </td>
                        <td>
                            <input type="text" size=10 maxlength=10 name="PROV_BANKCODE">
                        </td>

                        <td align=right> 계좌번호 : </td>
                        <td>
                            <input type="text" size=10 maxlength=14 name="PROV_ACCNUM">
                        </td>
                    </tr>

                    <tr class="textbox">
                        <td align=right> 예금주 : </td>
                        <td>
                            <input type="text" size=10 maxlength=10 name="PROV_ACCNAME">
                        </td>
                    </tr>

                </table><br>

                <table border=0 width=800>
                    <tr class = "buttonset">
                        <td align=center>
                            <input type="submit" value="공급자 등록 ">
                        </td>
                    </tr>
                </table>
            </center>
        </form>
        <?php endif; ?>
    </div>
</body>

</html>

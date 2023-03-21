<html>
<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<head>
    <title> 회원 등록 </title>
</head>

<body>
    <div id="wrap">
        <center>
            <br>
            <h2>
                <center> 회원등록 </center>
            </h2>

            <form enctype="multipart/form-data" method="post" action="signup_back.php">
                <table border=0 bordercolor="blue" width=700 cellspacing=l cellpadding=5>

                    <tr>
                        <td> 이메일 : </td>
                        <td class="textbox">
                            <input type="text" size=10 maxlength=40 name="CUS_ID">
                        </td>

                        <td> 비밀번호 : </td>
                        <td class="textbox">
                            <input type="password" size=10 maxlength=12 name="CUS_PW">
                        </td>
                    </tr>

                    <tr>
                        <td> 이름 : </td>
                        <td class="textbox">
                            <input type="text" size=10 maxlength=20 name="CUS_NAME">
                        </td>
                        <td > 전화번호 : </td>
                        <td class="textbox">
                            <input type="text" size=10 maxlength=11 name="CUS_TEL">
                        </td>
                    </tr>

                    <tr>
                        <td> 생년월일 : </td>
                        <td class="textbox">
                            <input type="text" size=10 maxlength=8 name="CUS_BIRTH">
                        </td>

                        <td> 주소 : </td>
                        <td class="textbox">
                            <input type="text" size=10 maxlength=20 name="CUS_ADDR">
                        </td>
                    </tr>

                    <tr>

                        <td> 성별 : </td>
                        <td>
                            <label><input type="radio" name="CUS_SEX" value="male" checked> 남성
                            </label>
                            <label>
                                <input type="radio" name="CUS_SEX" value="female"> 여성
                            </label>
                        </td>
                        <td> 종류 : </td>
                        <td>
                            <label>
                                <input type="radio" name="CUS_DIV" value="user" checked> 회원
                            </label>
                            <label>
                                <input type="radio" name="CUS_DIV" value="admin"> 관리자
                            </label>
                            <label>
                                <input type="radio" name="CUS_DIV" value="provider"> 공급자
                            </label>
                        </td>
                    </tr>

                </table><br>

                <table>
                    <tr>
                        <td class = "buttonset"; align=center>
                            <input type="submit" value=" 회원등록">
                        </td>
                    </tr>
                </table>

            </form>
        </center>
    </div>
</body>

</html>

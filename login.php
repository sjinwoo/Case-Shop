
<html>

<link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="java/main.js"></script>

<head>
    <title> 휴대폰 케이스 </title>
</head>

<body>
    <div id="wrap">

        <header id="header" class="clearfix">
            <h1><a href="login.php">휴대폰 케이스</a></h1>


        </header>

        <form enctype="multipart/form-data" method="post" action="login_back.php">
            <center>
                <table>
                    <br>
                    <h2>
                        <center> 로그인 </center>
                    </h2>


                    <tr class="textbox">
                        <td>
                            <label for="email">이메일</label>

                            <input type="email" size=20 name="CUS_ID" id="email">
                        </td>

                    </tr>
                    <tr class="textbox">
                        <td>
                            <label for="pw">비밀번호</label>

                            <input type="password" name="CUS_PW" id="pw">
                        </td>
                    </tr>
                    <tr class="buttonset">
                        <td>
                            <input type="submit" value=" 로그인 ">
                        </td>
                    </tr>
                </table><br>
                <table>

                    <tr>
                        <div>
                            <p>계정이 없으신가요?</p>
                        </div>
                    </tr>
                    <tr class="buttonset">
                        <td><a href="signup_front.php"><input type="button" value=" 회원가입 " /></a></td>
                    </tr>
                </table>
            </center>
        </form>
    </div>
</body>

</html>

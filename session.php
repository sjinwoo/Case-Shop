<html>
<?php
	session_start();
	include "connect_db.php";

	$pw = $_POST['CUS_PW'];
	$sql = "select CUS_PW from customer where CUS_ID='{$_POST['CUS_ID']}'";
	$result = mysqli_query ($connect, $sql);
	$rows=mysqli_fetch_row($result);

    if($pw == $rows[0])
    {
        $_SESSION['CUS_ID'] = $_POST['CUS_ID'];
        $_SESSION['CUS_PW'] = $_POST['CUS_PW'];
        $sql = "select CUS_DIV from customer where CUS_ID='{$_POST['CUS_ID']}'";
        $result = mysqli_query($connect, $sql);
        $rows = mysqli_fetch_row($result);

        $_SESSION['CUS_DIV'] = $rows[0];
        if($_SESSION['CUS_DIV'] == 'user' OR $_SESSION['CUS_DIV'] == 'VIP')
        {
            $sql = "select sum(purchaselist.PURCH_TOTAL) from purchase, purchaselist where purchase.PURCH_NUM = purchaselist.PURCH_NUM and purchase.CUS_ID = '{$_SESSION['CUS_ID']}' order by abs(purchaselist.PURCH_NUM)";
            $result = mysqli_query($connect, $sql);
            $rows = mysqli_fetch_row($result);
            if($rows[0] == 0)
            {
                $_SESSION['PURCH_TOTAL'] = 0;
            }
            $_SESSION['PURCH_TOTAL'] = $rows[0];
        }
    }
    else{
        echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
    }
    echo mysqli_error($connect);
?>

</html>

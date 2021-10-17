<html>
<head>
<title>Đăng ký</title>
</head>
<body>
<form method="POST" action=''>
<table><br><br>
Tên đăng ký:&emsp;&emsp;&emsp;<input type="text" name="ten"  maxlength="20"><br><br>
Mật khẩu:&emsp;&emsp;&emsp;&emsp;&emsp;<input type="password" name="mk"><br><br>
<tr><td><input type="submit" value="Đăng nhập"></td> 
<td><input type="reset" value="Xóa hết"></td></tr>
</table>
</form>
<?php
require("ketnoi.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	if(isset($_POST['ten'])) $a=$_POST['ten'];
	if(isset($_POST['mk']))  $b=$_POST['mk'];
	$luachon = "INSERT INTO user (matkhau,tenhienthi) VALUES ('$b', '$a')";
	if ($link->query($luachon) == TRUE) {
		header("location: ./lienket.php");
        echo "Thêm dữ liệu thành công !";
    } else {
        
    }
}
?>

</body>
</html>
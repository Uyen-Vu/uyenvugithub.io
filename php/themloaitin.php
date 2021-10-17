<head><title>Thêm loại tin</title></head>

<h3>Thêm loại tin </h3><br>
<?php
$link = mysqli_connect ("localhost","root", "","qltintuc") or die ("Ko the ket noi Database");


if ($_SERVER["REQUEST_METHOD"] == "POST") { //Lấy giá trị POST từ form vừa submit
    if(isset($_POST["maloai"])) { $a = $_POST['maloai']; }
    if(isset($_POST["tenloai"])) { $b = $_POST['tenloai']; }
    
    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO loaitin (maloai,tenloai) 
	VALUES ('$a', '$b')";
    if ($link->query($sql) == TRUE) {
        echo "Thêm dữ liệu thành công !";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
    $sql1 = "INSERT INTO luotxem (luotxem) 
	VALUES ('0')";
    if ($link->query($sql1) == TRUE) {
        echo "Thêm dữ liệu thành công !";
    } else {
        echo "Error: " . $sql1 . "<br>" . $link->error;
    }
	header("location: themsuaxoa.php");
}
//Đóng database
$link->close();

?>

<form action="" method="post">
    <table>
        <tr>
            <th>Mã loại</th>
            <td><input type="text" name="maloai" value=""></td>
        </tr>
        <tr>
            <th> Tên loại</th>
            <td><input type="text" name="tenloai" value=""></td>
        </tr>
    </table>
	<br>
    <button type="submit">Đồng ý</button>
	<button type="reset">Làm lại</button>
</form>

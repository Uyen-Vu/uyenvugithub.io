<head><title>Thêm tin tức</title></head>
<script src="./ckeditor/ckeditor.js"></script>
<h3>Thêm tin tức</h3><br>
<?php
$link = mysqli_connect ("localhost","root", "","qltintuc") or die ("Ko the ket noi Database");


if ($_SERVER["REQUEST_METHOD"] == "POST") { //Lấy giá trị POST từ form vừa submit
    if(isset($_POST["tieude"])) { $a = $_POST['tieude']; }
    if(isset($_POST["editor1"])) { $b = $_POST['editor1']; }
    if(isset($_POST["tacgia"])) { $c = $_POST['tacgia']; }
    $d= date('Y-m-d');
    if(isset($_POST["maloaitin"])) { $e = $_POST['maloaitin']; }
    if(isset($_POST["Mota"])) { $g = $_POST['Mota']; }
    if(isset($_POST["hinhanh"])) { $h = $_POST['hinhanh']; }
	
    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO tintuc (tieude, noidung, tacgia, ngayviet, maloaitin,Mota,hinhanh) 
	VALUES ('$a', '$b', '$c', '$d', '$e','$g','$h')";
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
            <th>Tiêu đề</th>
            <td><input type="text" name="tieude" value=""></td>
        </tr>
        <tr>
            <th>Tác giả</th>
            <td><input type="text" name="tacgia" value=""></td>
        </tr>
        <tr>
            <th>Mã loại tin</th>
            <td><input type="text" name="maloaitin" value=""></td>
        </tr>
        <tr>
            <th>Mô tả</th>
            <td><input type="text" name="Mota" value=""></td>
        </tr>
        <tr>
            <th>Hình ảnh</th>
            <td><input type="text" name="hinhanh" value=""></td>
        </tr>
        
		<tr>
			<th>Nội dung</th>
			<td> 
                <textarea name="editor1" id="editor1" rows="10" cols="80">
                </textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            </td>
    </table>
	<br>
    <button type="submit">Đồng ý</button>
	<button type="reset">Làm lại</button>
</form>

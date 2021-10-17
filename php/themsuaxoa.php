<html>
<head>
<title>Trang chỉnh sửa</title>
</head>
<link rel="stylesheet" href="../css/thesuaxoa.css">
<?php
require("ketnoi.php");
$luachon = 'SELECT * FROM tintuc';
// Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
$ketqua = mysqli_query($link, $luachon) or die (mysqli_error());
//Biến hằng dùng để liệt kê các giá trị của các field ID, hoten, quequan
$hang = mysqli_fetch_assoc($ketqua);
/* Đoạn này có thể dùng để thay thế đoạn báo lỗi truy vấn thay cho cái or die ở trên
if (!$ketqua){
    die ('Câu truy vấn bị sai');
}
*/
//Tạo ra 1 bảng, sau đó cho hiển thị các giá trị của biến hang
?>
<body>
<center><h3>Thêm tin </h3><a href="./trangchu.php"><h3>Trang Chủ</h3></a></center>
</center>
</body>
</html>
<table class="tablebg" border="1" width="1080" align="center" 
cellpadding="1" cellspacing="1">
  <tr>
    <th  class="row1">Mã tin</th>
    <th  class="row1">Tiêu đề</th>
	<th  class="row1">Nội dung</th>
	<th class="row1" >Tác giả</th>
	<th  class="row1">Ngày viết</th>
	<th  class="row1">Tên loại</th>
	<th  class="row1">Mô tả tin</th>
	<th  class="row1">Hình ảnh</th>
	<th class="row1" >Sửa</th>
	<th  class="row1">Xóa</th>
</tr>
  <?php do { ?>
    <tr class="row">
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['matin']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['tieude']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><div class="sub-item"><?php echo $hang['noidung']; ?></div></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['tacgia']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['ngayviet']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['maloaitin']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['MoTa']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['hinhanh']; ?></div></td>
	  <td align="center"><a href = "sua.php? matin=<?php echo $hang['matin'];?>"><font color="gray">Sửa</font></a></td>
	  <td align ="center" ><a href = "xoa.php? matin=<?php echo $hang['matin'];?>"><font color="gray">Xóa</font></a></td>

    </tr>
    <?php } while ($hang = mysqli_fetch_assoc($ketqua)); ?>
</table>
<br><br>
<center><tr><td><button><a href = "them.php">Thêm tin</a></button></td> </center>


<?php
require("ketnoi.php");
$luachon = 'SELECT * FROM loaitin';
// Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
$ketqua = mysqli_query($link, $luachon) or die (mysqli_error());
//Biến hằng dùng để liệt kê các giá trị của các field ID, hoten, quequan
$hang = mysqli_fetch_assoc($ketqua);
/* Đoạn này có thể dùng để thay thế đoạn báo lỗi truy vấn thay cho cái or die ở trên
if (!$ketqua){
    die ('Câu truy vấn bị sai');
}
*/
//Tạo ra 1 bảng, sau đó cho hiển thị các giá trị của biến hang
?>
<center class="mt-5"><h4>Thêm  loại tin </h4></center>
<table class="tablebg" border="1" width="1080" align="center" 
cellpadding="1" cellspacing="1">
  <tr>
    <th  class="row1">Mã loại</th>
    <th  class="row1">Tên loại</th>
	<th  class="row1">Sửa</th>
	<th class="row1" >Xóa</th>	
</tr>
  <?php do { ?>
    <tr class="row">
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['maloai']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['tenloai']; ?></div></td>
	  <td align="center"><a href = "sualoaitin.php? maloai=<?php echo $hang['maloai'];?>"><font color="gray">Sửa</font></a></td>
	  <td align ="center" ><a href = "xoaloaitin.php? maloai=<?php echo $hang['maloai'];?>"><font color="gray">Xóa</font></a></td>

    </tr>
    <?php } while ($hang = mysqli_fetch_assoc($ketqua)); ?>
</table>
<br><br>
<center><tr><td><button><a href = "themloaitin.php">Thêm loạitin</a></button></td> </center>
<?php
// Sau khi thực thi xong thì ngắt kết nối database
mysqli_close($link);
?>
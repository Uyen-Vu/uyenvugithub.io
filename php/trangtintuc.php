<html>
<head>
<title>Trang tin tức</title>
</head>
<body>
<?php
require("ketnoi.php");
$luachon = ' Select * FROM tintuc ';

$ketqua = mysqli_query($link, $luachon) or die (mysqli_error());

$hang = mysqli_fetch_assoc($ketqua);



?>

<center><h3>Bảng tin tức </center></h3>
<table class="tablebg" border="1" width="1080" align="center" 
cellpadding="1" cellspacing="1">
  <tr>
    <th width="220" align="center">Tiêu đề</th>
	<th width="220" align="center">Nội dung</th>
	<th width="70" align="center">Tác giả</th>
	<th width="70" align="center">Ngày viết</th>
	<th width="40" align="center">Tên loại</th>
  </tr>
  <?php do { ?>
    <tr class="row">
      <td  class="row1" align="left"><?php echo $hang['tieude']; ?></td>
	  <td  class="row1" align="left"><?php echo $hang['noidung']; ?></td>
	  <td  class="row1" align="center"><?php echo $hang['tacgia']; ?></td>
	  <td  class="row1" align="center"><?php echo $hang['ngayviet']; ?></td>
	  <td  class="row1" align="center"><?php echo $hang['maloaitin']; ?></td>
    </tr>
    <?php } while ($hang = mysqli_fetch_assoc($ketqua));  ?>
</table>

<?php
// Sau khi thực thi xong thì ngắt kết nối database
mysqli_close($link);
?>
</body>
</html>
<head><title>Sửa tin tức</title></head>
<script src="./ckeditor/ckeditor.js"></script>
<?php
require("ketnoi.php");
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_GET['matin'])){
		$matin=$_GET['matin'];
		}

	if(isset($_POST['sua'])){
		$tieude= $_POST['tieude'];
		$noidung= $_POST['editor1'];
		$tacgia= $_POST['tacgia'];
		$ngayviet= date('Y-m-d');
		$maloaitin= $_POST['maloaitin'];
		$motatin= $_POST['motatin'];
		$hinhanh= $_POST['hinhanh'];
		
		if($tieude !="" && $noidung !="" && $tacgia !=""&& $ngayviet !=""&& $maloaitin !=""){
			$sql="UPDATE tintuc SET tieude='$tieude', noidung='$noidung', tacgia='$tacgia', ngayviet='$ngayviet',
			maloaitin='$maloaitin',Mota='$motatin',hinhanh='$hinhanh' where matin = '$matin'"; 
			$ketqua=mysqli_query($link,$sql);
			header("location: themsuaxoa.php");
		}
	}
}
?>
<?php
	$matin=$_GET['matin'];
	$sql ="SELECT *FROM tintuc where matin = '$matin'";
	$ketqua = mysqli_query($link,$sql) ;
	$hang = mysqli_fetch_array($ketqua);

?>

<form method="POST" action = "">
Tiêu đề:&emsp;&emsp;&emsp; 	<input type="text" name = "tieude"value ="<?php echo $hang['tieude'];?>"><br><br>
Tác giả:&emsp;&emsp;&emsp;	<input type="text" name = "tacgia"value ="<?php echo $hang['tacgia'];?>"><br><br>
Tên loại:&ensp;&emsp;&emsp;	<input type="text" name = "maloaitin"value ="<?php echo $hang['maloaitin'];?>"><br><br>
Mô tả tin:&ensp;&emsp;&emsp;	<input type="text" name = "motatin"value ="<?php echo $hang['MoTa'];?>"><br><br>
hình ảnh :&ensp;&emsp;&emsp;	<input type="text" name = "hinhanh"value ="<?php echo $hang['hinhanh'];?>"><br><br>
Nội dung:&nbsp;&emsp;&emsp;	
				<textarea name="editor1" id="editor1" rows="10" cols="80">
					<?php echo $hang['noidung'];?>
                </textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            <br><br>	
&emsp;&emsp;&emsp;			<input type="submit" name ="sua" value="Lưu lại">
</form>
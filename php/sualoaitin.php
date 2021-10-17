<head><title>Sửa loại tin</title></head>

<?php
require("ketnoi.php");
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_GET['maloai'])){
		$maloai
		=$_GET['maloai'];
		}

	if(isset($_POST['sua'])){
		$maloai= $_POST['maloai'];
		$tenloai= $_POST['tenloai'];
	
		
		if($maloai !="" && $tenloai !=""){
			$sql="UPDATE loaitin SET maloai='$tenloai', ' where maloai = '$maloai'"; 
			$ketqua=mysqli_query($link,$sql);
			header("location: themsuaxoa.php");
		}
	}
}
?>
<?php
	$maloai=$_GET['maloai'];
	$sql ="SELECT *FROM loaitin where maloai = '$maloai'";
	$ketqua = mysqli_query($link,$sql) ;
	$hang = mysqli_fetch_array($ketqua);

?>

<form method="POST" action = "">
Mã tin:&emsp;&emsp;&emsp; 	<input type="text" name = "maloai"value ="<?php echo $hang['maloai'];?>"><br><br>
Tiêu đề:&emsp;&emsp;&emsp;	<input type="text" name = "tenloai"value ="<?php echo $hang['tenloai'];?>"><br><br>

            <br><br>	
&emsp;&emsp;&emsp;			<input type="submit" name ="sua" value="Lưu lại">
</form>
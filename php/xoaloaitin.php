<?php
require("ketnoi.php");
?>
<?php
	if(isset($_GET["maloai"])){
		$maloai=$_GET["maloai"];
	}
?>
<?php
	$sql ="DELETE FROM loaitin where maloai = '$maloai'";
	$ketqua = mysqli_query ($link,$sql);
	header("location: themsuaxoa.php")
?>
<?php
require("ketnoi.php");
?>
<?php
	if(isset($_GET["matin"])){
		$matin=$_GET["matin"];
	}
?>
<?php
	$sql ="DELETE FROM tintuc where matin = '$matin'";
	$ketqua = mysqli_query ($link,$sql);
	$sql1 ="DELETE FROM luotxem where MaTin = '$matin'";
	$ketqua = mysqli_query ($link,$sql1);
	header("location: themsuaxoa.php")
?>
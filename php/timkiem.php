<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Phương Uyên</title>
	<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/index.css">
	<link rel="stylesheet" href="../css/responsize.css">
</head>

<body>
	<header>
		<div class="headerTop">
			<div class="headerAvatar">
				<img src="../img/HeaderAvatar.png" alt="">
			</div>
			<ul class="dangnhap">
				<li class="list-dangnhap"><a href="./lienket.php" class="dangnhap-link"> đăng nhập |</a></li>
				<li  class="list-dangnhap"><a href="./dangky.php" class="dangnhap-link"> đăng ký</a></li>
			</ul>
		</div>
	</header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse " id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="./trangchu.html">Trang Chủ</a>
					</li>
					<?php 
						require('./ketnoi.php');
						$sql = "SELECT * FROM loaitin";
						if($result = mysqli_query($link,$sql)){
							$detail=mysqli_fetch_array($result);
									do{
										echo '
											<li class="nav-item">
											<a class="nav-link" href="./the-loai-'.$detail['maloai'].'.html">'.$detail['tenloai'].'</a>
											</li>
											';
									}while($detail=mysqli_fetch_assoc($result));
						}else{
							echo '<h2>không tìm thấy từ khóa</h2>';
						}
						
					?>
				</ul>
				<form class="form-inline my-2 my-lg-0 " class="form-inline" action="./timkiem.php" method="post">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="tukhoa">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			
		</div>
	</nav>
	<section>
    <div class="container p-2 background ">
        <?php 
                require('./ketnoi.php');
                if ($_SERVER["REQUEST_METHOD"] == "POST") { //Lấy giá trị POST từ form vừa submit
                    if(isset($_POST["tukhoa"])) { $a = $_POST['tukhoa']; };
                    echo '
                        <div class="Post_Search">
                        <h2>Từ khóa bạn tìm kiếm là: '.$a .' </h2>
                        </div>
                        <div class="row">  
                    ';
                    //Code xử lý, 
                        $sql = "SELECT * FROM tintuc WHERE tieude like '%$a%'";
                    if($result = mysqli_query($link,$sql)){
                        $detail=mysqli_fetch_array($result);
                        if($detail>0){
                                do{
                                    echo '
                                        <div class="col-md-4 col-12 mt-3">
                                            <a href="./detail.php?matin='.$detail['matin'].'" class="link">
                                                <div class="list-tin ">
                                                    <div class="tin-img">
                                                        <img src="../img/'.$detail['hinhanh'].'" alt="">
                                                    </div>
                                                    <div class="tin-right">
                                                        <div class="tin-title">
                                                            '.$detail['tieude'].'
                            
                                                        </div>
                                                        <div class="tin-mota">
                                                            '.$detail['MoTa'].'
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    ';
                                }while($detail=mysqli_fetch_assoc($result));
                            }else{
                                echo '<h4> không tìm thấy từ khóa</h4>';
                            }
                        }else{
                            echo '<h4> hông tìm thấy từ khóa</h4>';
                        }
                        echo'</div>';
                    }
        
        ?>
    </div>
	</section>

	<footer>
		<div class="footer">
			<ul class="menu">
				<li class="menu-item">
					<a class="menu-link" href="./trangchu.php">Trang Chủ </a><span class="link-gach">|</span>
				</li>
				<li class="menu-item ">
					<a class="menu-link" href="./list.php?matin=1">Tin Mới </a><span class="link-gach">|</span>
				</li>
				<li class="menu-item ">
					<a class="menu-link" href="./list.php?matin=2">Thể thao </a><span class="link-gach">|</span>
				</li>
				<li class="menu-item ">
					<a class="menu-link" href="./list.php?matin=3">xã hội  </a><span class="link-gach">|</span>
				</li>
				<li class="menu-item ">
					<a class="menu-link" href="./list.php?matin=4">sức khỏe </a><span class="link-gach">|</span>
				</li>
				<li class="menu-item ">
					<a class="menu-link" href="./list.php?matin=5">pháp luật</a>
				</li>
			</ul>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<h6 class="footerTitle">Chịu trách nghiệm quản lý nội dung</h6>
					<p> Uyên Vũ</p>
					<h6 class="footerTitle">Hợp tác truyền thông</h6>
					<div><i class="fas fa-phone"></i> 0338303808</div>
					<p><i class="fas fa-envelope"></i> uyenhung000@gmail.com </p>
					<h6 class="footerTitle">Liên hệ quảng cáo</h6>
					<div><i class="fas fa-phone"></i> 0338303808</div>
					<p><i class="fas fa-envelope"></i>uyenhung000@gmail.com </p>
				</div>
				<div class="col-md-4 hidden-sm hidden-xs">
					<h6 class="footerTitle">Vận hành bởi</h6>
					<p>© Copyright 2007 - 2021 – CÔNG TY CỔ PHẦN Uyên Vũ</p>
					<p>Giấy phép số 2215/GP-TTĐT do Sở Thông tin và Truyền thông Hà Nội cấp ngày 10 tháng 4 năm 2019</p>
				</div>
				<div class="col-md-4 hidden-xs footer-img">
					<img src="../img/HeaderAvatar.png" alt="">
				</div>
			</div>
		</div>
	</footer>
</body>
<script src="../js/jquery.js"></script>
<script src="../boostrap/js/bootstrap.min.js"></script>

</html>
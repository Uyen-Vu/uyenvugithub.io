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
				<form class="form-inline my-2 my-lg-0" action="./timkiem.php" method="post">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="tukhoa">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			
		</div>
	</nav>
	<section>
		<div class="container p-2 background ">
			<div class="row">
                <div class="col-md-8 col-sm-12">
				<!-- tăng lượt xem của tin trong bảng lượt xem từ  $_GET['matin'] lấy về -->
				<?php 
					require('./ketnoi.php');
					mysqli_query($link,"UPDATE luotxem set LuotXem = (LuotXem+1) WHERE MaTin='". $_GET['matin'] ."'");
				?>
	
						<?php  require('./ketnoi.php');
						// lấy tất cả thông tin từ bảng tin tức có matin =  $_GET['maloai'] và ỉn ra các thông tin
						$sql = "SELECT * FROM tintuc WHERE matin='" . $_GET['matin'] . "'";
								if($result = mysqli_query($link,$sql)){
									while($detail = mysqli_fetch_array($result)){
										echo '
										<div class="title" title="title">
											<a href="./detail.php?matin='. $detail['matin']. '" class="title-link" ><h2>'. $detail['tieude']. '</h2></a>
										</div>
										<div class="title-author">
											<span>
												Tác giả - '. $detail['tacgia']. '
											</span>
											<span>
											'. $detail['ngayviet']. '
											</span>
										</div>
										<div class="detail">
										'. $detail['noidung']. '
										</div>
										';
									}
								}else
									echo 'ket noi that bai' . mysqli_error($connect);
						?>
                </div>
                <div class="col-md-4">
                    <div class="content">
                        <h4>tin xem nhiều</h4>
                    </div>
					<!-- gộp 2 bảng lượt xem và bảng tin tức lấy 4 hàng có lượt xem cao nhất -->
                    <?php 
					$sql5 = "SELECT *,luotxem.LuotXem
					FROM tintuc
					INNER JOIN luotxem ON tintuc.matin=luotxem.MaTin
					group by LuotXem desc
					limit 4
					";
						if($result = mysqli_query($link,$sql5)){
							while($detail5 = mysqli_fetch_array($result)){
								// ỉn ra thông tin các hàng
								echo '
									<div class=" mt-3">
										<a href="#" class="link">
											<div class="list-tin ">
												<div class="tin-img">
													<img src="../img/'.$detail5['hinhanh'].'" alt="">
												</div>
												<div class="tin-right">
													<div class="tin-title">
													'.$detail5['tieude'].'
						
													</div>
													<div class="tin-mota">
													'.$detail5['MoTa'].'
													</div>
												</div>
											</div>
										</a>
									</div>
									
								';
							}
						}else{
							echo 'ket noi that bai' . mysqli_error($link);
						}
					?>
					<!-- nhúng fb và youtobbe -->
					
					<div class="mt-3 hidden-xs">
					<iframe width="300" height="200" src="https://www.youtube.com/embed/AHX1mMuABgk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>

					<div class="mt-3 hidden-xs">
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FUy%25C3%25AAn-V%25C5%25A9-108663021495454%2F&tabs=timeline&width=300px&height=150px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="350px" height="130px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
					</div>


                </div>
            </div>
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
					<div><i class="fas fa-phone"></i>  0338303808 </div>
					<p><i class="fas fa-envelope"></i> uyenhung000@gmail.com </p>
					<h6 class="footerTitle">Liên hệ quảng cáo </h6>
					<div><i class="fas fa-phone"></i> 0338303808 </div>
					<p><i class="fas fa-envelope"></i> uyenhung000@gmail.com </p>
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
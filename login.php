<?php
session_start();
unset($_SESSION['ms']);
$conn = mysqli_connect("localhost", "root", "", "ql_csvctb");
$setLang = mysqli_query($conn, "SET NAMES  'utf8'");
if (!$conn) {
    die('Lỗi kết nối database');
}
	$errors = array();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$ms = isset($_POST['ms']) ? $_POST['ms']:null;
		$password = isset($_POST['password']) ? $_POST['password']:null;
		if(empty($ms)){
			array_push($errors, "Nhập MSNV/QL");
		}
		if(empty($password)){
			array_push($errors, "Nhập mật khẩu");
		}
		if(empty($errors)){
			global $conn;
			$sql = "SELECT * FROM nv_ql WHERE idNV_QL='$ms' AND matkhau ='$password' ";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) == 1){
				$value = mysqli_fetch_assoc($result);
				$_SESSION['ms']=$value['idNV_QL'];
				$_SESSION['role']=$value['quyen'];
				$_SESSION['ten']=$value['hoten'];	
				header('location: trangchu.php');
			}
			else{
			$mess1 = "Mã số NV/QL hoặc mật khẩu sai";
			}
		}
	}
	
 ?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>QLCSVC - Đăng nhập</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <img style="width: 300px; height: 450px" src="../Project2/img/0.png" >
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Viện CNTT- ĐH Bách Khoa HN!</h1>
                    <h1 class="h4 text-gray-900 mb-4">Trang quản lý Cơ sở vật chất - Thiết bị</h1>
                  </div>
                  <?php if(count($errors)) {?>
            <?php foreach($errors as $error) {?>
              <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
              </div>
            <?php } ?>
          <?php } ?>
          <?php if(isset($mess)) {?>
            <div class="alert alert-success" role="alert">
              <?php 
			  
			  header('location: trangchu.php'); ?>
            </div>
          <?php } ?>
          <?php if(isset($mess1)) {?>
            <div class="alert alert-success" role="alert">
              <?php echo $mess1;
			  
			  ?>
            </div>
          <?php } ?>
                  <form class="user"  method="post" action="" >
                    <div class="form-group">
                      <input type="text" name="ms" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="MSNV/MSQL">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        
                      </div>
                    </div>
                    
                    <button type="submit"  class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                      
                   </form>
                    <hr>
                    
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  

</body>

</html>

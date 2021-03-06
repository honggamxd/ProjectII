<?php include('Server.php');

if (isset($_SESSION['role']) == true) {
    $role = $_SESSION['role'];
}
if ($role == '0') {
    header('Location: Error.php');
}

$ms = $_SESSION['ms'];
$user = getUserbyId($ms);
$values = getUser();
$errors = array();
if (isset($_GET['search'])) {
    $key = isset($_GET['keyword']) ? $_GET['keyword'] : null;
    header('Location: search.php?search=' . $key);
}

if( isset($_POST['submit']) ){
    foreach ($values as $key => $user) {

        $hoten = isset($_POST['hoten'.$key]) ? $_POST['hoten'.$key] : null;
        $chucvu = isset($_POST['chucvu'.$key]) ? $_POST['chucvu'.$key] : null;
        $DV = isset($_POST['DV'.$key]) ? $_POST['DV'.$key] : null;
        $quyen = isset($_POST['quyen'.$key]) ? $_POST['quyen'.$key] : null;
        $idNV_QL = $user['idNV_QL'];

        global $conn;
        $sql = "UPDATE nv_ql SET hoten ='$hoten', chucvu ='$chucvu', DV ='$DV', quyen ='$quyen' WHERE idNV_QL = '$idNV_QL'";
        $result = mysqli_query($conn, $sql);
    }
    header('Location: quanly.php');
}
if( isset($_POST['save']) ){
        $hoten = isset($_POST['hoten']) ? $_POST['hoten'] : null;
        $chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : null;
        $idNV_QL = isset($_POST['idNV_QL']) ? $_POST['idNV_QL'] : null;
        $matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : null;
        $DV = isset($_POST['DV']) ? $_POST['DV'] : null;
        $quyen = isset($_POST['quyen']) ? $_POST['quyen'] : null;

    global $conn;
    $sql = "SELECT * FROM nv_ql WHERE idNV_QL = '$idNV_QL' LIMIT 1";
    $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_assoc($result);
    if(empty($hoten)){
        array_push($errors, "Nhâp họ tên");
    }
    if(empty($matkhau)){
        array_push($errors, "Nhập mật khẩu");
    }
    if(empty($quyen)){
        array_push($errors, "Nhập quyền truy nhập");
    }
    if($user['idNV_QL'] == $idNV_QL){
        array_push($errors, "Mã NV/QL đã tồn tại");
    }
    else{
        global $conn;
        $sql = "INSERT INTO nv_ql(idNV_QL,chucvu,hoten,DV,matkhau,quyen) VALUE ('$idNV_QL','$chucvu','$hoten','$DV','$matkhau','$quyen')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            header('Location: quanly.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QLCSVC - Quản lý nhân viên</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="trangchu.php">
            <div class="sidebar-brand-icon rotate-n-15">

            </div>
            <div class="sidebar-brand-text mx-3"> SOICT <br> <sup>Quản lí CSVC/TB</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="xuatdulieu.php" data-toggle="collapse" data-target="#collapsePages1"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Trích xuất dữ liệu</span></a>
            <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="xuatdl-pb.php">Dữ liệu phòng ban</a>
                    <a class="collapse-item" href="xuatdl-tb.php">Dữ liệu các thiết bị</a>
                    <a class="collapse-item" href="dexuatthanhly.php">Đề xuất thanh lý</a>
                </div>
            </div>
        </li>

        <!-- Divider -->

        <!-- Heading -->

        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>QL Thiết bị</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="themthietbi.php">Thêm thiết bị</a>
                    <a class="collapse-item" href="thongketb.php">Thống kê</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Utilities Collapse Menu -->
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-folder"></i>
                <span>QL Phòng ban</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="thongtinpb.php">Thông tin</a>
                    <a class="collapse-item" href="capnhatpb.php">Cập nhật dữ liệu</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider my-0">


        <!-- Heading -->

        <!-- Nav Item - Pages Collapse Menu -->
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="kiemke.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Kiểm kê</span></a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="quanly.php">
                <i class="fas fa-fw fa-cog"></i>
                <span>Quản lý Nhân viên</span></a>
        </li>
        <!-- Nav Item - Charts -->


        <!-- Nav Item - Tables -->


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form method="get" action=""
                      class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control bg-light border-0 small"
                               placeholder="Tìm kiếm phòng/thiết bị" aria-label="Search"
                               aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="search">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Tìm kiếm thiết bị..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->


                    <!-- Dropdown - Alerts -->


                    <!-- Nav Item - Messages -->

                    <!-- Dropdown - Messages -->


                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['hoten']; ?></span>
                            <img class="img-profile rounded-circle" src="img/Capturec.JPG">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal1">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Thông tin
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Đăng xuất
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Quản lý nhân viên </h1>


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#insertModal1">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    <?php if(count($errors)) {?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo "Thêm mới không thành công"; ?>
                                            </div>
                                        <?php foreach($errors as $error) {?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo $error; ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
<!--                                    --><?php //if( count($errors) == 0) {  ?>
<!--                                    <div class="alert alert-danger" role="alert">-->
<!--                                        --><?php //echo "Thêm mới thành công"; ?>
<!--                                    </div>-->
<!--                                    --><?php //} ?>


                                    <h5> Thêm mới </h5>
                                </a>
                                <br>
                                <h5> Chỉnh sửa </h5>
                                <br>
                                <form method="post" action="">
                                    <div class="col-sm-12 col-md-6">
                                        <div id="dataTable_filter" class="dataTables_filter"></div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                           cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                           style="width: 100%;">
                                        <tr role="row">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    style="width: 10%;">Mã NV/QL
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    style="width: 20%;">Tên
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 20%;">Chức vụ
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 30%;">Đơn vị
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 10%;">Quyền
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 10%;">
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php foreach ($values as $key => $user) { ?>
                                            <tr role="row" class="odd">
                                                <td><?php echo $user["idNV_QL"] ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" value="<?php echo $user["hoten"] ?>"
                                                               class="form-control" id="exampleInputPassword1"
                                                               name="hoten<?php echo $key ?>" placeholder="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                                               name="chucvu<?php echo $key ?>" value="<?php echo $user["chucvu"] ?>"
                                                               placeholder="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                                               name="DV<?php echo $key ?>" value="<?php echo $user["DV"] ?>"
                                                               placeholder="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                                               name="quyen<?php echo $key ?>" value="<?php echo $user["quyen"] ?>"
                                                               placeholder="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <a class="btn btn-primary" href="delete.php?idNV_QL=<?php echo $user['idNV_QL'];?>">Xoá</a>
                                                    </div>
                                                </td>
                                                <?php } ?>

                                            </tbody>
                                    </table>
                                </div>
                                <div class="form-group form-check">

                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thoát?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
                <a class="btn btn-primary" href="login.php">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
           aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Họ tên : <?php echo $user['hoten'] ?></h5>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chức vụ : <?php echo $user['chucvu'] ?></h5>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đơn vị : <?php echo $user['DV'] ?></h5>
            </div>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

    </div>
</div>
<div class="modal fade" id="insertModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="col-lg-7">
                <div class="p-5">
            <form method="post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã NV/QL</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="idNV_QL" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           name="hoten" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chức vụ</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                           name="chucvu" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Quyền</label>
                    <select name="quyen" aria-controls="dataTable"
                            class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="0">NV/QL</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Đơn vị</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                           name="DV" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" id="exampleInputPassword1"
                           name="matkhau" placeholder="">
                </div>

                <div class="form-group form-check">

                </div>
                <button type="submit" name="save" class="btn btn-primary">Lưu</button>
            </form>
        </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

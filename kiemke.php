<?php include('Server.php'); ?>
<?php $ms = $_SESSION['ms'];
    $user = getUserbyId($ms);
    $values = getKiemke();
    if(isset($_GET['search'])){
    $key = isset($_GET['keyword']) ? $_GET['keyword'] : null;
    header('Location: search.php?search='.$key);}

    $errors = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idNV_QL = isset($_POST['idNV_QL']) ? $_POST['idNV_QL'] : null;
    $date = isset($_POST['date']) ? $_POST['date'] : null;
    $diadiem = isset($_POST['diadiem']) ? $_POST['diadiem'] : null;
    if (empty($idNV_QL)) {
        array_push($errors, "Điền tên NV kiểm kê");
    }
    if (empty($date)) {
        array_push($errors, "Nhập ngày kiểm kê");
    }
    if (empty($diadiem)) {
        array_push($errors, "Nhập phòng kiểm kê");
    }
    if (empty($errors)) {
        global $conn;
        $sql = "INSERT INTO kiemke(idNV_QL,date,diadiem) VALUE ('$ms','$date','$diadiem')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $sqll = "SELECT * FROM kiemke WHERE idNV_QL='$ms' AND date ='$date' AND diadiem = '$diadiem' ";
            $result1 = mysqli_query($conn,$sqll);
            $kk = mysqli_fetch_assoc($result1);
            $idkk = $kk["idkk"];
            $_SESSION['idkk'] = $idkk;
            header('Location: kiemketb.php?id='.$idkk);
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

    <title>QLCSVC - Kiểm kê</title>

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


        <!-- Nav Item - Pages Collapse Menu -->
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>QL Thiết bị</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item " href="themthietbi.php">Thêm thiết bị</a>
                    <a class="collapse-item" href="thongketb.php">Thống kê</a>
                </div>
            </div>
        </li>

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


        <!-- Heading -->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active ">
            <a class="nav-link" href="kiemke.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Kiểm kê</span></a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
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
                <form method="get" action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Tìm kiếm phòng/thiết bị" aria-label="Search" aria-describedby="basic-addon2">
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
                            <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#logoutModal1">
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

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"> Kiểm kê - Lịch sử kiểm kê</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">

                    </div>
                    <div class="card-body">
                        <!------------------>
                        <div class="row">

                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h3>Lịch sử kiểm kê</h3>
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <div id="dataTable_wrapper"
                                                         class="dataTables_wrapper dt-bootstrap4">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-6">
                                                                <div class="dataTables_length" id="dataTable_length">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6">
                                                                <div id="dataTable_filter"
                                                                     class="dataTables_filter"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-bordered dataTable"
                                                                       id="dataTable" width="100%" cellspacing="0"
                                                                       role="grid" aria-describedby="dataTable_info"
                                                                       style="width: 100%;">
                                                                    <thead>
                                                                    <tr role="row">
                                                                        <th class="sorting_asc" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending"
                                                                            style="width: 57px;">Địa điểm
                                                                        </th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Office: activate to sort column ascending"
                                                                            style="width: 50px;">Ngày
                                                                        </th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Age: activate to sort column ascending"
                                                                            style="width: 31px;">NV Kiểm kê
                                                                        </th>
                                                                    </thead>

                                                                    <tbody>
                                                                    <?php foreach ($values as $key => $tb) { ?>
                                                                    <tr role="row" class="odd">
                                                                        <td><?php echo $tb["diadiem"] ?></td>
                                                                        <td><?php echo $tb["date"] ?></td>
                                                                        <td><?php echo $tb["hoten"] ?></td>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!--                                                        -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="p-5">
                                <div class="text-center">
                                    <h3>Kiểm kê</h3>
                                    <?php if(count($errors)) {?>
                                        <?php foreach($errors as $error) {?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo $error; ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                </div>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NV kiểm kê</label>
                                        <input name="idNV_QL" type="text" class="form-control"
                                               value="<?php echo $user['hoten'] ?>" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" placeholder="">

                                    </div>
                                    <div class="form-group" >
                                        <label>Địa điểm<select name="diadiem" aria-controls="dataTable"
                                                               class="custom-select custom-select-sm form-control form-control-sm">
                                                <?php
                                                global $conn;
                                                $sql = "SELECT * FROM phongbann";
                                                $result = mysqli_query($conn, $sql);
                                                $values = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                foreach ($values as $value) { ?>
                                                    <option value="<?php echo $value['Diadiem']; ?>"><?php echo $value['Diadiem']; ?></option>
                                                <?php } ?>
                                            </select></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ngày</label>
                                        <input type="date" name="date" class="form-control" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" placeholder="">

                                    </div>


                                    <div class="form-group form-check">

                                    </div>
                                    <button type="submit" class="btn btn-google btn-user btn-block">Tiến hành kiểm kê</button>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!----------------->
    <!-- /.container-fluid -->

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
<div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

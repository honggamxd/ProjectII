<?php
    session_start();

    if (isset($_SESSION['ms']) == false) {
        header('Location: login.php');
    }


    $conn = mysqli_connect("localhost", "root", "", "ql_csvctb");
    $setLang = mysqli_query($conn, "SET NAMES  'utf8'");
    if (!$conn) {
        die('Lỗi kết nối database');
    }

    define('ROOT_PATH', realpath(dirname(__FILE__)
    ));
    define('BASE_URL', 'http://localhost/Project2/public');
    function getUser()
    {
        global $conn;
        $sql = "SELECT * FROM nv_ql ";
        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $values;
    }
    function getUserbyId($id)
    {
        global $conn;
        $sql = "SELECT * FROM nv_ql WHERE idNV_QL ='$id'";
        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($result);
        return $values;
    }

    function getPhongban()
    {

        global $conn;
        $sql = "SELECT * FROM phongbann ";
        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $values;
    }

    function getTB()
    {

        global $conn;
        $sql = "SELECT thietbi.*, phongbann.Diadiem, phongbann.ĐVSD FROM thietbi INNER JOIN phongbann ON phongbann.idPhongban = thietbi.idPhongban WHERE thietbi.status='1'";
        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $values;
    }

    function getTBthanhly()
    {

        global $conn;
        $sql = "SELECT thietbi.*, phongbann.Diadiem, phongbann.ĐVSD FROM thietbi INNER JOIN phongbann ON phongbann.idPhongban = thietbi.idPhongban WHERE thietbi.status='0'";
        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $values;
    }

    function getTBbyPhong($diadiem)
    {
        global $conn;
        $sql = "SELECT thietbi.*, phongbann.Diadiem, phongbann.ĐVSD FROM thietbi INNER JOIN phongbann ON phongbann.idPhongban = thietbi.idPhongban WHERE thietbi.status='1' AND phongbann.Diadiem ='$diadiem'";
        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $values;
    }

    function getKiemke()
    {

        global $conn;
        $sql = "SELECT kiemke.*, nv_ql.hoten FROM kiemke INNER JOIN nv_ql ON kiemke.idNV_QL = nv_ql.idNV_QL";
        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $values;
    }

?>
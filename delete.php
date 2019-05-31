<?php include('Server.php');
$id =$_GET['idNV_QL'];
global $conn;
$sql = "DELETE FROM nv_ql WHERE idNV_QL = '$id'";
$result = mysqli_query($conn, $sql);
if($result) {
    header('Location: quanly.php');
}
?>
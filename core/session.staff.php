<?php
// session của id nhân viên hoặc quản lý
$id = isset($_SESSION["staff_id"]) ? $_SESSION["staff_id"] : NULL;

// kiểm tra xem mã nhân viên này có tồn tại trên hệ thống không?
// không thì destroy(phá huỷ phiên) rồi chuyển ra màn hình đăng nhập
if($id){
    $kiemtra = query("SELECT * FROM NHANVIEN WHERE id = '{$id}'");
    if($kiemtra->num_rows === 0){
        session_destroy();
        header("Location: /login.php");
        die();
    }
}
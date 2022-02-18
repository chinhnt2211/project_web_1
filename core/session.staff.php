<?php
// session của id nhân viên hoặc quản lý
$sid = isset($_SESSION["staff_id"]) ? $_SESSION["staff_id"] : NULL;
$slevel = isset($sid) ? $_SESSION["staff_level"] : NULL;
$sname = isset($sid) ? $_SESSION["staff_name"] : NULL;

// kiểm tra xem mã nhân viên này có tồn tại trên hệ thống không?
// không thì destroy(phá huỷ phiên) rồi chuyển ra màn hình đăng nhập
if($sid){
    $kiemtra = query("SELECT * FROM NHANVIEN WHERE id = '{$sid}'");
    if($kiemtra->num_rows === 0){
        session_destroy();
        header("Location: /login.php");
        exit();
    }
}
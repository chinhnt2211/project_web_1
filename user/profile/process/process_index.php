<?php
// Ham xu ly anh
function procesImage()
{
    // Kiểm tra dữ liệu có bị lỗi không
    if ($_FILES["avatar"]['error'] != 0) {
        return NULL;
    }

    $imageFileType = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir    = "uploads/images/avatar/";
    $target_file   = $target_dir . basename($_SESSION["id"] . "." . $imageFileType);
    $allowUpload   = true;
    $maxfilesize   = 9000000;
    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if ($check == false || !in_array($imageFileType, $allowtypes) || ($_FILES["avatar"]["size"] > $maxfilesize)) {
        $allowUpload = false;
    }

    if ($allowUpload) {
        // Xoa nhung avatar đã tồn tại
        $nameAvatar = glob("$target_dir/$_SESSION[id].*");
        foreach ($nameAvatar as $file) {
            unlink($file);
        }
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $_SESSION['error'] = "Có lỗi xảy ra khi upload file.";
            return NULL;
        }
    } else {
        $_SESSION['error'] = "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
        return NULL;
    }
    $path = DOMAIN . "user/profile/" . $target_file;
    return $path;
}

// Xu ly form update
if (!isset($_SESSION["id"])) {
    header("location: ../../index.php");
}
$sql = "SELECT * FROM KHACHHANG
WHERE id = '$_SESSION[id]'";
$result = select($sql)[0];
$name = $result["hoten"];
$phone_number = $result["sodienthoai"];
$address = $result["diachi"];
$avatar = $result["anh"];
$email = $result["email"];
$birthday = date_create($result["ngaysinh"]);
// Xử lí ngày tháng 
if ($birthday == NULL) {
    $year = (int)date('Y');
    $month = (int)date('m');
    $day = (int)date('d');
} else {
    $year = (int)date_format($birthday, "Y");
    $month = (int)date_format($birthday, "m");
    $day = (int)date_format($birthday, "d");
}
if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) {
    $dayNum = 31;
} else if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
    $dayNum = 30;
} else {
    // If month is February, calculate whether it is a leap year or not
    if ($year % 4 == 0) {
        $dayNum = 29;
    } else {
        $dayNum = 28;
    }
}

if ($result["gioitinh"] == NULL) {
    $gender = 0;
} else {
    $gender = $result["gioitinh"];
}
// Kiem tra thong tin thay doi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    unset($_SESSION["error"]);

    $name = addslashes($_POST['name']);
    $phone_number = addslashes($_POST['phone_number']);
    $address = addslashes($_POST['address']);
    $checkAvatar = false;
    $gender = addslashes($_POST['gender']);
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $birthday = strtotime("$year"."/"."$month"."/"."$day");
    // Kiem tra co avatar khong
    if (isset($_FILES["avatar"])) {
        $checkAvatar = procesImage();
        if ($checkAvatar) {
            $avatar = addslashes($checkAvatar);
        }
    }
    

    $id = $_SESSION['id'];
    update("KHACHHANG", [
        "hoten" => "$name",
        "sodienthoai" => "$phone_number",
        "diachi" => "$address",
        "anh" => "$avatar",
        "gioitinh" => "$gender",
        "ngaysinh" => date('Y-m-d', $birthday)
    ], "`id` = '$id'");
    // $sql = "update KHACHHANG 
    // set 
    //     hoten = '$name' , sodienthoai = '$phone_number' , diachi = '$address' , anh = '$avatar'
    // where 
    //     id = '$id'";
    // query($sql);
    $_SESSION['name'] = $name;
    $_SESSION['avatar'] = $avatar;
    if (empty($_SESSION["error"])) header("location:../index.php");
}

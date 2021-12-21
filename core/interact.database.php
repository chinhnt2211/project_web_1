<?php
require_once __DIR__ . "/connect.php";

// hàm thêm 
// cách dùng
/*
    insert("nhanvien", [
        "id" => 1,
        "hoten" => "Nguyễn Văn A",
        "sodienthoai" => "0123455689",
        "diachi" => "Ở đâu đó",
        "anh" => "/assets/source/avatar/avatar-1.png",
        ...
    ])
*/
function insert(string $table, array $data): int
{
    global $mysqli;
    $column = [];
    $value = [];

    foreach ($data as $key => $val) {
        array_push($column, "`$key`");
        array_push($value, "'$val'");
    }

    $fullcolumn = "(" . join(",", $column) . ")";
    $fullvalue = "(" . join(",", $value) . ")";

    $query = "INSERT INTO `{$table}` {$fullcolumn} VALUES {$fullvalue}";

    $mysqli->query($query);

    return $mysqli->insert_id;
}


// hàm xoá
// cách dùng
/*
    delete("NHANVIEN", "`id` = '1'");
    - phải bắt buộc có 2 đối số
    - 1 đối số tên bảng thì bị xoá tất cả dữ liệu của bảng đo1
    - đối số 2 là điều kiện
*/
function delete(string $table, string $where = ""): void
{
    global $mysqli;
    $queryWhere = strlen($where) > 0 ? " WHERE " . $where : "";
    $query = "DELETE FROM `{$table}`{$queryWhere}";

    $mysqli->query($query);
}


// hàm cập nhật
// cách dùng
/*
    update("NHANVIEN", [
        "hoten" => "Nguyễn Văn B"
    ], "`id` = '1'");
    - cập nhật bảng nhân viên có id = 1 thành hoten = "Nguyễn Văn B"
    - bắt buộc đủ 3 tham số, nếu không tất cả nhân viên sẽ bị đổi thành tên Nguyễn Văn B
*/
function update(string $table, array $data, string $where): void
{
    global $mysqli;

    $queryWhere = strlen($where) > 0 ? " WHERE " . $where : "";
    $dataUpdate = [];

    foreach ($data as $key => $val) {
        array_push($dataUpdate, "`$key` = '{$val}'");
    }

    $fullDataUpdate = join(",", $dataUpdate);

    $query = "UPDATE `{$table}` SET {$fullDataUpdate}{$queryWhere}";

    $mysqli->query($query);
}

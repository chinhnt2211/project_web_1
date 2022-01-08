# Đồ Án 1
*Một dự án về web bán hàng rất là cơ bản*
## HƯỚNG DẪN SỬ DỤNG
Clone github
```
git clone https://github.com/chinhnt2211/project_web_1.git
```

Chỉnh sửa file `config.php` trong thư mục `core/config.php`
```
define("DOMAIN" , 'http://localhost/PHP_WEB/project_web_1/');
define('HOST', '127.0.0.1');
define('USERNAME', 'root');
define('PASSWORD', '22112002');
define('DATABASE', 'project_web_1');
```
>+ `DOMAIN` : Địa chỉ đặt dự án 
>+ `HOST` : Địa chỉ CSDL
>+ `USERNAME` : Username CSDL
>+ `PASSWORD` : Password CSDL
>+ `DATABASE` : Database CSDL
## BÁN HÀNG ĐIỆN TỬ
*Chú ý*
>Mọi tài liệu thông tin đều được lưu vào thư mục [Document](/Document)
### 1. Đối tương sử dụng:
***Khác hàng không tài khoản***

>+ Tìm kiếm theo tên sản phẩm
>+ Xem tất cả, chi tiết sản phẩm
>+ Đăng ký

***Khách hàng có tài khoản:***

>+ Tất cả chức năng của không tài khoản
>+ Đăng nhập, đăng xuất
>+ Quản lí giỏ hàng(thêm, sửa số lượng, xóa) (dùng Session)
>+ Đặt hàng, xem hóa đơn
>+ Đánh giá sản phẩm đã mua.

***Nhân viên***

>+ Đăng nhập, đăng xuất
>+ Thêm sản phẩm
>+ Thay đổi tình trạng đơn (Đang chờ - Đã duyệt/Bị hủy – Đang giao – Đã giao ) 

***Quản lý***

>+ Đầy đủ của nhân viên
>+ Quản lý nhà sản xuất(xem, thêm, sửa)
>+ Quản lý sản phẩm(xem, thêm, sửa, xóa)
>+ Quản lý nhân viên(xem, thêm , sửa, xóa)


### 2. Quan hệ thực thể

<img src = "./Document/Quan hệ thực thể .png"  witdh = ""/>



### 3. Bảng Database 

<img src = "./Document/Database.png" witdh  = "100%">


  
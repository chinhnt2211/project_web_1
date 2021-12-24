CREATE DATABASE `project_web_1` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `project_web_1`;

CREATE TABLE NHANVIEN (
    id int NOT NULL primary key auto_increment,
    hoten varchar(100) not null,
    sodienthoai varchar(15) not null,
    diachi varchar(200) not null,
    email varchar(100) not null,
    matkhau varchar(32) not null,
    anh varchar(100),
    capdo int(1) not null
);

ALTER TABLE nhanvien
ADD CONSTRAINT UC_NHANVIEN_email UNIQUE (email)

CREATE TABLE KHACHHANG(
    id int NOT NULL primary key auto_increment,
    hoten varchar(100) not null,
    sodienthoai varchar(15) not null,
    diachi varchar(200) not null,
    email varchar(100) not null,
    matkhau varchar(32) not null,
    anh varchar(100)
);

CREATE TABLE HOADON(
    id int not null primary key auto_increment,
    id_khachang int not null,
    id_nhanvien int null,
    diachinhan varchar(200) not null,
    hotennhan varchar(100) not null,
    sodienthoainhan varchar(15) not null,
    thoigiandat varchar(15) not null,
    tongtien int(15) not null,
    trangthaidon int(1) not null,
    constraint fk_hoadon_kh foreign key (id_khachang) references KHACHHANG(id),
    constraint fk_hoadon_nv foreign key (id_nhanvien) references NHANVIEN(id)
);
-- dùng unixtime

CREATE TABLE THELOAI(
    id int not null primary key auto_increment,
    ten varchar(100) not null
);

CREATE TABLE NHASANXUAT(
    id int not null primary key auto_increment,
    ten varchar(100) not null
);

CREATE TABLE SANPHAM(
    id int not null primary key auto_increment,
    ten varchar(100) not null,
    mota text not null,
    anh varchar(100),
    gia int(15),
    id_nhasanxuat int not null,
    id_theloai int not null,
    constraint fk_sanpham_nsx foreign key (id_nhasanxuat) references NHASANXUAT(id),
    constraint fk_sanpham_tl foreign key (id_theloai) references THELOAI(id)
);

CREATE TABLE HOADONCHITIET(
    id_hoadon int not null,
    id_sanpham int not null,
    soluong int,
    primary key (id_hoadon, id_sanpham),
    constraint fk_hoadonchitiet_hd foreign key (id_hoadon) references HOADON(id),
    constraint fk_hoadonchitiet_sp foreign key (id_sanpham) references SANPHAM(id)
);

CREATE TABLE DANHGIA(
    id_khachang int not null,
    id_hoadon int not null,
    id_sanpham int not null,
    hoten varchar(100) default 'Ẩn Danh',
    nhanxet varchar(250) not null,
    chatluong int(1) not null,
    thoigian varchar(15) not null
);
-- dùng timeunix


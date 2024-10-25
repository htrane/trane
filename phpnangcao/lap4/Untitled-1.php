<?php
interface User {
    public function setUserInfo($hoTen, $email, $diaChi, $dienThoai);
    }
interface GiaoVien {
    public function setClassInfo($tenLop, $sySo);
    public function getClassInfo();
    public function tinhLuong($heSoLuong); // Lương = HSL * 2,340,000
}
interface SinhVien {
    public function setStudentInfo($maSinhVien, $tenSinhVien, $monHoc, $diem);
    public function getStudentInfo();
}

// Lớp NhanVien triển khai cả 3 interface: User, GiaoVien và SinhVien
class NhanVien implements User, GiaoVien, SinhVien {
    private $hoTen;
    private $email;
    private $diaChi;
    private $dienThoai;
    private $heSoLuong;
    private $tenLop;
    private $sySo;
    private $maSinhVien;
    private $tenSinhVien;
    private $monHoc;
    private $diem;

    // Triển khai các phương thức từ interface User
    public function setUserInfo($hoTen, $email, $diaChi, $dienThoai) {
        $this->hoTen = $hoTen;
        $this->email = $email;
        $this->diaChi = $diaChi;
        $this->dienThoai = $dienThoai;
    }

    public function getUserInfo() {
        return "Họ tên: $this->hoTen<br>Email: $this->email<br>Địa chỉ: $this->diaChi<br>Điện thoại: $this->dienThoai<br>";
    }

    public function tinhLuong($heSoLuong) {
        $this->heSoLuong = $heSoLuong;
        return $heSoLuong * 2340000;
    }

    // Triển khai các phương thức từ interface GiaoVien
    public function setClassInfo($tenLop, $sySo) {
        $this->tenLop = $tenLop;
        $this->sySo = $sySo;
    }

    public function getClassInfo() {
        return "Tên lớp: $this->tenLop<br>Sĩ số: $this->sySo<br>";
    }

    // Triển khai các phương thức từ interface SinhVien
    public function setStudentInfo($maSinhVien, $tenSinhVien, $monHoc, $diem) {
        $this->maSinhVien = $maSinhVien;
        $this->tenSinhVien = $tenSinhVien;
        $this->monHoc = $monHoc;
        $this->diem = $diem;
    }

    public function getStudentInfo() {
        return "Mã sinh viên: $this->maSinhVien<br>Họ tên sinh viên: $this->tenSinhVien<br>Môn học: $this->monHoc<br>Điểm: $this->diem<br>";
    }
}

// Sử dụng lớp NhanVien
$nhanVien = new NhanVien();

// Thiết lập thông tin User
$nhanVien->setUserInfo("Huyền Trang", "thil95826@gmail.com", "81 Trung Kính", "0123456789");
echo $nhanVien->getUserInfo() ;

// Tính lương nhân viên
$luong = $nhanVien->tinhLuong(3.0); // Hệ số lương 3.0
echo "Lương: " . number_format($luong, 0, ',', '.') . " VND";

// Thiết lập thông tin lớp học
$nhanVien->setClassInfo("Lớp 12A", 40);
echo $nhanVien->getClassInfo() ;

// Thiết lập thông tin sinh viên
$nhanVien->setStudentInfo("SV001", "Trần Thị Mỹ Linh", "Toán", 9.0);
echo $nhanVien->getStudentInfo() ;

?>
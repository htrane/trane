<?php
class ChuyenXe {
    protected $maSoChuyen;
    protected $hoTenTaiXe;
    protected $soXe;

    public function __construct($maSoChuyen, $hoTenTaiXe, $soXe) {
        $this->maSoChuyen = $maSoChuyen;
        $this->hoTenTaiXe = $hoTenTaiXe;
        $this->soXe = $soXe;
    }

    public function getMaSoChuyen() {
        return $this->maSoChuyen;
    }

    public function getHoTenTaiXe() {
        return $this->hoTenTaiXe;
    }

    public function getSoXe() {
        return $this->soXe;
    }

    public function tinhDoanhThu() {
        // Phương thức này định nghĩa lại trong các lớp kế thừa
        return 0;
    }
}

// Lớp kế thừa ChuyenXeNoiThanh
class ChuyenXeNoiThanh extends ChuyenXe {
    private $soTuyen;
    private $soKm;
    private $doanhThu;

    public function __construct($maSoChuyen, $hoTenTaiXe, $soXe, $soTuyen, $soKm) {
        parent::__construct($maSoChuyen, $hoTenTaiXe, $soXe);
        $this->soTuyen = $soTuyen;
        $this->soKm = $soKm;
        $this->doanhThu = $this->tinhDoanhThu();
    }

    public function tinhDoanhThu() {
        return $this->soKm * 30000;
    }

    public function getSoTuyen() {
        return $this->soTuyen;
    }

    public function getSoKm() {
        return $this->soKm;
    }

    public function getDoanhThu() {
        return $this->doanhThu;
    }
}

// Lớp kế thừa ChuyenXeNgoaiThanh
class ChuyenXeNgoaiThanh extends ChuyenXe {
    private $noiDen;
    private $soNgay;
    private $doanhThu;

    public function __construct($maSoChuyen, $hoTenTaiXe, $soXe, $noiDen, $soNgay) {
        parent::__construct($maSoChuyen, $hoTenTaiXe, $soXe);
        $this->noiDen = $noiDen;
        $this->soNgay = $soNgay;
        $this->doanhThu = $this->tinhDoanhThu();
    }

    public function tinhDoanhThu() {
        return $this->soNgay * 3000000;
    }

    public function getNoiDen() {
        return $this->noiDen;
    }

    public function getSoNgay() {
        return $this->soNgay;
    }

    public function getDoanhThu() {
        return $this->doanhThu;
    }
}

class QuanLyChuyenXe {
    private $danhSachChuyenXe = [];

    public function themChuyenXe($chuyenXe) {
        $this->danhSachChuyenXe[] = $chuyenXe;
    }

    public function xuatDanhSachChuyenXe() {
        foreach ($this->danhSachChuyenXe as $chuyenXe) {
            echo "Mã số chuyến: " . $chuyenXe->getMaSoChuyen() . "<br>";
            echo "Họ tên tài xế: " . $chuyenXe->getHoTenTaiXe() . "<br>";
            echo "Số xe: " . $chuyenXe->getSoXe() . "<br>";
            if ($chuyenXe instanceof ChuyenXeNoiThanh) {
                echo "Số tuyến: " . $chuyenXe->getSoTuyen() . "<br>";
                echo "Số km: " . $chuyenXe->getSoKm() . "<br>";
                echo "Doanh thu: " . number_format($chuyenXe->getDoanhThu(), 0, ',', '.') . " VND<br>";
            } elseif ($chuyenXe instanceof ChuyenXeNgoaiThanh) {
                echo "Nơi đến: " . $chuyenXe->getNoiDen() . "<br>";
                echo "Số ngày: " . $chuyenXe->getSoNgay() . "<br>";
                echo "Doanh thu: " . number_format($chuyenXe->getDoanhThu(), 0, ',', '.') . " VND<br>";
            }
            echo "------------------------------<br>";
        }
    }

    public function tinhTongDoanhThuNoiThanh() {
        $tongDoanhThu = 0;
        foreach ($this->danhSachChuyenXe as $chuyenXe) {
            if ($chuyenXe instanceof ChuyenXeNoiThanh) {
                $tongDoanhThu += $chuyenXe->getDoanhThu();
            }
        }
        return $tongDoanhThu;
    }

    public function tinhTongDoanhThuNgoaiThanh() {
        $tongDoanhThu = 0;
        foreach ($this->danhSachChuyenXe as $chuyenXe) {
            if ($chuyenXe instanceof ChuyenXeNgoaiThanh) {
                $tongDoanhThu += $chuyenXe->getDoanhThu();
            }
        }
        return $tongDoanhThu;
    }

    // Phương thức mới: Tính tổng doanh thu theo biển số xe
    public function tinhTongDoanhThuTheoBienSoXe() {
        $doanhThuTheoBienSo = [];

        foreach ($this->danhSachChuyenXe as $chuyenXe) {
            $soXe = $chuyenXe->getSoXe();
            if (!isset($doanhThuTheoBienSo[$soXe])) {
                $doanhThuTheoBienSo[$soXe] = 0;
            }
            $doanhThuTheoBienSo[$soXe] += $chuyenXe->getDoanhThu();
        }

        return $doanhThuTheoBienSo;
    }
}

// Sử dụng phương thức mới
$qlChuyenXe = new QuanLyChuyenXe();

// Thêm các chuyến xe vào danh sách
$qlChuyenXe->themChuyenXe(new ChuyenXeNoiThanh('NX001', 'Con gà', '29B-12345', '01', 5));
$qlChuyenXe->themChuyenXe(new ChuyenXeNgoaiThanh('NX002', 'Đa cấp', '29B-67890', 'Lào Cai', 9));
$qlChuyenXe->themChuyenXe(new ChuyenXeNoiThanh('NX003', 'Tài xế A', '29B-12345', '02', 10));

// Xuất danh sách chuyến xe
$qlChuyenXe->xuatDanhSachChuyenXe();

// Tính tổng doanh thu theo biển số xe
$doanhThuTheoBienSo = $qlChuyenXe->tinhTongDoanhThuTheoBienSoXe();
foreach ($doanhThuTheoBienSo as $bienSo => $doanhThu) {
   // echo "Tổng doanh thu xe nội thành: " . number_format($qlChuyenXe->tinhTongDoanhThuNoiThanh(), 0, ',', '.') . " VND\n";
   // echo "Tổng doanh thu xe ngoại thành: " . number_format($qlChuyenXe->tinhTongDoanhThuNgoaiThanh(), 0, ',', '.') . " VND\n";
    echo "Tổng doanh thu cho xe biển số $bienSo: " . number_format($doanhThu, 0, ',', '.') . " VND<br>";
}

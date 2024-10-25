<?php 
//Làm việc với interface
// Định nghĩa interface Employee
// phương thức tính lương
//lương = lương chính +phụ cấp; 
interface Employee {
    public function getName($name);
    // public function setName($name);
    public function tinhLuong($luongchinh, $phucap); // Phương thức tính lương cho Employee
}

// Định nghĩa interface Manager
// Phương thức tính lương cho Manager
// phương thức tính lương: lương = lương chính + phụ cấp + tiền hỗ trợ điện thoại 
interface Manager {
    public function setName($name);
    public function tinhLuongWithPhone($luongchinh, $phucap, $dienthoai); // Phương thức tính lương cho Manager
}

// Lớp user triển khai cả hai interface Employee và Manager
class user implements Employee, Manager {
    public $name;

    // Triển khai phương thức getName từ interface Employee
    public function getName($name) {
        return $this->name = $name;
    }

    // Triển khai phương thức setName từ interface Manager
    public function setName($name) {
        $this->name = $name;
    }

    // Triển khai phương thức tinhLuong từ interface Employee
    public function tinhLuong($luongchinh, $phucap) {
        return $luongchinh + $phucap;
    }

    // Triển khai phương thức tinhLuong từ interface Manager
    public function tinhLuongWithPhone($luongchinh, $phucap, $dienthoai) {
        return $luongchinh + $phucap + $dienthoai;
    }
}

// Sử dụng lớp user
$user = new user();
$user->setName("Huyền Trang");
echo "Tên: " . $user->getName("Huyen Trang") . "<br>\n";

// Tính lương cho Employee
$employeeSalary = $user->tinhLuong(1000, 200);
echo "Lương Employee: " . $employeeSalary . "<br>\n";

// Tính lương cho Manager
$managerSalary = $user->tinhLuongWithPhone(1000, 200, 100);
echo "Lương Manager: " . $managerSalary . "<br>\n";
?>





















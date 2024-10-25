<?php
class NhanVien {
    public $name;
    public $age;
    protected $salary;

    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }

    public function info() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Salary: " . $this->salary . "<br>";
    }
}
class QuanLy extends NhanVien {
    private $pc;
    public function __construct($name, $age, $salary, $pc) {
        parent::__construct($name, $age, $salary);
        $this->pc = $pc;
    }

    public function getTotalSalary() {
        return $this->salary + $this->pc;
    }

    public function info() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Total Salary: " . $this->getTotalSalary() . "<br>";
        echo " Phụ cấp: $this->pc\n";
    }
}
$quanly = new QuanLy("Nguyễn Văn Dũng", 20, 170000, 190000);
$quanly->info();
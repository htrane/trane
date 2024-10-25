<?php
namespace Employee;
class Manager {
    public function SubtotalSalary ($salary, $pc) {
       # echo "Luong".$salary + $pc;
       return $salary + $pc;
    }
}
// Tạo class Person
class Person {
    private $name;
    private $age;

    // Phương thức khởi tạo
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // Phương thức hiển thị thông tin cá nhân
    public function getInfo() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
    }
}
?>

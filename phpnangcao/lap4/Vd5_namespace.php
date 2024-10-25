<?php
namespace MyManager;
require_once "Vd4.php";
use Employee\Manager;
use Employee\Person; 
$objQl = new Manager;
echo "Subtotal Salary: " . $objQl->SubtotalSalary(2000000, 5000000) . "<br>"; 
// Hiển thị thông tin trong getInfo ();
// Tạo đối tượng Person và hiển thị thông tin
$person = new Person("  Ngoc ", 21);
$person->getInfo();
?>




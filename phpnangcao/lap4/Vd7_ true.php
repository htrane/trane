<?php
class Student {
    public $age;
    private function info () {
        echo "Welcome DHLD - XH";
    }
}
#var_dump (property_exists ('Student', 'age'));  // True
#var_dump (property_exists ('Student', 'phone'));  //False
var_dump (method_exists ('Student', 'info'));
?>









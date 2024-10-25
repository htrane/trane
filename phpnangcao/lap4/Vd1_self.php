<?php
class Stdent {
    public static $name = "Thu Cuc";
    public static function getName () {
        echo self ::$name;  // không cần thông qua đối tượng 
    }
}
// Gọi phương thức getName() trực tiếp từ lớp Stdent
Stdent::getName();  
?>






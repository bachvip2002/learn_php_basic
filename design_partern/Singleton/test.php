<?php
class Singleton {
    private static $instance;

    private function __construct() {
        // private constructor
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton;
        }
        return self::$instance;
    }

    public function showMessage() {
        echo "Hello, world!";
    }
}

$singleton = Singleton::getInstance();
$singleton->showMessage(); // output: Hello, world!
//mục đích sử dụng là để tránh lãng phí bộ nhớ 

function a() {
    static $a = 0;
    $a++;
    return $a;
}
echo a(),a(),a();

//static là từ khóa mục đính cho dữ liệu có thể sử dụng lại trong khối xử lý mà không muốn bị thay đổi

?>
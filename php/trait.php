<?php 

trait Greeting {
    public function sayHello() {
        echo "Hello World!";
    }
}

class MyClass {
    use Greeting;
}

$obj = new MyClass();
$obj->sayHello(); // Output: Hello World!

?>
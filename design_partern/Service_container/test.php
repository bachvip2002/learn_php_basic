<?php

class Censor
{
    public $b = 'ngubilua';

    function hello()
    {
        echo "hello world";
        return 0;
    }
}
class User
{
    public $b;
    function handle($a)
    {
        echo $a;
        return $a;
    }
}

class admin
{
    public $a;
    public $user;
    function __construct(User $user)
    {
        $this->user = $user;
    }

    function manager($string)
    {
        return $this->user->handle($string);
    }
}

$admin = new admin(new User(new Censor()));

var_dump($admin->manager('abc'), $admin->user->handle('xyz'), $admin,get_class_methods($admin));

//nghĩa là class này phụ thuộc 1 hay nhiều class khác mục đích 
//sử dụng thuộc tính phương thức thay vì dùng extends ( Dependency Injection)

//nếu mà class này được nhiều Dependency Injection và những class bên
//trong cũng vậy thì ta dùng đến laravel container để xử lý bài toán
?>
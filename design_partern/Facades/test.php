<?php 

class Authentication
{
    public function authenticateUser($username, $password)
    {
        // kiểm tra xem người dùng có đăng nhập thành công không
        // trả về true hoặc false
    }
}

class Payment
{
    public function processPayment($amount)
    {
        // xử lý thanh toán
        // trả về true hoặc false
    }
}

class OrderFacade
{
    private $authentication;
    private $payment;

    public function __construct()
    {
        $this->authentication = new Authentication();
        $this->payment = new Payment();
    }

    public function placeOrder($username, $password, $amount)
    {
        if ($this->authentication->authenticateUser($username, $password)) {
            if ($this->payment->processPayment($amount)) {
                echo "Order placed successfully.";
            } else {
                echo "Payment processing failed.";
            }
        } else {
            echo "Authentication failed.";
        }
    }
}

// Usage:
$orderFacade = new OrderFacade();
$orderFacade->placeOrder('username', 'password', 100);


//OrderFacade lớp này mục đích là để xử lý công việc của 2 lớp trên cùng 1 lúc 

// Giảm độ phức tạp: Facade Pattern giúp giảm độ phức tạp của hệ thống phần mềm bằng cách che giấu các chi tiết phức tạp và cung cấp một giao diện đơn giản để sử dụng.

// Dễ bảo trì: Khi sử dụng Facade Pattern, nếu có thay đổi trong hệ thống phần mềm, chỉ cần thay đổi trên Facade thay vì phải thay đổi nhiều nơi khác nhau trong mã nguồn.

// Dễ sử dụng: Facade Pattern cung cấp một giao diện dễ sử dụng để truy cập các phương thức, lớp hoặc các phần của hệ thống phức tạp.
?>
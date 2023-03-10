    <?php 

    interface Shape {
        public function draw();
    }

    class Circle implements Shape {
        public function draw() {
            echo "Drawing a circle";
        }
    }

    class Rectangle implements Shape {
        public function draw() {
            echo "Drawing a rectangle";
        }
    }

    class ShapeFactory {
        public static function getShape($shapeType) {
            switch ($shapeType) {
                case 'Circle':
                    return new Circle();
                case 'Rectangle':
                    return new Rectangle();
                default:
                    throw new InvalidArgumentException("Invalid shape type");
            }
        }
    }

    // Usage:
    $circle = ShapeFactory::getShape('Circle');
    $circle->draw(); // Output: Drawing a circle

    $rectangle = ShapeFactory::getShape('Rectangle');
    $rectangle->draw(); // Output: Drawing a rectangle


//mục đích là chuyển sử dụng từ lớp này qua lớp khác thông qua lớp Factory để chuyển nó như đoạn code trên 
// ta dùng đến cách là truyền tham số

// Điểm lợi của Factory Pattern bao gồm:

// Tính linh hoạt: Factory Pattern cho phép tạo ra các đối tượng một cách linh hoạt, cho phép thay đổi các đối tượng một cách dễ dàng mà không cần sửa đổi quá nhiều mã nguồn.

// Tính mở rộng: Khi cần tạo ra một đối tượng mới, ta chỉ cần triển khai thêm một lớp mới và sử dụng phương thức tạo đối tượng của Factory Class.

// Tính tái sử dụng: Factory Pattern cho phép tái sử dụng các đối tượng đã tạo một cách dễ dàng, giúp tiết kiệm tài nguyên và tăng hiệu suất của ứng dụng.
?>
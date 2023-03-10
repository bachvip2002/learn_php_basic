<?php 
// Khai báo interface cho các observer
interface Observer {
    public function update($data);
}

// Khai báo interface cho subject
interface Subject {
    public function registerObserver($observer);
    public function removeObserver($observer);
    public function notifyObservers();
}

// Định nghĩa class WeatherData làm subject
class WeatherData implements Subject {
    private $observers = array();
    private $temperature;
    private $humidity;

    public function registerObserver($observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver($observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers() {
        foreach ($this->observers as $observer) {
            $observer->update(array(
                'temperature' => $this->temperature,
                'humidity' => $this->humidity,
            ));
        }
    }

    public function setMeasurements($temperature, $humidity) {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->notifyObservers();
    }
}

// Định nghĩa class TemperatureDisplay làm observer
class TemperatureDisplay implements Observer {
    public function update($data) {
        echo 'Temperature is ' . $data['temperature'] . "\n";
    }
}

// Định nghĩa class HumidityDisplay làm observer
class HumidityDisplay implements Observer {
    public function update($data) {
        echo 'Humidity is ' . $data['humidity'] . "\n";
    }
}

// Sử dụng
$weatherData = new WeatherData();

$temperatureDisplay = new TemperatureDisplay();
$weatherData->registerObserver($temperatureDisplay);

$humidityDisplay = new HumidityDisplay();
$weatherData->registerObserver($humidityDisplay);

$weatherData->setMeasurements(25, 60);
// Output: Temperature is 25
//         Humidity is 60

$weatherData->removeObserver($humidityDisplay);

$weatherData->setMeasurements(30, 50);
// Output: Temperature is 30

// WeatherData được định nghĩa làm subject, và TemperatureDisplay và 
// HumidityDisplay được định nghĩa làm các observer. Khi WeatherData 
// thay đổi nhiệt độ và độ ẩm, nó sẽ thông báo cho tất cả các observer 
// đã đăng ký để cập nhật trạng thái hiển thị của chúng. 
// Các observer sẽ xử lý dữ liệu được truyền vào hàm update() 
// để cập nhật trạng thái hiển thị của chúng.


//cuối cùng thì mục để làm sao mà những lớp đăng ký theo dõi được cập nhật giá trị thông qua hàm


?>

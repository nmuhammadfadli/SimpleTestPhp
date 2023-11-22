<?php
class Car {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function setModel($model) {
        $this->model = $model;
    }
}

class SportsCar extends Car {
    public function hello() {
        return "beep! I am a <i>" . $this->model . "</i><br />";
    }
}

$sportsCar = new SportsCar('Mercedes Benz');
echo $sportsCar->hello(); // Output: beep! I am a <i>Mercedes Benz</i><br />

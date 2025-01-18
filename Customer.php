<?php
class Customer {
    private String $name;
    private float $loadWeight;

    public function __construct(String $name,float $loadWeight) {
        $this->name       = $name;
        $this->loadWeight = $loadWeight;
    }

    // Getters and setters
    public function getName():string {
        return $this->name;
    }
    public function getLoadWeight(): float{
        return $this->loadWeight; 
    }
}




?>
<?php

abstract class Product {
    private $sku;
    private $name;
    private $price;
    private $typeSwitcher;
    
    
    public function __construct(string $sku, string $name, float $price, string $typeSwitcher)
    {
        $this -> sku = $sku;
        $this -> name = $name;
        $this -> price = $price;
        $this -> typeSwitcher = $typeSwitcher;
    }
    // getters
    public function getSKU(){
        return $this->sku;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
       return $this->price;
    }

    public function getTypeSwitcher()
    {
        return $this -> typeSwitcher;
    }
}

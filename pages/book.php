<?php
require_once('product.php');

class Book extends Product
{

    private $weight;

    public function setWeight()
    {
        return $this->weight;
    }

    public function getWeight()
    {
        return $this->weight;
    }
}
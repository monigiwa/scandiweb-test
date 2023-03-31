<?php
include("Product.php");

class DVD extends Product
{
    private $size;

    public function setSize()
    {
        return $this -> size;
    }

    public function getSize()
    {
        return $this -> size;
    }
}
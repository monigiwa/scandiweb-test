<?php
include("Product.php");

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function setHeight()
    {
        return $this -> height;
    }

    public function setWidth()
    {
        return $this -> width;
    }

    public function setLength()
    {
        return $this -> length;
    }

    public function getHeight()
    {
        return $this -> height;
    }

    public function getWidth()
    {
        return $this -> width;
    }

    public function getLength()
    {
        return $this -> length;
    }

}
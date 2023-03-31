<?php
 abstract class Validator {
     protected $validatorName;

     public function __construct($validatorName) {
         $this->validatorName = $validatorName;
     }
     abstract public function validate($input);
     public function getValidatorName() {
         return $this->validatorName;

     }
 }

 class SkuValidator extends Validator {

     public function __construct() {
         parent::__construct('sku');
     }

   public function validate($input) {
     if (!preg_match('/^[A-Za-z0-9]+$/', $input)) {
       throw new Exception("Invalid SKU: $input");
     }
   }
 }

 class NameValidator extends Validator {

     public function __construct() {
         parent::__construct('name');
     }

   public function validate($input) {
     if (!is_string($input)) {
       throw new Exception("Invalid name: not a string");
     }
    //   Additional validation logic for names
   }
 }

 class PriceValidator extends Validator {

     public function __construct() {
         parent::__construct('price');
     }

   public function validate($input) {
     if (!is_numeric($input)) {
       throw new Exception("Invalid price: not a number");
     }
    //   Additional validation logic for prices
   }
 }

 class SizeValidator extends Validator {

     public function __construct() {
         parent::__construct('size');
     }

   public function validate($input) {
     if (!is_numeric($input)) {
       throw new Exception("Invalid size: not a number");
     }
    //   Additional validation logic for sizes
   }
 }

 class HeightValidator extends Validator {

     public function __construct() {
         parent::__construct('height');
     }

     public function validate($input) {
         if (!is_numeric($input)) {
           throw new Exception("Invalid height: not a number");
         }
       }
 }

 class WidthValidator extends Validator {

     public function __construct() {
         parent::__construct('width');
     }

     public function validate($input) {
         if (!is_numeric($input)) {
           throw new Exception("Invalid width: not a number");
         }
       }


  }

 class LengthValidator extends Validator {

     public function __construct() {
         parent::__construct('length');
     }

     public function validate($input) {
         if (!is_numeric($input)) {
           throw new Exception("Invalid length: not a number");
         }
       }

 }

 class WeightValidator extends Validator {

     public function __construct() {
         parent::__construct('weight');
     }

   public function validate($input) {
     if (!is_numeric($input)) {
       throw new Exception("Invalid weight: not a number");
     }
   }
 }


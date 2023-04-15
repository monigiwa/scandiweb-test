<?php
require_once('classes/validator.php');
require_once('classes/config.php');
require_once('classes/dbh.php');
include 'includes/autoloader.php';

// Create a new database connection

try {
    $databaseConnection = new DatabaseConnection();
} catch (PDOException $e) {
    // Display an error message if the database connection fails
    echo "Unable to create database connection: " . $e->getMessage();
    exit();
}

// Create a new Database object using the database connection
$database = new Database($databaseConnection);
  
// Create an array of validators
$validatorMap = [
    'book' => [new WeightValidator()],
    'DVD' => [new SizeValidator()],
    'Furniture' => [
        new HeightValidator(),
        new WidthValidator(),
        new LengthValidator(),
    ],
];

$productType = isset($_POST['productType']) ? $_POST['productType'] : '';

$validators = $validatorMap[$productType] ?? [
    new SkuValidator(),
    new NameValidator(),
    new PriceValidator(),
];
// If all inputs are valid, save them to the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the form data
    $sku = htmlspecialchars($_POST['sku']);
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']);
    $typeSwitcher = htmlspecialchars($_POST['productType']);
    $size = '';
    $height = '';
    $width = '';
    $length = '';
    $weight = '';

    if(isset($_POST['size'])) {
        $size = htmlspecialchars($_POST['size']);
    }

    if(isset($_POST['height'])) {
        $height = htmlspecialchars($_POST['height']);
    }

    if(isset($_POST['width'])) {
        $width = htmlspecialchars($_POST['width']);
    }

    if(isset($_POST['length'])) {
        $length = htmlspecialchars($_POST['length']);
    }

    if(isset($_POST['weight'])) {
        $weight = htmlspecialchars($_POST['weight']);
    }

    $inputs = [
        'sku' => $sku,
        'name' => $name,
        'price' => $price,
        'productType' => $typeSwitcher,
        'size' => $size,
        'height' => $height,
        'width' => $width,
        'length' => $length,
        'weight' => $weight
    ];

    $errors = array();
    foreach ($inputs as $key => $value) {
        foreach ($validators as $validator) {
            if ($validator->getValidatorName() === $key) {
                try {
                    $validator->validate($value);
                } catch (Exception $e) {
                    // If a validation error occurs, add it to the $errors array
                    $errors[] = "Validation error for $key: " . $e->getMessage();
                }
            }
        }
    }
    // If there are no validation errors, save the data to the database
    if (count($errors) === 0) {
        try {
            // Insert the product data into the database
            if ($database->insertData($sku, $name, $price, $typeSwitcher, $size, $height, $width, $length, $weight)) {
                // If the data was inserted successfully, redirect to the product list page
                header('Location: pages/index.php');
                exit();
            } else {
                // If there was an error inserting the data, display an error message
                echo "Error inserting data into database.";
                exit();
            }
        } catch (Exception $e) {
            // Display an error message if there was an error inserting the data
            echo "Error inserting data into database: " . $e->getMessage();
            exit();
        }
    } else {
    //   If there are validation errors, display them on the product add screen
     foreach ($errors as $error) {
         echo "<p>$error</p>";
     }
    } 
}
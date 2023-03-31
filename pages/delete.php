<?php

require_once('config.php');
require_once('dbh.php');

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

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_checkbox'])) {
    try {
        // Get the IDs of the products to be deleted
        $ids = $_POST['delete_checkbox'];

        // Delete the selected products from the database
        if ($database->deleteProductBtn($ids)) {
            // If the products were deleted successfully, redirect to the product list page
            header('Location: ./product_list.php');
            exit();
        } else {
            // If there was an error deleting the products, display an error message
            echo "Error deleting products from database.";
            exit();
        }
    } catch (Exception $e) {
        // Display an error message if there was an error deleting the products
        echo "Error deleting products from database: " . $e->getMessage();
        exit();
    }
}

?>

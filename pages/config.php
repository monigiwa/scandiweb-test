<?php

class Database
{
    private $conn;

    public function __construct(DatabaseConnection $databaseConnection) {
        $this->conn = $databaseConnection->getConnection();
    }
    //inserting data into the table in the database
public function insertData($sku, $name, $price, $typeSwitcher, $size, $height, $width, $length, $weight) {
    // Check if SKU already exists in database
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM product WHERE sku = :sku");
        $stmt->bindParam(':sku', $sku);
    if (!$stmt->execute()) {
        throw new Exception("Error trying to save SKU: " . $stmt->errorInfo()[2]);
    }
    $count = $stmt->fetchColumn();
    if ($count > 0) {
        throw new Exception("SKU already exists in database.");
    }
    // Validate height, width, and length values
    // if (!is_numeric($height) || !is_numeric($width) || !is_numeric($length)) {
    //     echo "Invalid height, width, or length value";
    //     return false;
    // } 
    
    try {
        $stmt = $this->conn->prepare("INSERT INTO product (sku, name, price, typeSwitcher, size, height, width, length, weight) VALUES (:sku, :name, :price, :typeSwitcher, :size, :height, :width, :length, :weight)");
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':typeSwitcher', $typeSwitcher);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':height', $height);
        $stmt->bindParam(':width', $width);
        $stmt->bindParam(':length', $length);
        $stmt->bindParam(':weight', $weight);
        $stmt->execute();
        return true;
        } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
        }
    }

    public function getData() {
        $stmt = $this->conn->prepare("SELECT * FROM product");
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array('status' => 'success', 'data' => $result);
        } else {
            $error = $stmt->errorInfo();
            return array('status' => 'error', 'message' => $error[2]);
        }
    }  
    
    public function deleteProductBtn($deleteCheckbox) {
        try {
            $placeholders = implode(',', array_fill(0, count($deleteCheckbox), '?'));
            $sql = "DELETE FROM product WHERE id IN ($placeholders)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($deleteCheckbox);
            return true;
        } catch(PDOException $e) {
            echo "Unable to delete products: " . $e->getMessage();
            return false;
        }
    }  
}
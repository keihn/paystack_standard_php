<?php

class Product{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public static function getProduct($id){
        $stmt = "SELECT * FROM products WHERE product_id = :id";

        $this->db->query($stmt);

        $this->db->bind(':id', $id);

        if($this->db->execute()){
            $row = $this->db-single();
            return $row;
        }
    }

    public static function getAllProducts(){
        $stmt = "SELECT *  FROM products";
        $this->db->query($stmt);

        if($this->db->execute()){
            $result = $this->db->resultSet();
            return $result;
        }
    }

    public function createProduct($data){
        $product_name = $data['product_name'];
        $description = $data['description'];
        $category_id = $data['category_id'];
        $product_img = $data['product_img'];
        $price = $data['price'];
        $quantity = $data['quantity'];
    
        $stmt = "INSERT INTO products (product_name,  product_id, description, category_id, product_img, price, quantity) 
        VALUES (:product_name, :description, :category_id, :product_img, :price, :quantity) ";

        $this->db->bind(':product_name', $product_name);
        $this->db->bind(':description', $description);
        $this->db->bind(':category_id', $category_id);
        $this->db->bind(':product_img', $product_img);
        $this->db->bind(':price', $price);
        $this->db->bind(':quantity', $quantity);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}


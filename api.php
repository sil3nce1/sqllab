<?php

class Product {
    public $id;
    public $name;
    public $description;
    public $price;

    function __construct($id, $name, $description, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}

$product_id = $_GET['productId'];

if (isset($product_id)) {
    $product = GetProductById($product_id);
    if ($product == NULL) 
        die("Product not found");


    echo json_encode($product);

}
else {
    die("Product id is invalid");
}




function GetProductById($product_id) {
    $mysql_conn = new mysqli('localhost', 'root', 'rootroot', 'padaria');
    $query = "SELECT * FROM produto WHERE id = '" . $product_id . "'";
    $result = $mysql_conn->query($query);
    $row = $result->fetch_assoc();
    return new Product($row['id'], $row['ds_nome'], $row['ds_description'], $row['vl_preco']);
}



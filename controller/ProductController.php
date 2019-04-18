<?php

namespace Controller;

use Model\ProductDB;
use Model\DBConnection;
use Product;

class ProductController
{
    public $productDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=product_management", "root", "123qwe");
        $this->productDB = new ProductDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/add.php';
        } else {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $producer = $_POST['producer'];
            $product = new Product($name, $price, $description, $producer);
            $this->productDB->create($product);
            $message = 'product created';
            include 'view/add.php';
        }
    }

    public function index()
    {
        $products = $this->productDB->getAll();
        include 'view/list.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $product = $this->productDB->get($id);
            include 'view/delete.php';
        } else {
            $id = $_POST['id'];
            $this->productDB->delete($id);
            header('Location: index.php');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $product = $this->productDB->get($id);
            include 'view/edit.php';
        } else {
            $id = $_POST['id'];
            $product = new product($_POST['name'], $_POST['price'], $_POST['description'], $_POST['producer']);
            $this->productDB->update($id, $product);
            header('Location: index.php');
        }
    }
}
<?php
require_once(__DIR__ . "/../bootstrap.php");


class Product
{
    public $id;
    public $name;
    public $description;
    public $category_id;
}

function find_product($id) : Product
{
    $query = pdo()->prepare("SELECT * FROM products WHERE id= ?");
    $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
    $query->execute([$id]);

    return $query->fetch() ?? abord_404();

}
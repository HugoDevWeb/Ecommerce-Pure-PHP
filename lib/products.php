<?php
require_once(__DIR__ . "/../bootstrap.php");


class Product
{
    public $id;
    public $name;
    public $slug;
    public $description;
    public $category_id;
}

function find_product($slug) : Product
{
    return  find_product_or_null($slug) ?? abord_404();

}

function find_product_or_null($slug){
    $query = pdo()->prepare("SELECT * FROM products WHERE slug= ?");
    $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
    $query->execute([$slug]);

    return $query->fetch() ?? abord_404();
}
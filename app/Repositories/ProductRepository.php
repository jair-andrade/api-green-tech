<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getProducts()
    {
        $products = Product::get();
        return $products;
    }

    public function createProduct(array $data)
    {
        $product = Product::create($data);

        if (!$product) {
            return false;
        }

        return $product;
    }

    public function updateProduct(Product $product, array $data)
    {

        if (!isset($product->id)) {
            return false;
        }

        $product->update($data);

        return true;
    }

    public function deleteProduct(Product $product)
    {
        $product->suppliers()->detach();
        $product->delete();
        return true;
    }
}

<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Exception;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts()
    {
        $products = $this->productRepository->getProducts();

        return $products;
    }

    public function createProduct(array $data)
    {
        $product = $this->productRepository->createProduct($data);

        if(!$product){
            throw new Exception('Product could not be created', 500);
        }

        return $product;
    }

    public function updateProduct(Product $product, array $data)
    {
        $product = $this->productRepository->updateProduct($product, $data);

        if(!$product){
            throw new Exception('Product could not be updated', 500);
        }

        return $product;
    }

    public function deleteProduct(Product $product)
    {
        $product = $this->productRepository->deleteProduct($product);

        if(!$product){
            throw new Exception('Product could not be deleted', 500);
        }

        return $product;
    }
}

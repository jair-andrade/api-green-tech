<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\{
    CreateProductRequest,
    UpdateProductRequest
};
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function get(): JsonResponse
    {
        try {
            $products = $this->productService->getProducts();

            return response()->json([
                'status' => JsonResponse::HTTP_OK,
                'products' => $products
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    public function create(CreateProductRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $this->productService->createProduct($data);

            return response()->json([
                'status' => JsonResponse::HTTP_CREATED,
                'message' => 'Product created successfully',
            ], JsonResponse::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    public function update(Product $product, UpdateProductRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $this->productService->updateProduct($product, $data);

            return response()->json([
                'status' => JsonResponse::HTTP_OK,
                'message' => 'Product updated successfully',
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    public function delete(Product $product): JsonResponse
    {
        try {
            $this->productService->deleteProduct($product);

            return response()->json([
                'status' => JsonResponse::HTTP_OK,
                'message' => 'Product deleted successfully',
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}

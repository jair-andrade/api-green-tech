<?php

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository
{
    public function getSupplier()
    {
        $supplier = Supplier::with('products')->get();
        return $supplier;
    }

    public function createSupplier(array $data)
    {
        $supplier = Supplier::create($data);

        if (!$supplier) {
            return false;
        }

        return $supplier;
    }

    public function detachProduct(array $data)
    {
        $supplier = Supplier::where('id', $data['supplier_id'])->first();
        $supplier->products()->detach($data['product_id']);
        return true;
    }

    public function updateSupplier(Supplier $supplier, array $data)
    {

        if (!isset($supplier->id)) {
            return false;
        }

        if (isset($data['products'])) {

            $idsOnly = array_map(function ($product) {
                return $product['id'];
            }, $data['products']);

            $supplier->products()->sync($idsOnly);
        }
        $supplier->update($data);

        return true;
    }

    public function deleteSupplier(Supplier $supplier)
    {
        $supplier->products()->detach();
        $supplier->delete();
        return true;
    }
}

<?php

namespace App\Services;

use App\Models\Supplier;
use App\Repositories\SupplierRepository;
use Exception;

class SupplierService
{
    private SupplierRepository $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getSupplier()
    {
        $supplier = $this->supplierRepository->getSupplier();

        return $supplier;
    }

    public function createSupplier(array $data)
    {
        $supplier = $this->supplierRepository->createSupplier($data);

        if(!$supplier){
            throw new Exception('Supplier could not be created', 500);
        }

        return $supplier;
    }

    public function detachProduct(array $data)
    {
        $supplier = $this->supplierRepository->detachProduct($data);

        if(!$supplier){
            throw new Exception('Supplier could not be created', 500);
        }

        return $supplier;
    }

    public function updateSupplier(Supplier $supplier, array $data)
    {
        $supplier = $this->supplierRepository->updateSupplier($supplier, $data);

        if(!$supplier){
            throw new Exception('Supplier could not be updated', 500);
        }

        return $supplier;
    }

    public function deleteSupplier(Supplier $supplier)
    {
        $supplier = $this->supplierRepository->deleteSupplier($supplier);

        if(!$supplier){
            throw new Exception('Supplier could not be deleted', 500);
        }

        return $supplier;
    }
}

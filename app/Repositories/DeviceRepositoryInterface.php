<?php
namespace App\Repositories;

interface DeviceRepositoryInterface extends RepositoryInterface
{
    public function findByVendorId($vendorId);
}

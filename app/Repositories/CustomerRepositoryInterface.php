<?php namespace App\Repositories;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function findByVendorId($vendorId);
    public function findOrCreate($attributes);
}

<?php
namespace App\Repositories;

interface SiteRepositoryInterface extends RepositoryInterface
{
    public function findByVendorId($vendorId);
}

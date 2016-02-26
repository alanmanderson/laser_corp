<?php namespace App\Repositories;

use App\Models\Site;

class DbSiteRepository implements SiteRepositoryInterface{
    public function findAll(){
        return Site::all();
    }

    public function find($id){
        return Site::find($id);
    }

    public function findByVendorId($vendorId){

    }

    public function findOrCreate($attributes){
        $sites = Site::whereVendorId($attributes['vendor_id']);
        if ($sites->count() > 0){
            return $sites->first();
        }
        return Site::create($attributes);
    }
}

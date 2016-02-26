<?php namespace App\Repositories;

use App\Models\Device;

class DbDeviceRepository implements DeviceRepositoryInterface{
    public function findAll(){
        return Device::all();
    }

    public function find($id){
        return Device::find($id);
    }

    public function findByVendorId($vendorId){
        return Device::whereVendorId($vendorId)->get();
    }

    public function create($attributes){
        return Device::create($attributes);
    }

    public function findOrCreate($attributes){
        $devices = Device::whereVendorId($attributes['vendor_id']);
        if ($devices->count() > 0){
            return $devices->first();
        }
        return Device::create($attributes);
    }
}

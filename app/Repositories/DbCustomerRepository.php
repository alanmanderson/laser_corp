<?php namespace App\Repositories;

use App\Models\Customer;

class DbCustomerRepository implements CustomerRepositoryInterface{
    public function findAll(){
        return Customer::all();
    }

    public function find($id){
        return Customer::find($id);
    }

    public function findOrCreate($attributes){
        $customers = Customer::whereVendorId($attributes['vendor_id']);
        if ($customers->count() > 0){
            return $customers->first();
        }
        return Customer::create($attributes);
    }
}

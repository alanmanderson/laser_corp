<?php namespace App\Repositories;

use App\Models\Alert;

class DbAlertRepository implements AlertRepositoryInterface{
    public function findAll(){
        return Alert::all();
    }

    public function findOrCreate($attributes){

    }

    public function find($id){
        return Alert::find($id);
    }

    public function create($attributes){
        return Alert::create($attributes);
    }
}

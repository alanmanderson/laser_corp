<?php
namespace HelioQuote\Repositories;

use HelioQuote\Models\ZipCode;

class DbZipCodeRepository implements ZipCodeRepositoryInterface
{

    public function getAll()
    {
        return ZipCode::all();
    }

    public function find($id)
    {
        $zipcode = ZipCode::with('utility')->find($id);
        return $zipcode;
    }
}
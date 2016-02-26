<?php
namespace App\Repositories;

interface RepositoryInterface
{
    public function findAll();

    public function find($id);

    public function findOrCreate($attributes);
}

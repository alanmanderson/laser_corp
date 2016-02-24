<?php
namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function find($id);

    public function findOrGet($attributes);
}

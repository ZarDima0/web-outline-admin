<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface UserKeyRepositoryInterface
{
    /**
     * @param array $attributes
     * @return Model|Builder
     */
    public function save(array $attributes): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder;


    /**
     * @param string $name
     * @param $accessUrl
     * @return boolean
     */
    public function find(string $name, $accessUrl): bool;

    public function getUsersCount(): int;
}

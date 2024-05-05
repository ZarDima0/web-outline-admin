<?php

namespace App\Repositories;

use App\Models\Server;
use App\Models\UserKey;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserKeyRepository implements UserKeyRepositoryInterface
{

    /**
     * @param string $name
     * @param $accessUrl
     * @return boolean
     */
    public function find(string $name, $accessUrl): bool
    {
        return UserKey::query()
            ->where('name', '=', $name)
            ->where('accessUrl', '=', $accessUrl)
            ->exists();
    }

    /**
     * @param array $attributes
     * @return Model|Builder
     */
    public function save(array $attributes): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        return UserKey::query()->create($attributes);
    }

    public function getUsersCount(): int
    {
        return UserKey::query()->count();
    }
}

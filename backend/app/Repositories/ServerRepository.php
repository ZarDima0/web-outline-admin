<?php

namespace App\Repositories;

use App\Models\Server;

use Illuminate\Support\Collection;

use function Laravel\Prompts\select;

class ServerRepository implements ServerRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getActiveServers(): \Illuminate\Support\Collection
    {
        return Server::query()
            ->where('is_active', '=', true)
            ->pluck('url');
    }
}

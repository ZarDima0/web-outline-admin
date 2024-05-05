<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ServerRepositoryInterface
{
    public function getActiveServers(): \Illuminate\Support\Collection;
}

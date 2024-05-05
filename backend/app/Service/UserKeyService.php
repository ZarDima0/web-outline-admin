<?php

namespace App\Service;

use App\ClientOutline\Call;
use App\Repositories\ServerRepositoryInterface;
use App\Repositories\UserKeyRepositoryInterface;

class UserKeyService
{
    protected ServerRepositoryInterface $serverRepository;
    protected UserKeyRepositoryInterface $userKeyRepository;

    protected Call $call;

    public function __construct(
        ServerRepositoryInterface $serverRepository,
        UserKeyRepositoryInterface $userKeyRepository,
        Call $call
    ) {
        $this->serverRepository = $serverRepository;
        $this->userKeyRepository = $userKeyRepository;
        $this->call = $call;
    }

    public function init()
    {
        $users = $this->call->getUsersKeyList($this->serverRepository->getActiveServers());
        foreach ($users as $userList) {
            foreach ($userList as $item) {
                if (!$this->userKeyRepository->find($item['name'], $item['accessUrl'])) {
                    $this->userKeyRepository->save($item);
                }
            }
        }
    }


    /**
     * @return int
     */
    public function getUsersCount(): int
    {
        return $this->userKeyRepository->getUsersCount();
    }
}

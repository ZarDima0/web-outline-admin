<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Service\UserKeyService;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\TextBlock;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class Dashboard extends Page
{
    private string $countUsers;

    public function beforeRender(): void
    {
        $userKeyService = app(UserKeyService::class);
        $this->countUsers = (string) $userKeyService->getUsersCount();
    }

    protected string $title = 'Settings';

    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Dashboard';
    }

    public function components(): array
    {
        return [
            Grid::make([
                Column::make([
                    Block::make([
                        TextBlock::make('Number of users', $this->countUsers)
                    ])
                ])->columnSpan(6),
                Column::make([
                    Block::make([
                        TextBlock::make('Title 2', 'Text 2')
                    ])
                ])->columnSpan(6),
            ])
        ];
    }
}

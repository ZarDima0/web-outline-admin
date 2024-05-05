<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Repositories\ServerRepository;
use App\Repositories\ServerRepositoryInterface;
use App\Service\UserKeyService;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserKey;

use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<UserKey>
 */
class KeyListResource extends ModelResource
{
    protected string $model = UserKey::class;

    protected string $title = 'A list of users';

    public function import(): ?ImportHandler
    {
        return null;
    }

    public function export(): ?ExportHandler
    {
        return null;
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        $userKeyService = app(UserKeyService::class);
        $userKeyService->init();
        return [
            ID::make(),
            Text::make('Name', 'name'),
            Text::make('Password', 'password'),
            Text::make('Port', 'port'),
            Text::make('Method', 'method'),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),
            Text::make('Name', 'name'),
            Text::make('Password', 'password'),
            Text::make('Port', 'port'),
            Text::make('Method', 'method'),
            Text::make('Access URl', 'accessUrl'),
        ];
    }

    /**
     * @param UserKey $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }

    private function init()
    {
        dd($this->serverRepository->getAllServers());
    }
}

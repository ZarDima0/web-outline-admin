<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Server;

use MoonShine\Fields\Switcher;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Text;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Server>
 */
class ServerResource extends ModelResource
{
    protected string $model = Server::class;

    protected string $title = 'Connection list';


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
        return [
            ID::make(),
            Text::make('Name', 'name'),
            Text::make('Path Server', 'url'),
            Switcher::make('Active', 'is_active'),
        ];
    }

    /**
     * @param Server $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}

<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use BackedEnum;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-list-bullet';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

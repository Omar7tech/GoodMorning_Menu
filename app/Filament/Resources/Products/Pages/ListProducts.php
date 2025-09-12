<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use BackedEnum;
class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;
protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-list-bullet';
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

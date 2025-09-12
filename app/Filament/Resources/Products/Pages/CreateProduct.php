<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;
use BackedEnum;
class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-plus';

}

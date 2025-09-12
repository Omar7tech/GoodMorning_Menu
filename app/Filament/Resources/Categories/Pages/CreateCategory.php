<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Resources\Pages\CreateRecord;
use BackedEnum;
class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
        protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-plus';

}

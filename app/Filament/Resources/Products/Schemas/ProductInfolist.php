<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                SpatieMediaLibraryImageEntry::make('image')
                    ->size(300)
                    ->square(),
                TextEntry::make('description')
                    ->placeholder('-'),
                IconEntry::make('active')
                    ->boolean(),
                IconEntry::make('featured')
                    ->boolean(),
                TextEntry::make('category.name')
                ,
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

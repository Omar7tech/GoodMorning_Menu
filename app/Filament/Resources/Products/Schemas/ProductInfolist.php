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
                // Product Image
                SpatieMediaLibraryImageEntry::make('image')
                    ->size(300)
                    ->square()
                    ->label('Product Image'),

                // Name
                TextEntry::make('name')
                    ->label('Name')
                    ->placeholder('-'),

                // Description
                TextEntry::make('description')
                    ->label('Description')
                    ->placeholder('-'),

                // Category
                TextEntry::make('category.name')
                    ->label('Category')
                    ->placeholder('-'),

                // Price
                TextEntry::make('price')
                    ->label('Price')
                    ->money('USD', true),

                // Active status
                IconEntry::make('active')
                    ->label('Active')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                // Featured status
                IconEntry::make('featured')
                    ->label('Featured')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-star')
                    ->trueColor('warning')
                    ->falseColor('secondary'),

                IconEntry::make('new')
                    ->label('New')
                    ->boolean()
                    ->trueIcon('heroicon-o-sparkles')
                    ->falseIcon('heroicon-o-sparkles')
                    ->trueColor('info')
                    ->falseColor('secondary'),
                // Timestamps
                TextEntry::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

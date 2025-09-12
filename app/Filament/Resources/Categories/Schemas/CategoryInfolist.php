<?php
namespace App\Filament\Resources\Categories\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category Details')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Category Name')

                            ->weight('bold')
                            ->color('primary'),

                        TextEntry::make('description')
                            ->label('Description'),
                    ])->columnSpanFull(),

                Section::make('Category Image')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('image')
                            ->label('Category Image')
                            ->size(300)
                            ->square()
                            ->extraAttributes(['class' => 'rounded-lg shadow-md']),
                    ])->columnSpanFull(),

                Section::make('Configuration')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        IconEntry::make('active')
                            ->label('Status')
                            ->boolean()
                            ->trueIcon('heroicon-o-check-circle')
                            ->falseIcon('heroicon-o-x-circle')
                            ->trueColor('success')
                            ->falseColor('danger'),

                        TextEntry::make('design')
                            ->label('Design Template')
                            ->badge()
                            ->color('info')
                            ->icon('heroicon-o-paint-brush'),
                    ])->columnSpanFull(),

                Section::make('Timeline')
                    ->icon('heroicon-o-clock')
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Created At')
                            ->dateTime('M j, Y \a\t g:i A')
                            ->icon('heroicon-o-plus-circle')
                            ->color('success'),

                        TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime('M j, Y \a\t g:i A')
                            ->since()
                            ->icon('heroicon-o-pencil-square')
                            ->color('warning'),
                    ])->columnSpanFull(),
            ]);
    }
}

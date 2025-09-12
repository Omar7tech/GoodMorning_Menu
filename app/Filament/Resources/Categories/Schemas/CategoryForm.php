<?php
namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category Information')
                    ->description('Enter the basic information for this category')
                    ->icon('heroicon-o-tag')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Enter category name'),


                                Textarea::make('description')
                                    ->maxLength(255)
                                    ->placeholder('Enter category description'),
                            ]),
                    ])
                    ->collapsible()->columnSpanFull(),

                Section::make('Visual Settings')
                    ->description('Configure the appearance and design of this category')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->disk('public')
                            ->visibility('public')
                            ->directory('categories')
                            ->image()
                            ->downloadable()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->openable()
                            ->imageEditor()
                            ->maxSize(2048)
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                Select::make('design')
                                    ->required()
                                    ->options([
                                        '1' => 'Design 1',
                                        '2' => 'Design 2',
                                    ])
                                    ->default('1')
                                    ->native(false),

                                Toggle::make('active')
                                    ->required()
                                    ->default(true),
                            ]),
                    ])
                    ->collapsible()->columnSpanFull(),
            ]);
    }
}

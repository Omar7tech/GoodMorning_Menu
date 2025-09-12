<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use BackedEnum;

class ManageVariatios extends EditRecord
{
    protected static string $resource = ProductResource::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?string $pluralModelLabel = 'Variations';
    protected static ?string $modelLabel = 'Variation';




    public static function getNavigationLabel(): string
    {
        return 'Edit Variations';
    }




    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Repeater::make('variations')
                ->schema([
                    Select::make('name')
                        ->options([
                            'S' => 'S',
                            'M' => 'M',
                            'L' => 'L',
                            'XL' => 'XL',

                        ])->native(false)
                        ->required(),
                    TextInput::make('price')
                        ->numeric()
                        ->default(0)
                        ->prefix('$')->required(),
                ])
                ->reorderableWithButtons()
                ->cloneable()
                ->columnSpanFull(),
        ]);
    }


}

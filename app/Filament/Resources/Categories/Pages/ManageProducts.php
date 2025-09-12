<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use BackedEnum;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ManageProducts extends ManageRelatedRecords
{
    protected static string $resource = CategoryResource::class;

    protected static string $relationship = 'products';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;



    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Products')
            ->reorderable('sort')
            ->defaultSort('sort', 'asc')
            ->searchable(false)
            ->columns([
                SpatieMediaLibraryImageColumn::make('image'),

                TextColumn::make('name')
                    ->label('Product Name')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::SemiBold)
                    ->color('primary')
                    ->wrap()
                    ->description(fn($record) => str($record->description)->limit(50))
                    ->extraAttributes(['class' => 'max-w-xs']),

                // Category with relationship
                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-m-tag')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('price')
                    ->label('Price')
                    ->money('USD')
                    ->sortable()
                    ->weight(FontWeight::Bold)
                    ->color('success')
                    ->alignment('center'),

                ToggleColumn::make('active')->sortable(),


                // Featured status with star icon
                ToggleColumn::make('featured')->sortable(),

                // Created date with better formatting
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->color('gray')
                    ->icon('heroicon-m-calendar')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->tooltip(fn($record) => $record->created_at->format('F j, Y g:i A')),

                // Updated date
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->color('gray')
                    ->icon('heroicon-m-clock')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->tooltip(fn($record) => $record->updated_at->format('F j, Y g:i A')),

            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->recordActions([

            ])
            ->toolbarActions([

            ]);
    }
}

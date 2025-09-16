<?php

namespace App\Filament\Resources\Products\Tables;

use App\Models\Category;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Support\Enums\FontWeight;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image'),

                // Product Name with enhanced styling
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
                    ->url(fn($record) => $record->category
                        ? route('filament.admin.resources.categories.view', ['record' => $record->category])
                        : null)->searchable(),

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

                ToggleColumn::make('new')
                    ->label('New')
                    ->sortable(),


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
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->indicator('Category')
                    ->multiple()
                    ->preload(),

                TernaryFilter::make('active')
                    ->label('Status')
                    ->indicator('Status')
                    ->trueLabel('Active Products')
                    ->falseLabel('Inactive Products')
                    ->native(false)
                    ->placeholder('All Products'),

                TernaryFilter::make('featured')
                    ->label('Featured')
                    ->indicator('Featured')
                    ->native(false)
                    ->trueLabel('Featured Products')
                    ->falseLabel('Not Featured')
                    ->placeholder('All Products'),

                TernaryFilter::make('new')
                    ->label('New')
                    ->indicator('New')
                    ->native(false)
                    ->trueLabel('New Products')
                    ->falseLabel('Not New')
                    ->placeholder('All Products'),

            ])
            ->actions([

                ViewAction::make()
                    ->color('info')
                    ->icon('heroicon-m-eye'),
                EditAction::make()
                    ->color('warning')
            ])



            ->defaultSort('created_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50])
            ->recordUrl(null)
            ->emptyStateHeading('No products found')
            ->emptyStateDescription('Start by creating your first product to see it listed here.')
            ->emptyStateIcon('heroicon-o-cube')
        ;
    }
}

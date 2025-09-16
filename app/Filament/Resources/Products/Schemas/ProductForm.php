<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Product Information Section
                Section::make('📦 Product Details')
                    ->description('Essential information about your product')
                    ->icon('heroicon-o-cube-transparent')
                    ->iconColor('primary')
                    ->headerActions([
                        // Optional: Add quick actions here if needed
                    ])
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                // Product Name - Full Width
                                TextInput::make('name')
                                    ->label('Product Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('e.g., Premium Crepe')
                                    ->helperText('Choose a clear, descriptive name for your product')
                                    ->columnSpan(12)
                                    ->suffixIcon('heroicon-m-pencil')
                                    ->extraInputAttributes(['class' => 'font-medium']),

                                // Description - Full Width
                                Textarea::make('description')
                                    ->label('Product Description')
                                    ->maxLength(255)
                                    ->rows(4)
                                    ->placeholder('Highlight the key features, benefits, and what makes this product special...')
                                    ->helperText('Maximum 500 characters - focus on what customers care about most')
                                    ->columnSpan(12)
                                    ->extraInputAttributes(['class' => 'resize-none']),

                                // Price and Category Row
                                TextInput::make('price')
                                    ->label('💰 Selling Price')
                                    ->required()
                                    ->numeric()
                                    ->default(0.00)
                                    ->minValue(0)
                                    ->step(0.01)
                                    ->prefix('$')
                                    ->placeholder('29.99')
                                    ->helperText('Set competitive pricing')
                                    ->columnSpan(['sm' => 12, 'md' => 6])
                                    ->suffixIcon('heroicon-m-currency-dollar'),

                                Select::make('category_id')
                                    ->label('🏷️ Product Category')
                                    ->relationship(
                                        name: 'category',
                                        titleAttribute: 'name',
                                    )

                                    ->required()
                                    ->preload()
                                    ->searchable()

                                    ->placeholder('Choose the best category')
                                    ->helperText('Select the most relevant category')
                                    ->columnSpan(['sm' => 12, 'md' => 6])
                                    ->suffixIcon('heroicon-m-tag'),
                            ])
                    ])
                    ->columnSpan(['sm' => 12, 'lg' => 8])
                    ->collapsible()
                    ->collapsed(false),

                // Media Upload Section
                Section::make('🖼️ Product Image')
                    ->description('Visual representation of your product')
                    ->icon('heroicon-o-camera')
                    ->iconColor('success')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->label('Upload Images')
                            ->disk('public')
                            ->visibility('public')
                            ->directory('products')
                            ->image()
                            ->downloadable()
                            ->openable()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                                '3:4',
                            ])
                            ->maxSize(2048)
                            ->helperText('📸 Upload high-quality image (max 2MB)')
                            ->columnSpanFull()
                    ])
                    ->columnSpan(['sm' => 12, 'lg' => 4])
                    ->collapsible()
                    ->collapsed(false),

                // Product Settings & Status
                Section::make('⚙️ Product Settings')
                    ->description('Control how your product appears to customers')
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->iconColor('warning')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Toggle::make('active')
                                    ->label('🔴 Product Status')
                                    ->helperText('Toggle to show/hide from customers')
                                    ->required()
                                    ->default(true)
                                    ->onIcon('heroicon-m-eye')
                                    ->offIcon('heroicon-m-eye-slash')
                                    ->onColor('success')
                                    ->offColor('danger')
                                    ->inline(false)
                                    ->columnSpan(1),

                                Toggle::make('featured')
                                    ->label('⭐ Featured Product')
                                    ->helperText('Highlight in featured sections')
                                    ->required()
                                    ->default(false)
                                    ->onIcon('heroicon-m-star')
                                    ->offIcon('heroicon-m-star')
                                    ->onColor('warning')
                                    ->offColor('gray')
                                    ->inline(false)
                                    ->columnSpan(1),

                                Toggle::make('new')
                                    ->label('🆕 New Product')
                                    ->helperText('Mark as new arrival')
                                    ->required()
                                    ->default(false)
                                    ->onColor('info')
                                    ->offColor('gray')
                                    ->inline(false)
                                    ->columnSpan(1)
                            ])
                    ])
                    ->columnSpan(12)
                    ->collapsible()
                    ->collapsed(true),


            ]);
    }
}

<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use app\Settings\GeneralSettings;

class ManageGeneral extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = GeneralSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Toggle::make('site_active')
                    ->required(),
                Toggle::make('featured_show')
                    ->required(),
                Toggle::make('new_show')
                    ->required(),
                TextInput::make('instagram_url'),
                Toggle::make('instagram_active')
                    ->required(),
                TextInput::make('facebook_url'),
                Toggle::make('facebook_active')
                    ->required(),
                TextInput::make('whatsapp_number'),
                Toggle::make('whatsapp_active')
                    ->required(),
                TextInput::make('phone_number')
                    ->tel(),
                Toggle::make('phone_active')
                    ->required(),
                TextInput::make('email')
                    ->email(),
                Toggle::make('email_active')
                    ->required(),
                TextInput::make('location_url'),
                Toggle::make('location_active')
                    ->required(),
            ]);
    }
}

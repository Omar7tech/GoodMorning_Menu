<?php
namespace App\Filament\Pages;

use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use App\Settings\GeneralSettings;

class ManageGeneral extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'General Settings';

    protected static ?string $title = 'General Settings';


    protected static string $settings = GeneralSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                // General Site Settings
                Section::make('Site Configuration')
                    ->description('Configure basic site settings and display options')
                    ->icon('heroicon-o-globe-alt')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Toggle::make('site_active')
                                    ->label('Site Active')
                                    ->helperText('Enable or disable the entire website')
                                    ->inline(false),

                                Select::make('theme')
                                    ->label('Site Theme')
                                    ->options([
                                        'light' => 'Light',
                                        'dark' => 'Dark',
                                        'corporate' => 'Corporate',
                                        'business' => 'Business',
                                        'emerald' => 'Emerald',
                                        'lofi' => 'Lofi',
                                        'winter' => 'Winter',
                                        'black' => 'Black',
                                    ])
                                    ->native(false)
                                ,
                            ]),

                        Grid::make(2)
                            ->schema([
                                Toggle::make('featured_show')
                                    ->label('Show Featured Items')
                                    ->helperText('Display featured content on the homepage')
                                    ->inline(false),

                                Toggle::make('new_show')
                                    ->label('Show New Items')
                                    ->helperText('Display new/recent content')
                                    ->inline(false),
                            ]),
                    ])
                    ->collapsible(),

                // Social Media Settings
                Section::make('Social Media')
                    ->description('Configure social media links and visibility')
                    ->icon('heroicon-o-share')
                    ->schema([
                        // Instagram
                        Grid::make(3)
                            ->schema([
                                TextInput::make('instagram_url')
                                    ->label('Instagram URL')
                                    ->url()
                                    ->placeholder('https://instagram.com/username')
                                    ->prefixIcon('heroicon-o-camera')
                                    ->columnSpan(2),

                                Toggle::make('instagram_active')
                                    ->label('Show Instagram')
                                    ->inline(false)
                                    ->columnSpan(1),
                            ]),

                        // Facebook
                        Grid::make(3)
                            ->schema([
                                TextInput::make('facebook_url')
                                    ->label('Facebook URL')
                                    ->url()
                                    ->placeholder('https://facebook.com/page')
                                    ->prefixIcon('heroicon-o-globe-alt')
                                    ->columnSpan(2),

                                Toggle::make('facebook_active')
                                    ->label('Show Facebook')
                                    ->inline(false)
                                    ->columnSpan(1),
                            ]),
                    ])
                    ->collapsible(),

                // Contact Information
                Section::make('Contact Information')
                    ->description('Manage contact details and their visibility')
                    ->icon('heroicon-o-phone')
                    ->schema([
                        // WhatsApp
                        Grid::make(2)
                            ->schema([
                                TextInput::make('whatsapp_number')
                                    ->label('WhatsApp Number')
                                    ->tel()
                                    ->placeholder('+1234567890')
                                    ->prefixIcon('heroicon-o-chat-bubble-bottom-center-text')
                                    ->helperText('Include country code (e.g., +1234567890)'),

                                Grid::make(1)
                                    ->schema([
                                        Toggle::make('whatsapp_active')
                                            ->label('Show WhatsApp')
                                            ->inline(false),

                                        Toggle::make('whatsapp_number_on_top')
                                            ->label('Display WhatsApp Prominently')
                                            ->helperText('Show WhatsApp number in header/top section')
                                            ->inline(false),
                                    ]),
                            ]),

                        // Phone
                        Grid::make(3)
                            ->schema([
                                TextInput::make('phone_number')
                                    ->label('Phone Number')
                                    ->tel()
                                    ->placeholder('+1234567890')
                                    ->prefixIcon('heroicon-o-phone')
                                    ->columnSpan(2),

                                Toggle::make('phone_active')
                                    ->label('Show Phone')
                                    ->inline(false)
                                    ->columnSpan(1),
                            ]),

                        // Email
                        Grid::make(3)
                            ->schema([
                                TextInput::make('email')
                                    ->label('Email Address')
                                    ->email()
                                    ->placeholder('contact@example.com')
                                    ->prefixIcon('heroicon-o-envelope')
                                    ->columnSpan(2),

                                Toggle::make('email_active')
                                    ->label('Show Email')
                                    ->inline(false)
                                    ->columnSpan(1),
                            ]),

                        // Location
                        Grid::make(3)
                            ->schema([
                                TextInput::make('location_url')
                                    ->label('Location/Maps URL')
                                    ->url()
                                    ->placeholder('https://maps.google.com/...')
                                    ->prefixIcon('heroicon-o-map-pin')
                                    ->helperText('Google Maps or other map service URL')
                                    ->columnSpan(2),

                                Toggle::make('location_active')
                                    ->label('Show Location')
                                    ->inline(false)
                                    ->columnSpan(1),
                            ]),
                    ])
                    ->collapsible(),
            ]);
    }
}

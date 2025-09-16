<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    public bool $site_active;
    public bool $featured_show;
    public bool $new_show;
    public ?string $instagram_url;
    public bool $instagram_active;
    public ?string $facebook_url;
    public bool $facebook_active;
    public ?string $whatsapp_number;
    public bool $whatsapp_number_on_top;
    public bool $whatsapp_active;
    public ?string $phone_number;
    public bool $phone_active;
    public ?string $email;
    public bool $email_active;
    public ?string $location_url;
    public bool $location_active;
    public ?string $theme;


    public static function group(): string
    {
        return 'general';
    }
}

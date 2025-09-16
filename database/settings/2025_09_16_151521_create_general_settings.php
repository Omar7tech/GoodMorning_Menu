<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.featured_show', true);
        $this->migrator->add('general.new_show', true);
        $this->migrator->add('general.instagram_url', 'https://www.instagram.com/');
        $this->migrator->add('general.instagram_active', false);
        $this->migrator->add('general.facebook_url', 'https://www.facebook.com/');
        $this->migrator->add('general.facebook_active', false);
        $this->migrator->add('general.whatsapp_number', '+1234567890');
        $this->migrator->add('general.whatsapp_number_on_top', true);
        $this->migrator->add('general.whatsapp_active', false);
        $this->migrator->add('general.phone_number', '+0987654321');
        $this->migrator->add('general.phone_active', false);
        $this->migrator->add('general.email', 'info@example.com');
        $this->migrator->add('general.email_active', false);
        $this->migrator->add('general.location_url', 'https://maps.google.com/');
        $this->migrator->add('general.location_active', false);
        $this->migrator->add('general.theme', 'light');
    }
};

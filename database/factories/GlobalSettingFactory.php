<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GlobalSetting>
 */
class GlobalSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'admin_email' => 'dikewisdom787@gmail.com',
            'default_mail_address' => 'admin@hetdynamic.com',
            'support_mail_address' => 'dikewisdom100@gmail.com',
            'admin_phone' => '+2348087775056',
            'admin_address' => 'Head office: No 3 Akpoguma Street, Kilo Bus Stop Surulere Lagos.',
            'site_logo' => asset('/assets/custom/resources/1711099322.png'),
            'site_favicon' => asset('images/favicon.png'),
            'site_name' => config('app.name'),
            'site_description' => 'Hetdynamic Global Services is a company that provides services in the areas of web development, mobile app development, digital marketing, and more.',
            'site_facebook' => 'https://web.facebook.com/profile.php?id=100062221932008',
            'site_twitter' => 'https://twitter.com/emmanuelIwok3',
            'site_url' => config('app.url'),
            'site_youtube' => 'https://youtube.com/@codecorner2006?si=l_rL8WW_BPzV4XqM',
            'site_address' => 'Address: Head office: No 3 Akpoguma Street, Kilo Bus Stop Surulere Lagos.',
            'site_phone' => '+2347017322039',
            'site_email' => 'info@hetdynamic.com',
            'site_instagram' => 'https://www.instagram.com/iwokcodes/',
            'site_linkedin' => 'https://www.linkedin.com/feed/',
            'site_pinterest' => 'https://www.pinterest.com/iwokemmanuel49/',
            'mail_address' => 'info@hetdynamic.com',
            'mail_host' => 'admin@hetdynamic.com',
        ];
    }
}

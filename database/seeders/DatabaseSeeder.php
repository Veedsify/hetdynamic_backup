<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\GlobalSetting;
use App\Models\AboutpageAbout;
use App\Models\HomepageBanner;
use App\Models\AboutpageBanner;
use App\Models\HomepageSupport;
use App\Models\TermspageBanner;
use Illuminate\Database\Seeder;
use App\Models\HomepageCoaching;
use App\Models\ReviewpageBanner;
use App\Models\TermspageContent;
use App\Models\ContactpageBanner;
use App\Models\PrivacypageBanner;
use App\Models\ReviewpageContent;
use App\Models\HomepageConsulting;
use App\Models\PrivacypageContent;
use App\Models\AboutpageExperience;
use App\Models\ContactpageLocation;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        Service::create([
            'name' => 'Study',
            'slug' => 'study',
            'description' => 'Study',
        ]);

        Service::create([
            'name' => 'Work Permit',
            'slug' => 'work-permit',
            'description' => 'Work Permits',
        ]);

        Service::create([
            'name' => 'Residency',
            'slug' => 'residency',
            'description' => 'Residency',
        ]);

        Service::create([
            'name' => 'Citizenship',
            'slug' => 'citizenship',
            'description' => 'Citizenship',
        ]);
        HomepageBanner::create([
            'banner_text_1' => 'Welcome to our website',
            'banner_text_2' => 'We are heure to help you',
            'banner_text_3' => 'We are here to help you',
            'banner_image_1' => 'https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&w=900',
            'banner_image_2' => 'https://images.pexels.com/photos/2265876/pexels-photo-2265876.jpeg?auto=compress&w=900',
            'banner_image_3' => 'https://images.pexels.com/photos/2087391/pexels-photo-2087391.jpeg?auto=compress&w=900'
        ]);

        HomepageConsulting::create([
            'consulting_title' => 'Consulting Services',
            'consulting_description' => 'We provide the best consulting services',
            'consulting_feature_1' => 'Feature 1',
            'consulting_feature_2' => 'Feature 2',
            'consulting_desc_1' => 'Description 1',
            'consulting_desc_2' => 'Description 2',
            'consulting_image' => 'https://images.pexels.com/photos/2108845/pexels-photo-2108845.jpeg?auto=compress&cs=tinysrgb&w=600',
            'consulting_image_2' => 'https://images.pexels.com/photos/2070485/pexels-photo-2070485.jpeg?auto=compress&cs=tinysrgb&w=400'
        ]);
        HomepageSupport::create([
            'support_title' => 'Support Services',
            'support_feature_1' => 'Feature 1',
            'support_feature_2' => 'Feature 2',
            'support_feature_3' => 'Feature 3',
            'support_video' => 'https://www.youtube.com/watch?v=vhfTKjZ5a3k',
            'support_image' => 'https://images.pexels.com/photos/2108845/pexels-photo-2108845.jpeg?auto=compress&cs=tinysrgb&w=600'
        ]);
        HomepageCoaching::create([
            'coaching_title' => 'Coaching Services',
            'coaching_description' => 'We provide the best coaching services',
        ]);
        AboutpageBanner::create([
            'about_banner_title' => 'About Us',
            'about_banner_image' => 'https://images.pexels.com/photos/2108845/pexels-photo-2108845.jpeg?auto=compress&cs=tinysrgb&w=600',
        ]);

        AboutpageExperience::create([
            'experience_title' => 'Experience Title',
            'experience_sub_title' => 'Experience Sub-Title',
            'experience_description' => 'This is a description of our experience.',
            'experience_feature_1' => 'Feature 1',
            'experience_feature_2' => 'Feature 2',
            'experience_years' => 5,
            'experience_image_1' => 'https://images.pexels.com/photos/2108845/pexels-photo-2108845.jpeg?auto=compress&cs=tinysrgb&w=600',
            'experience_image_2' => 'https://images.pexels.com/photos/2108845/pexels-photo-2108845.jpeg?auto=compress&cs=tinysrgb&w=600',
        ]);
        AboutpageAbout::create([
            'about_us_title' => 'Your Title Here',
            'about_us_sub_title_1' => 'Your Sub-Title 1 Here',
            'about_us_sub_title_2' => 'Your Sub-Title 2 Here',
            'about_us_description_1' => 'Your Description 1 Here',
            'about_us_description_2' => 'Your Description 2 Here',
            'about_us_feature_1' => 'Your Feature 1 Here',
            'about_us_feature_2' => 'Your Feature 2 Here',
        ]);
        ContactpageBanner::create([
            'contact_banner_title' => 'Your Title Here',
            'contact_banner_image' => 'https://images.pexels.com/photos/2108845/pexels-photo-2108845.jpeg?auto=compress&cs=tinysrgb&w=600',

        ]);
        ContactpageLocation::create([
            'location_title' => 'Your Title Here',
            'location_description' => 'location_description',

        ]);
        PrivacypageBanner::create([
            'privacy_banner_title' => 'Your Title Here',
            'privacy_banner_image' => 'https://images.pexels.com/photos/2108845/pexels-photo-2108845.jpeg?auto=compress&cs=tinysrgb&w=600',

        ]);

        PrivacypageContent::create([
            'privacy_title' => 'Your Title Here',
            'privacy_description' => 'privacy_description',
        ]);

        TermspageBanner::create([
            'terms_banner_title' => 'Your Title Here',
            'terms_banner_image' => 'https://images.pexels.com/photos/2108845/pexels-photo-2108845.jpeg?auto=compress&cs=tinysrgb&w=600',

        ]);

        TermspageContent::create([
            'terms_title' => 'Your Title Here',
            'terms_description' => 'terms_description',
        ]);

        ReviewpageBanner::create([
            'review_banner_title' => 'Your Title Here',
            'review_banner_image' => 'https://images.pexels.com/photos/2108845/pexels-photo-2108845.jpeg?auto=compress&cs=tinysrgb&w=600',

        ]);

        ReviewpageContent::create([
            'review_title' => 'Your Title Here',
            'review_description' => 'Your Title Here',
            'review_list_1' => 'Your Title Here',
            'review_list_2' => 'Your Title Here',
            'review_list_3' => 'Your Title Here',
        ]);

        Country::factory(10)->create();
        Category::factory(10)->create();
        GlobalSetting::factory(1)->create();
    }
}

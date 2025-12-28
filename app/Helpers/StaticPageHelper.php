<?php
namespace App\Helpers;

use App\Models\AboutPage;
use App\Models\TermsPage;
use App\Models\PrivacyPage;
use Illuminate\Support\Facades\Cache;

class StaticPageHelper
{
    public static function getAboutPage()
    {
        return Cache::remember('static_page_about', 60 * 24, function () {
            return AboutPage::first();
        });
    }
    public static function getTermsPage()
    {
        return Cache::remember('static_page_terms', 60 * 24, function () {
            return TermsPage::first();
        });
    }
    public static function getPrivacyPage()
    {
        return Cache::remember('static_page_privacy', 60 * 24, function () {
            return PrivacyPage::first();
        });
    }

}

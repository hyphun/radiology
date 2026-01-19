<?php
namespace App\Helpers;

use App\Models\AboutPage;
use App\Models\TermsPage;
use App\Models\PrivacyPage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
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

    public static function getGalleryPage()
    {
        return Cache::remember('gallery_page_result',600, function (){
            return self::getImages()??[];
        });
    }

    public static function getImages($folder = '/')
    {
        $folder = 'radiology_center_gallery';
        $storage = 'advancedimagingrevie';
        $response = Http::withHeaders(
            [
                'AccessKey' => '761956a3-48c6-472e-9015c776b3c8-ac15-4454',
                'accept' => 'application/json'
            ]
        )->get("https://storage.bunnycdn.com/" .$storage. '/'.$folder.'/');

        //dd($response->json());
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch files'], 500);
        }

        $files = $response->json();
        $list = [];
        foreach ($files as $key => $file){
            $list[] = 'https://radiology-air.b-cdn.net/' . $folder .'/'.$file['ObjectName'];
        }
        return $list;
    }

}

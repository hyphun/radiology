<?php

namespace App\Services\Frontend;

use App\Models\Page;
use App\Models\Program;
use App\Helpers\CacheHelper;
class HomeService
{
    public function getFeaturedPrograms(): \Illuminate\Database\Eloquent\Collection
    {
        // return Program::where('status', 'active')
        //     ->latest()
        //     ->take(6)
        //     ->get();
        return CacheHelper::getFeaturedPrograms(6);
    }

    public function getHomePage(): object
    {
        return (object) [
            'meta'=>[
                'meta_title' => 'Welcome to Advanced Radiology Services',
                'meta_description' => 'Providing state-of-the-art diagnostic imaging services in Narnaund, Haryana.',
                ],
            'banner_image' => 'assets/images/home-banner.jpg',
            ];
    }

    public function getHeroStats(): array
    {
        return [
            'totalPrograms' => Program::where('status', 'active')->count(),
            'totalCategories' => Program::with('category')->where('status', 'active')->distinct('category_id')->count(),
        ];
    }
}

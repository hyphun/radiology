<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\HomeService;
use Illuminate\Http\Request;
use App\Helpers\HomepageHelper;
use App\Helpers\CacheHelper;
class HomeController extends Controller
{
    public function __construct(
        private HomeService $homeService
    ) {}

    public function index()
    {
        $siteSetting = CacheHelper::getSiteSettings();
        $sliders = HomepageHelper::getHeroSliders();
        $introBoxes = HomepageHelper::getIntroBoxes();
        $teamMembers = HomepageHelper::getTeamMembers();
        $data = [
            'programs' => CacheHelper::getFeaturedPrograms(4),
            'introBoxes' => $introBoxes,
            'teams' => $teamMembers,
            'sliders' => $sliders,
            'siteSetting' => $siteSetting,
        ];
        return view('frontend.home', $data);
    }
}

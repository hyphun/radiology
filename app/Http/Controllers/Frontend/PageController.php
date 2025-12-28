<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\PageService;
use Illuminate\Http\Request;
use App\Helpers\StaticPageHelper;
class PageController extends Controller
{
    public function __construct(
        private PageService $pageService
    ) {}

    public function show(string $slug)
    {
        $page = $this->pageService->getPageBySlug($slug);

        return view('frontend.pages.show', [
            'page' => $page,
            'seo' => $this->pageService->getSeoData($page),
        ]);
    }

    public function aboutPage()
    {
        $page = StaticPageHelper::getAboutPage();
        return view('frontend.about', [
            'page' => $page,
        ]);
    }

    public function privacyPage()
    {
        $page = StaticPageHelper::getPrivacyPage();
        return view('frontend.privacy', [
            'page' => $page,
        ]);
    }

    public function termsPage()
    {
        $page = StaticPageHelper::getTermsPage();
        return view('frontend.terms', [
            'page' => $page,
        ]);
    }

}

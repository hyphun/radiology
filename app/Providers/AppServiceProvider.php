<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Page;
use App\Observers\PageObserver;
use App\Observers\ProgramObserver;
use App\Observers\SiteSettingObserver;
use App\Observers\SliderObserver;
use App\Observers\TeamObserver;
use App\Observers\IntroBoxObserver;
use App\Observers\AboutPageObserver;
use App\Observers\TermsPageObserver;
use App\Observers\PrivacyPageObserver;
use App\Models\Program;
use App\Models\SiteSetting;
use App\Models\HomeHeroSlider;
use App\Models\HomeTeamMember;
use App\Models\HomeIntroBox;
use App\Models\AboutPage;
use App\Models\PrivacyPage;
use App\Models\TermsPage;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->singleton(HomeService::class);
        $this->app->singleton(ProgramService::class);
        $this->app->singleton(PageService::class);
        $this->app->singleton(ContactService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Page::observe(PageObserver::class);
        Program::observe(ProgramObserver::class);
        SiteSetting::observe(SiteSettingObserver::class);
        HomeHeroSlider::observe(SliderObserver::class);
        HomeTeamMember::observe(TeamObserver::class);
        HomeIntroBox::observe(IntroBoxObserver::class);
        AboutPage::observe(AboutPageObserver::class);
        PrivacyPage::observe(PrivacyPageObserver::class);
        TermsPage::observe(TermsPageObserver::class);
    }
}

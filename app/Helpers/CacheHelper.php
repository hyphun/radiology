<?php

namespace App\Helpers;

use App\Models\Page;
use App\Models\SiteSetting;
use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    // Cache keys - Pages
    private const PAGES_CACHE_KEY = 'frontend_pages';
    private const SITE_SETTING_CACHE_KEY = 'frontend_site_settings';
    private const ACTIVE_PAGES_CACHE_KEY = 'frontend_pages_active';
    private const NAV_PAGES_CACHE_KEY = 'frontend_nav_pages';

    // Cache keys - Programs
    private const PROGRAMS_CACHE_KEY = 'frontend_programs';
    private const ACTIVE_PROGRAMS_CACHE_KEY = 'frontend_programs_active';
    private const NAV_PROGRAMS_CACHE_KEY = 'frontend_nav_programs';
    private const FEATURED_PROGRAMS_CACHE_KEY = 'frontend_featured_programs';

    private const CATEGORIES_CACHE_KEY = 'frontend_categories';
    private const ACTIVE_CATEGORIES_CACHE_KEY = 'frontend_categories_active';
    private const ACTIVE_PROGRAMS_PAGINATED_CACHE_REGISTRY = 'active_programs_paginated_keys';

    private const CACHE_DURATION = 60 * 24 * 30; // minutes


    public static function getSiteSettings()
    {
        return Cache::remember(self::SITE_SETTING_CACHE_KEY, self::CACHE_DURATION, function () {
            return SiteSetting::first();
        });
    }

    public static function getAllPages(): \Illuminate\Support\Collection
    {
        return Cache::remember(self::PAGES_CACHE_KEY, self::CACHE_DURATION, function () {
            return Page::all();
        });
    }

    public static function getActivePages(): \Illuminate\Support\Collection
    {
        return Cache::remember(self::ACTIVE_PAGES_CACHE_KEY, self::CACHE_DURATION, function () {
            return Page::where('status', 'active')->orderBy('created_at', 'desc')->get();
        });
    }

    public static function getNavigationPages(): \Illuminate\Support\Collection
    {
        return Cache::remember(self::NAV_PAGES_CACHE_KEY, self::CACHE_DURATION, function () {
            return Page::where('status', 'active')
                ->where('show_in_nav', true)
                ->orderBy('order', 'asc')
                ->orderBy('title', 'asc')
                ->get();
        });
    }

    public static function getPageBySlug(string $slug): ?Page
    {
        $cacheKey = "page_slug_{$slug}";

        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($slug) {
            return Page::where('slug', $slug)->where('status', 'active')->first();
        });
    }


    public static function getAllPrograms(): \Illuminate\Support\Collection
    {
        return Cache::remember(self::PROGRAMS_CACHE_KEY, self::CACHE_DURATION, function () {
            return Program::with('category')->orderBy('order', 'asc')->orderBy('title', 'asc')->get();
        });
    }


    public static function getActivePrograms(): \Illuminate\Support\Collection
    {
        return Cache::remember(self::ACTIVE_PROGRAMS_CACHE_KEY, self::CACHE_DURATION, function () {
            return Program::where('status', 'active')
                ->with('category')
                ->orderBy('created_at', 'desc')
                ->get();
        });
    }

    public static function getActiveProgramsPaginated(int $perPage = 12): \Illuminate\Pagination\LengthAwarePaginator
    {

        $page = request()->get('page', 1);
        $cacheKey = self::ACTIVE_PROGRAMS_PAGINATED_CACHE_REGISTRY . "_paginated_{$perPage}_{$page}";

        $data = Cache::remember($cacheKey, 15, function () use ($perPage) {
            $query = Program::where('status', 'active')
                ->with('category')
                ->orderBy('created_at', 'desc')
                ->orderBy('title', 'asc');
            return $query->paginate($perPage);
        });

        $keys = Cache::get(self::ACTIVE_PROGRAMS_PAGINATED_CACHE_REGISTRY, []);
        $keys[$cacheKey] = true;
        Cache::forever(self::ACTIVE_PROGRAMS_PAGINATED_CACHE_REGISTRY, $keys);
        return $data;
    }


    /**
     * Get programs for navigation dropdown (limited + ordered)
     */
    public static function getNavigationPrograms(): array
    {
        $cacheKey = self::NAV_PROGRAMS_CACHE_KEY;
        return Cache::remember($cacheKey, self::CACHE_DURATION, function (){
            $total = Program::where('status', 'active')->count();
            $rows = Program::where('status', 'active')
                ->with('category')
                ->orderBy('order', 'asc')
                ->orderBy('title', 'asc')
                ->limit(5)
                ->get();
            return ['total' => $total, 'programs' => $rows];
        });
    }

    /**
     * Get featured programs (for homepage)
     */
    public static function getFeaturedPrograms(int $limit = 6): \Illuminate\Support\Collection
    {
        $cacheKey = self::FEATURED_PROGRAMS_CACHE_KEY . "_{$limit}";

        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($limit) {
            return Program::where('status', 'active')
                ->with('category')
                ->latest()
                ->limit($limit)
                ->get();
        });
    }

    /**
     * Get program by slug
     */
    public static function getProgramBySlug(string $slug): ?Program
    {
        $cacheKey = "program_slug_{$slug}";

        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($slug) {
            return Program::where('slug', $slug)
                ->where('status', 'active')
                ->with('category')
                ->first();
        });
    }

    public static function getProgramCategories(int $limit = null): \Illuminate\Support\Collection
    {
        $cacheKey = self::ACTIVE_CATEGORIES_CACHE_KEY . ($limit ? "_{$limit}" : '_all');

        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($limit) {
            $query = ProgramCategory::where('status', 'active')
                ->withCount(['programs' => function ($query) {
                    $query->where('status', 'active');
                }])
                ->orderBy('order', 'asc')
                ->orderBy('name', 'asc');

            if ($limit) {
                $query->limit($limit);
            }

            return $query->get();
        });
    }

    /**
     * Get category by slug
     */
    public static function getCategoryBySlug(string $slug): ?ProgramCategory
    {
        $cacheKey = "category_slug_{$slug}";

        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($slug) {
            return ProgramCategory::where('slug', $slug)
                ->where('status', 'active')
                ->first();
        });
    }


    public static function clearPageCache(): void
    {
        Cache::forget(self::PAGES_CACHE_KEY);
        Cache::forget(self::ACTIVE_PAGES_CACHE_KEY);
        Cache::forget(self::NAV_PAGES_CACHE_KEY);

        // Clear individual page slugs
        $pages = Page::all(['slug']);
        foreach ($pages as $page) {
            Cache::forget("page_slug_{$page->slug}");
        }
    }

    public static function clearProgramCache(): void{
        Cache::forget(self::PROGRAMS_CACHE_KEY);
        Cache::forget(self::ACTIVE_PROGRAMS_CACHE_KEY);
        Cache::forget(self::NAV_PROGRAMS_CACHE_KEY);
        Cache::forget(self::FEATURED_PROGRAMS_CACHE_KEY);
        Cache::forget(self::ACTIVE_PROGRAMS_PAGINATED_CACHE_REGISTRY);
    }

    /**
     * Clear all category-related caches
     */
    public static function clearCategoryCache(): void
    {
        // Clear all category cache variants
        for ($i = 1; $i <= 20; $i++) {
            Cache::forget(self::ACTIVE_CATEGORIES_CACHE_KEY . "_{$i}");
        }
        Cache::forget(self::ACTIVE_CATEGORIES_CACHE_KEY . '_all');

        // Clear individual category slugs
        $categories = ProgramCategory::all(['slug']);
        foreach ($categories as $category) {
            Cache::forget("category_slug_{$category->slug}");
        }
    }

    public static function clearSiteSettingCache(): void
    {
        Cache::forget(self::SITE_SETTING_CACHE_KEY);
    }

    /**
     * Clear ALL frontend caches
     */
    public static function clearAllCache(): void
    {
        self::clearPageCache();
        self::clearProgramCache();
        self::clearCategoryCache();
    }

    // ========================================
    // CACHE REFRESH METHODS
    // ========================================

    /**
     * Refresh page cache (clear + rebuild)
     */
    public static function refreshPageCache(): void
    {
        self::clearPageCache();

        // Pre-warm cache
        self::getAllPages();
        self::getActivePages();
        self::getNavigationPages();
    }

    /**
     * Refresh program cache (clear + rebuild)
     */
    public static function refreshProgramCache(): void
    {
        self::clearProgramCache();

        // Pre-warm cache
        self::getAllPrograms();
        self::getActivePrograms();
        self::getNavigationPrograms();
        self::getFeaturedPrograms(6);
    }

    /**
     * Refresh category cache (clear + rebuild)
     */
    public static function refreshCategoryCache(): void
    {
        self::clearCategoryCache();

        // Pre-warm cache
        self::getProgramCategories(6);
    }

    public static function refreshSiteSettingCache(): void
    {
        self::clearSiteSettingCache();
        self::getSiteSettings();
    }

    /**
     * Refresh all caches
     */
    public static function refreshAllCache(): void
    {
        self::refreshPageCache();
        self::refreshProgramCache();
        self::refreshCategoryCache();
        self::refreshSiteSettingCache();
    }
}

<?php
namespace App\Services\Frontend;
use App\Helpers\CacheHelper;
use App\Models\Page;

class PageService
{
    public function getPageBySlug(string $slug): Page
    {
        $page = CacheHelper::getPageBySlug($slug);

        if (!$page) {
            abort(404, 'Page not found');
        }

        return $page;
    }

    public function getActivePages(): \Illuminate\Support\Collection
    {
        return CacheHelper::getActivePages();
    }

    public function getSeoData(Page $page): array
    {
        return [
            'title' => $page->meta_title ?? $page->title,
            'description' => $page->meta_description ?? \Str::limit(strip_tags($page->content), 160),
            'image' => $page->meta_image ?? $page->banner_image,
        ];
    }
}


<?php

namespace App\Console\Commands;

use App\Helpers\CacheHelper;
use Illuminate\Console\Command;

class ClearPageCache extends Command
{
    protected $signature = 'cache:clear-pages';
    protected $description = 'Clear all page-related caches';

    public function handle()
    {
        CacheHelper::clearPageCache();
        $this->info('✅ Page cache cleared successfully!');
        CacheHelper::refreshPageCache();
        $this->info('✅ Page cache refreshed!');
        return Command::SUCCESS;
    }
}

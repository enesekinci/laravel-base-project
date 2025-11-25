<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Meilisearch\Client;

class SetupMeilisearchIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meilisearch:setup-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Meilisearch index settings for products (filterable, sortable attributes)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (config('scout.driver') !== 'meilisearch') {
            $this->error('Scout driver is not set to meilisearch. Please set SCOUT_DRIVER=meilisearch in .env');

            return 1;
        }

        /** @var Client $client */
        $client = app(Client::class);
        $index = $client->index('products');

        $this->info('Setting up filterable attributes...');
        $index->updateFilterableAttributes([
            'is_active',
            'in_stock',
            'category_ids',
            'color_ids',
            'size_ids',
            'attribute_material',
            'attribute_neck_type',
        ]);

        $this->info('Setting up sortable attributes...');
        $index->updateSortableAttributes([
            'price',
            'name',
        ]);

        $this->info('✅ Meilisearch index settings updated successfully!');
        $this->info('You can now import products with: php artisan scout:import "App\\Models\\Product"');

        return 0;
    }
}

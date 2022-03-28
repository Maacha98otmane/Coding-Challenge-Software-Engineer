<?php

namespace App\Console\Commands;

use App\Contracts\ProductServiceContract;
use Exception;
use Illuminate\Console\Command;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product {name} {description} {price} {image} {--categories= : (optional)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating a product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ProductServiceContract $productService)
    {
        try {
            $categories = $this->option('categories') ? explode(',', $this->option('categories')) : [];
            $productService->create($this->argument('name'),
                                    $this->argument('description'),
                                    $this->argument('price'),
                                    $this->argument('image'),
                                    $categories);
            $this->info('Product has been added with success');

            return 0;
        } catch (Exception $e) {
            $this->error($e->getMessage());

            return 1;
        }
    }
}

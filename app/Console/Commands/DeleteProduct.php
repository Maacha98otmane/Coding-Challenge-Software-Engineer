<?php

namespace App\Console\Commands;

use App\Contracts\ProductServiceContract;
use Exception;
use Illuminate\Console\Command;

class DeleteProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:product {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a product';

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
            $productService->deleteProduct($this->argument('id'));
            $this->info('Product has been deleted with success');

            return 0;
        } catch (Exception $e) {
            $this->error($e->getMessage());

            return 1;
        }
    }
}

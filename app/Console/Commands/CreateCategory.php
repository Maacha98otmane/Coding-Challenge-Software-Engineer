<?php

namespace App\Console\Commands;

use App\Contracts\CategoryServiceContract;
use Exception;
use Illuminate\Console\Command;

class CreateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:category {name : name of category} {--parent=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating a category';

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
    public function handle(CategoryServiceContract $categoryService)
    {
        try {
            $categoryService->create($this->argument('name'), $this->option('parent'));
            $this->info('Category has been added with success');

            return 0;
        } catch (Exception $e) {
            $this->error($e->getMessage());

            return 1;
        }
    }
}

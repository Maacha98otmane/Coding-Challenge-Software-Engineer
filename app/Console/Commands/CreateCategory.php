<?php

namespace App\Console\Commands;

use App\Contracts\CategoryServiceContract;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

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
        $name = $this->argument('name');
        $validator = Validator::make([
                'name' => $name,
            ], [
                'name' => ['required', 'min:3'],
            ]);
        if ($validator->fails()) {
            $this->info('Category not created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return 1;
        } else {
            $categoryService->create($name, $this->option('parent'));
            $this->info('Category has been added with success');

            return 0;
        }
    }
}

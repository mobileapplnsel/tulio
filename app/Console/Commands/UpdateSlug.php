<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;

class UpdateSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slug:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Slug for Category and Product';

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
    public function handle()
    {
        $this->info('Start creating slug for Category');        
        $this->withProgressBar(Category::all(), function ($category) {
            $category->touch();
            $category->save();
        });
        $this->newLine();
        $this->info('Start creating slug for Product');
        $this->withProgressBar(Product::with('detail')->get(), function ($product) {
            $product->touch();
            $product->save();
        });
        return 0;
    }
}

<?php

namespace App\Console\Commands;

use App\Imports\ImportExcel;
use App\Models\Product;
use Illuminate\Console\Command;

class ProductCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:price_cache {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Product cache create';

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
        $id = $this->argument('id');
        $this->withProgressBar(Product::when($id,function($q) use($id){$q->where('p_id',$id);})->get(),
         function ($product) {
            $this->calculatePrice($product);
        });
    }

    protected function calculatePrice($product)
    {
        $config = [
            'quantity_type'=>'Pair',
            'length'=>300,
            'width'=>300,
            'lining_type'=>'Standard',
            'mount_type'=>'Wall Mount',
            'hardware_type'=>'Manual',
            'power_type'=>'Electric Wired',
            'control_type'=>'Home Automation',
            'unit'=>'cm'
        ];

        [$width,$length] = [$config['width'],$config['length']];

        if($config['unit']=='cm'){
            $width = ceil($width/2.54);
            $length = ceil($length/2.54);
        }
        $pair=$config['quantity_type']=='Pair'?2:1;

        

        $fileName = select_calc_file($product->cat_id);
       
        if($fileName == 'curtains' || $fileName == 'romanblinds'){

        try {
            $sheets = (new ImportExcel($width,$length,0,0))->toCollection(storage_path('app/'.\Str::title($fileName).'.xlsx'));
            $row_number = $sheets->first()->search(function ($item) use($product) {return $item['code'] == $product->p_cd;});
            if($row_number!==false){
                $row_number = $row_number+2;            
                $import = new ImportExcel($width,$length,$pair,$row_number);
                $import->import(storage_path('app/'.\Str::title($fileName).'.xlsx'));
                $sheets = $import->getData();
                $row = $sheets->where('code',$product->p_cd)->first();
                cache(['price-'.$product->p_cd.$width.$length.$pair=>$row],now()->addDays(30));
            }        

            $product->detail->pd_pr = ceil($row['total_product_cost_manual_hardware_with_blackout_lining']??0);
            $product->detail->save();
        } catch (\Exception $th) {
            info($th->getMessage());
        }

        }
        
    }
}

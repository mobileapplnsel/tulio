<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class QuotationExport implements  FromArray, WithMultipleSheets
{
    
    public function __construct($project,$extraInfo,$headings)
    {
        $this->project = $project;
        $this->extraInfo = $extraInfo;
        $this->headings = $headings;
    }

    public function array(): array
    {
        return $this->sheets;
    }

    public function sheets(): array
    {
        
        $sheets[] = new ConsolidateExport($this->project,$this->extraInfo,$this->headings,'consolidate');
        $sheets[] = new CurtainExport($this->project,$this->extraInfo,$this->headings,'Curtains');
        $rooms = $this->project->rooms()->whereHas('products',function($q){$q->whereNull('product_id');});
        if($rooms->count()){
            $sheets[] = new MotorExport($this->project,$this->extraInfo,$this->headings,'Motors');
        }

        return $sheets;
    }
}

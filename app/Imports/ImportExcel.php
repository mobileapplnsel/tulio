<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class ImportExcel implements ToCollection,WithHeadingRow,WithCalculatedFormulas,WithEvents
{
    use Importable;

    private $width,$length,$pair,$row_number,$data,$sheet_number;

    public $sheetNames;
    public $sheetData;

    public function __construct($width,$length,$pair,$row_number=0,$sheet_number=0)
    {
        $this->width = $width;
        $this->length = $length;
        $this->pair = $pair;
        $this->row_number = $row_number;
        $this->sheet_number = $sheet_number;

        $this->sheetNames = [];
        $this->sheetData = [];

    }

    public function collection(Collection $sheets)
    {
        $this->data = $sheets;

        $this->sheetData[] = $sheets;

    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event) {
                $this->sheetNames[] = $event->getSheet()->getTitle();
                if($this->row_number){
                    $event->sheet->getDelegate()->setCellValue('C'.$this->row_number, $this->width);
                    $event->sheet->getDelegate()->setCellValue('D'.$this->row_number, $this->length);
                    $event->sheet->getDelegate()->setCellValue('F'.$this->row_number, $this->pair);
                }
            },
        ];
    }

    public function getData()
    {   
        if($this->sheet_number){
            
            return $this->sheetData[$this->sheet_number];
        }else{
            return $this->sheetData[0];
        }
        
    }
}

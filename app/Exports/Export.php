<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class Export implements FromCollection,WithStrictNullComparison,WithHeadings,WithCustomStartCell,WithDrawings,ShouldAutoSize,WithEvents,WithTitle,WithMapping,WithColumnFormatting
{
    use Exportable;

    protected $headings;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($description,$data, $headings,$title='Sheet 1')
    {
        $this->description = $description;
        $this->data = $data;
        $this->headings = $headings;
        $this->title = $title;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }

    public function headings() : array
    {
        return $this->headings;
    }

    public function title(): string
    {
        return $this->title;
    }
    public function description(): string
    {
        return $this->description;
    }
    /**
    * @var Invoice $invoice
    */
    public function map($row): array
    {
        $data = [];
        foreach($row as $key=>$value){
            if(strpos(strtolower($key),'date',)!==false)
                $data[$key]=$value?Date::dateTimeToExcel($value):null;
            else
                $data[$key]=$value;
        }
        return $data;
    }

    public function columnFormats(): array
    {
        $columns = [];
        $i=0;
        foreach($this->data[0]??[] as $key=>$value){
            if(strpos(strtolower($key),'date')!==false){
                $columns[$this->getLetter($i+1)] = NumberFormat::FORMAT_DATE_XLSX16;
            }
            $i++;
        }
        return $columns;
    }
    public function startCell(): string
    {
        return 'A7';
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                
                $event->sheet->getDelegate()->getRowDimension('2')->setRowHeight(29);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(40);
                $event->sheet->setAutoFilter('A7:'.$this->getLetter(sizeof($this->headings)).'7');
                $event->sheet->getDelegate()->getStyle('A7:J7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EEEEEE');
                $event->sheet->getStyle('A7:J29')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '0000'],
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                    
                ]);
                $event->sheet->getStyle('A7:J7')->applyFromArray([
                    'font' => [
                        'bold' =>true
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->sheet->getColumnDimension('B')->setAutoSize(false);
                $event->sheet->getColumnDimension('B')->setWidth(32);
                $event->sheet->setCellValue('B3','Project Name - '.$this->description[0]["Project Name"]);
                $event->sheet->setCellValue('B4','A + ID - '.$this->description[0]["A + ID -"]);
                $event->sheet->setCellValue('B5','Assigned to -'.$this->description[0]["Assigned to -"]);

            },
        ];
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('assets/logo.png'));
        $drawing->setHeight(40);
        $drawing->setCoordinates('E2');

        return $drawing;
    }
    private function getLetter($col){
        $letter = '';
        if ($col<=26){
                $letter = chr(64+$col);
        } else {
                $newCol = intdiv($col, 26);
                $resCol = ($col % 26);
                $letter = $this->getLetter($newCol).chr(64+$resCol);
        }
        return $letter;
    }
}
